<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the banner.
     *
     * @return JsonResponse
     */
    public function getBanners(){
        return ok('Banner list retrieved successfully', Banner::all() );
    }

    /**
     * Display the specified banner.
     *
     * @param Integer $bannerId
     * @return JsonResponse
     */
    public function bannerDetails( $bannerId ){
        return ok('Banner details retrive successfully', Banner::find( $bannerId ) );
    }

}
