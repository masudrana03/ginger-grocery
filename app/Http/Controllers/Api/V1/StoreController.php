<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Store;
use App\Http\Controllers\Controller;

class StoreController extends Controller {
    /**
     * Display a listing of the Stores.
     */
    public function getStores() {
        return ok( 'Stores list retrived successfully', Store::all() );
    }

    /**
     * Display the specified store.
     */
    public function storeDetails( $id ) {
        return ok( 'Store details retrived successfully', Store::find( $id ) );
    }
}
