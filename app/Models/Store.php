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
        'tax',
        'currency_id',
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

    /**
     * Return the store's manager
     *
     * @return Relationship
     */
    public function currency() {
        return $this->belongsTo( Currency::class );
    }

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

    /**
     * Return the store's or vendor's total rating
     *
     * @return Integer
     */
    public function getTotalRatingAttribute()
    {
        $count = 0;

        foreach ($this->products as $product) {

            $count += $product->ratings->count();
        }

        return $count;
    }

    /**
     * Return the store's or vendor's rating avg
     *
     * @return Integer
     */
    public function getRatingAttribute()
    {
        $count = 0;
        $totalrating = 0;

        foreach ($this->products as $product) {

            $count  += $product->ratings->count();

            foreach ($product->ratings as $item) {
                $totalrating += $item->rating;
            }

        }

        if ($count != 0) {
            return $totalrating/$count;
        }

        return 0;
    }


    /**
     * Return the store's or vendor's total rating
     *
     * @return Integer
     */
    public function productRating()
    {
        return $this->hasManyThrough(ProductRating::class, Product::class);
    }

}
