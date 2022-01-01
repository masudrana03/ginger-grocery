<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model {
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type',
        'image',
        'phone',
        'established_at',
        'country_id',
        'state',
        'city',
        'zip',
        'address',
        'description',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'youtube_link',
        'pinterest_link',
        'zone_id',
        'latitude',
        'longitude',
    ];

    /**
     * Return the store's manager
     *
     * @return Relationship
     */
    public function user() {
        return $this->hasOne( User::class )->withDefault();
    }

    /**
     * Return the store's manager
     *
     * @return Relationship
     */
    public function zone() {
        return $this->belongsTo( Zone::class );
    }

    /**
     * Return the store's manager
     *
     * @return Relationship
     */
    public function country() {
        return $this->belongsTo( Country::class );
    }

    /**
     * Get the product associated with the category.
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
