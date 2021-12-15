<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the Promos.
     *
     * @return JsonResponse
     */
    public function getPromos()
    {
        return ok( 'Promos list retrived successfully', Promo::all() );
    }

    /**
     * Display the specified Promos.
     *
     * @param integer $promoId
     * @return JsonResponse
     */
    public function promoDetails($promoId)
    {
        return ok( 'Promo details retrived successfully', Promo::find($promoId) );
    }
}
