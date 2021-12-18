<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SavedProductController extends Controller
{

     /**
     * Display the specified Saved Products.
     *
     * @return JsonResponse
     */
    public function getSavedProducts()
    {
        $savedProducts = auth()->user()->savedProducts ?? [];

        return ok('Saved Products retrieved successfully',$savedProducts);
    }

    /**
     * Display the specified Add Saved Products.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function addSavedProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $productId = $request->product_id;
        $user = auth()->user();
        $user->savedProducts()->syncWithoutDetaching([$productId]);

        return ok('Product saved successfully', $user->savedProducts);
    }

    /**
     * Display the specified Remove Saved Products.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function removeSavedProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
        ]);

        $productId = $request->product_id;
        $user = auth()->user();
        $user->savedProducts()->detach($productId);

        return ok('Product removed successfully', $user->savedProducts);
    }
}
