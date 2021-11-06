<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SavedProductController extends Controller
{
    public function getSavedProducts()
    {
        $savedProducts = auth()->user()->savedProducts ?? [];

        return ok('Saved Products retrived successfully',$savedProducts);
    }

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
