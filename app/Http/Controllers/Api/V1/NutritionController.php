<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nutrition;

class NutritionController extends Controller
{
    /**
     * Display a listing of the nurtrition.
     */
    public function getNutritions(){
        return ok('Nutrition list retrived successfully', Nutrition::all());
    }

    /**
     * Display the specified nurtrition.
     */
    public function nutritionDetails($id){
        return ok('Nutrition details retrive successfully', Nutrition::find($id));
    }
}
