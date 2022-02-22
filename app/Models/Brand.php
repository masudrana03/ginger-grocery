<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the products associated with the brand.
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productsByStore($storeId)
    {
        return $this->hasMany(Product::class)->where('store_id', $storeId)->where('brand_id', $this->id)->count();
    }
}
