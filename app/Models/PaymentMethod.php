<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'client_key',
        'client_secret',
        'status',
        'platform',
    ];

    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 1 ? 'Active' : 'Inactive';
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value == 'Active' ? true : false;
    }
    
    public function getPlatformAttribute()
    {
        return $this->attributes['platform'] == 1 ? 'Live' : 'Sandbox';
    }

    public function setPlatformAttribute($value)
    {
        $this->attributes['platform'] = $value == 'Live' ? true : false;
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }
}
