<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Payment;
use App\Models\Slider;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function addBanner(Request $request)
    {
       
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $name = 'BANNER-' . microtime(true) .  '-' . $request->file('image')->getClientOriginalName();

        $request->image->move('storage/uploads/banner', $name );
 
        $banner = new Banner;
 
        $banner->image = $name;

        $banner->save();
 
        return redirect('admin')->with('bannerStatus', 'Banner Has been uploaded');
 
    }

    public function addSlider(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $name = 'SLIDER-' . microtime(true) .  '-' . $request->file('image')->getClientOriginalName();

        $request->image->move('storage/uploads/slider', $name );
 
        $slider = new Slider;
 
        $slider->image = $name;

        $slider->save();
 
        return redirect('admin')->with('sliderStatus', 'Slider Has been uploaded');
 
    }

    public function addPayment(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'type' => 'required'
        ]);

        $name = 'PAYMENT-' . microtime(true) .  '-' . $request->file('image')->getClientOriginalName();

        $request->image->move('storage/uploads/payment', $name );
 
        $paymentLogo = new Payment;
 
        $paymentLogo->image = $name;
        $paymentLogo->type = $request->type;

        $paymentLogo->save();
 
        return redirect('admin')->with('paymentStatus', 'Payment logo has been uploaded');
    }

    public function deleteBanner($id)
    {
        Banner::find($id)->delete();
        return redirect('admin')->with('deleteBanner', 'Banner has been deleted!');
    }

    public function deleteSlider($id)
    {
        Slider::find($id)->delete();
        return redirect('admin')->with('deleteSlider', 'Slider has been deleted!');
    }

    public function deletePayment($id)
    {
        Payment::find($id)->delete();
        return redirect('admin')->with('deletePayment', 'Payment has been deleted!');
    }
}
