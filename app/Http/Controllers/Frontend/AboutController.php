<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\AboutService;
use Illuminate\Http\Request;
use App\Models\AboutsliderImage;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
   public function about()
   {
        $about = About::first();
        $aboutImages = AboutsliderImage::all();
        $aboutService = AboutService::first();

        return view('frontend.about', compact('about', 'aboutImages', 'aboutService'));
   }
}
