<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Zone extends Model
{
    use HasFactory;
    use SpatialTrait;

    protected $fillable = [
        'name',
        'coordinates',
        'status',
    ];

    protected $spatialFields = [
        'name',
        'coordinates',
    ];



    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 1 ? 'Online' : 'Offline';
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value == 'Online' ? true : false;
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }
}
