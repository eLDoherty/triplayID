<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helper\Utils;
use App\Models\Variant;
use Hamcrest\Util;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.product');
    }

    public function addProduct(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|unique:table_products',
            'description' => 'required|min:20',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'banner' => 'image|mimes:jpg,png,jpeg|max:2046',
            'type' => 'required',
            'hasServer' => 'required'
        ]);

        $thumbnail = 'thumbs-' . microtime(true) .  '-' . $request->file('thumbnail')->getClientOriginalName();
        $banner = 'banner-' . microtime(true) .  '-' . $request->file('banner')->getClientOriginalName();

        $request->thumbnail->move('storage/uploads/product', $thumbnail );
        $request->banner->move('storage/uploads/product', $banner);

        $validatedData['thumbnail'] = $thumbnail;
        $validatedData['banner'] = $banner;
        $validatedData['hasServer'] = $validatedData['hasServer'] === "1" ? 1 : 0;

        Product::create($validatedData);

        return view('admin.index')->with('productStatus', 'Product has been added!');
    }

    public function deleteProduct($id)
    {
        Product::find($id)->delete();
        return redirect('admin')->with('deleteProduct', 'Product has been deleted!');
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('pages.editProduct')->with('product', $product);
    }

    public function changeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:table_products,name,' . $request->id,
            'description' => 'required|min:20',
            'thumbnail' => 'image|mimes:jpg,png,jpeg|max:2048',
            'banner' => 'image|mimes:jpg,png,jpeg|max:2046',
            'type' => 'required',
            'hasServer' => 'required'
        ]);

        $product = Product::find($request->id);

        $oldThumbnail = $product->thumbnail;
        $oldBanner = $product->banner;
        $thumbnail = '';
        $banner = '';

        if ($request->hasFile('thumbnail')) {

            // Delete the old thumbnail
            $oldThumbnailPath = public_path() . '/storage/uploads/prodcut/' . $oldThumbnail;
            Storage::delete($oldThumbnailPath);

            // Store the new thumbnail
            $thumbnail = 'thumbs-' . microtime(true) .  '-' . $request->file('thumbnail')->getClientOriginalName();
    
            $request->thumbnail->move('storage/uploads/product', $thumbnail );

        }

        if ($request->hasFile('banner')) {

            // Delete the old banner
            $oldBannerPath = public_path() . '/storage/uploads/prodcut/' . $oldBanner;
            Storage::delete($oldBannerPath);

            // Store the new banner
            $banner = 'banner-' . microtime(true) .  '-' . $request->file('banner')->getClientOriginalName();

            $request->banner->move('storage/uploads/product', $banner);

        }

        Product::where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail' => $request->hasFile('thumbnail') ? $thumbnail : $oldThumbnail,
            'banner' => $request->hasFile('banner') ? $banner : $oldBanner,
            'type' => $request->type,
            'hasServer' => $request->hasServer,
            'slug' => Utils::slugify($request->name)
        ]);

        return redirect()->route('adminPage');
    }

    public function addPrice($id)
    {
        $product = Product::find($id);

        $variant = $product->variant;

        return view('pages.price')->with('product', $product)
                                  ->with('variant', $variant);
                                  
    }

    public function productPrice(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $id = (int) $request->product_id;
        
        $variant = new Variant;
 
        $variant->name = $request->name;
        $variant->price = $request->price;
        $variant->product_id = $id;

        $variant->save();
 
        return redirect()->back()->with('variant', 'Add variant successfully');
    }
}
