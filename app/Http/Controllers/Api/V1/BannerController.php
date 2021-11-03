<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the banner.
     *
     */
    public function getBanners(){
        return ok('Banner list retrived successfully', Banner::all() );
    }

    /**
     * Display the specified banner.
     *
     */
    public function bannerDetails($id){
        return ok('Banner details retrive successfully', Banner::find($id) );
    }


}
