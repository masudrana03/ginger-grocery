<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryManDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'identity_type',
        'identity_image',
        'image',
        'zone_id',
        'status',
        'online_status',
        'created_at'
    ];

    /**
     * Get the user associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 1 ? 'Approve' : 'Block';
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value == 'Approve' ? true : false;
    }

    public function scopeApprove($query)
    {
        return $query->whereStatus(true);
    }


    public function getOnlineStatusAttribute()
    {
        return $this->attributes['online_status'] == 1 ? 'Online' : 'Offline';
    }

    public function setOnlineStatusAttribute($value)
    {
        $this->attributes['online_status'] = $value == 'Online' ? true : false;
    }

    public function scopeActive($query)
    {
        return $query->whereOnlineStatus(true);
    }
}
