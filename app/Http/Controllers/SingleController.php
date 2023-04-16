<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function index($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('product')->with('product', $product)
                              ->with('variant', $product->variant);
    }
}
