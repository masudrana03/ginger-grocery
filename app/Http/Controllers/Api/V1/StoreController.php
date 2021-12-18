<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Store;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    /**
     * Display a listing of the Stores.
     *
     * @return JsonResponse
     */
    public function getStores() {
        return ok( 'Stores list retrieved successfully', Store::all() );
    }

    /**
     * Display the specified store.
     *
     * @param integer $storeId
     * @return JsonResponse
     */
    public function storeDetails( $storeId ) {
        return ok( 'Store details retrieved successfully', Store::find( $storeId ) );
    }
}
