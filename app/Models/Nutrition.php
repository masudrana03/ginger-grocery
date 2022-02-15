<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nutrition extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the product associated with the nutritions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Get the product associated with the nutritions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function nutritionsByStore($storeId)
    {
        return $this->hasMany(Product::class)->where('store_id', $storeId)->where('brand_id', $this->id)->count();
    }

    // Booking model
    // public function meta()
    // {
    // return $this->belongsToMany('MetaType', 'meta', 'booking_id', 'metatype_id')
    //         ->withPivot([ ARRAY OF FIELDS YOU NEED FROM meta TABLE ]);
    // }


}
