<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $hidden = ['pivot'];

    public function products()
    {
        return $this->belongsToMany(Product::class)
        ->select('products.*', 'cart_product.quantity as quantity', 'cart_product.options as options');
    }
}
