<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country_id',
        'state',
        'city',
        'zip',
        'address',
        'latitude',
        'longitude'
    ];


    /**
     * Get the user associated with the Country.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function countries()
    {
        return $this->belongsTo(Country::class);
    }
}
