<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone_code',
        'phone',
        'address',
        'state',
        'country_id',
        'city',
        'zip',
        'type',
    ];

    public function scopeBilling($query)
    {
        return $query->whereType(1);
    }

    public function scopeShipping($query)
    {
        return $query->whereType(2);
    }

    /**
     * Returns country model associated with the user.
     */
    public function country() {
        return $this->belongsTo( Country::class, 'phone_code');
    }

    /**
     * Returns country model associated with the user.
     */
    public function shippingOrders() {
        return $this->hasMany( Order::class , 'shipping_id');
    }

    /**
     * Returns country model associated with the user.
     */
    public function billingOrders() {
        return $this->hasMany( Order::class , 'billing_id');
    }
}
