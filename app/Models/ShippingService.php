<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'status',
        'type',
        'from',
        'to',
        'store_id',
    ];

    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 1 ? 'Active' : 'Inactive';
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value == 'Active' ? true : false;
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }

    /**
     * Return the store's manager
     *
     * @return Relationship
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
