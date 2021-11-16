<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    /**
     * Get the order status associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    /**
     * Get the order status associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }


}
