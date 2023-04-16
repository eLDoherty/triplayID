<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Embed;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $sliders = Slider::all();
        $products = Product::all();
        $payments = Payment::all();
        $urls = Embed::all();
        return view('admin.index')->with('banners' , $banners)
                                  ->with('sliders', $sliders)
                                  ->with('products', $products)
                                  ->with('urls', $urls)
                                  ->with('payments', $payments);
    }
}
