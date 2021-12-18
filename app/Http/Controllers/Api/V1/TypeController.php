<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Type;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the Types.
     *
     * @return JsonResponse
     */
    public function getTypes() {
        return ok( 'Types list retrieved successfully', Type::all() );
    }
}
