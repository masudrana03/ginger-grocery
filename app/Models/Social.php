<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'provider',
        'client_key',
        'client_secret',
        'redirect_url',
        'status',
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

}
