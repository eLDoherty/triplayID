<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $sliders = Slider::all();
        $products = Product::all();
        $payments = Payment::all();
        return view('index')->with('banner' , $banners)
                            ->with('sliders', $sliders)
                            ->with('products', $products)
                            ->with('payments', $payments);
    }
}
