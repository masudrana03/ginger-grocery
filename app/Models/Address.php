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
        'phone',
        'address',
        'state',
        'country',
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
        return $query->whereType(1);
    }

    /**
     * Returns country model associated with the user.
     */
    public function country() {
        return $this->belongsTo( Country::class );
    }
}
