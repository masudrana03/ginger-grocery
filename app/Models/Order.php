<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'order_status_id',
    ];

    /**
     * Get the order status associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    /**
     * Get the order status associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the user associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the store associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Get the order details associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function details()
    {
        return $this->hasMany(OrderDetails::class);
    }

    /**
     * Get the order details associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function shipping()
    {
        return $this->belongsTo(Address::class, 'shipping_id')->where('type', 2);
    }

    /**
     * Get the order details associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function billing()
    {
        return $this->belongsTo(Address::class, 'billing_id')->where('type', 1);
    }


    public function getPaymentStatusAttribute()
    {
        return $this->attributes['payment_status'] == 1 ? 'Paid' : 'Unpaid';
    }

    public function setPaymentStatusAttribute($value)
    {
        $this->attributes['payment_status'] = $value == 'Paid' ? true : false;
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }
}
