<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nutrition;

class NutritionController extends Controller
{
    /**
     * Display a listing of the nurtrition.
     *
     * @return JsonResponse
     */
    public function getNutritions()
    {
        return ok('Nutrition list retrived successfully', Nutrition::all());
    }

    /**
     * Display the specified nurtrition.
     *
     * @param integer $nutritionId
     * @return JsonResponse
     */
    public function nutritionDetails( $nutritionId )
    {
        return ok('Nutrition details retrive successfully', Nutrition::find( $nutritionId ));
    }
}
