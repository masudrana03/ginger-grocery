<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the product associated with the type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Products()
    {
        return $this->belongsToMany(Product::class);
    }
}
