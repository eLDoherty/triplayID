<?php

namespace App\Http\Controllers;

use App\Models\Embed;
use Illuminate\Http\Request;

class EmbedController extends Controller
{
    
    public function addUrl(Request $request)
    {
        $regexUrl = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $request->validate([
            'url' => 'required|regex:' . $regexUrl,
        ]);
 
        $save = new Embed;
 
        $save->url = $request->url;

        $save->save();
 
        return redirect('admin')->with('embedStatus', 'URL Has been addedd');
    }
    
    public function deleteEmbed($id)
    {
        Embed::find($id)->delete();
        return redirect('admin')->with('deleteEmbed', 'Url has been deleted!');
    }
}
