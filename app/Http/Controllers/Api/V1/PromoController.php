<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function getPromos()
    {
        return ok( 'Promos list retrived successfully', Promo::all() );
    }

    public function promoDetails($id)
    {
        return ok( 'Promo details retrived successfully', Promo::find($id) );
    }
}
