<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the Types.
     */
    public function getTypes() {
        return ok( 'Types list retrived successfully', Type::all() );
    }
}
