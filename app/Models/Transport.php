<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_brand',
        'vehicle_model',
        'vehicle_number_plate',
        'vehicle_image',
        'description'
    ];


    /**
     * Get the currency associated with the Transport.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(TransportImage::class);
    }

}
