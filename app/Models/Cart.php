<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id'
    ];

    /**
     * Get the user associated with the cart.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the user associated with the cart.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }

    /**
     * Get the order details associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function details()
    {
        return $this->hasMany(CartDetails::class);
    }

    protected $hidden = ['pivot'];

    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->select('products.*', 'cart_product.quantity as quantity', 'cart_product.options as options');
    }

}
