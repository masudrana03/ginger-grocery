<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = ['pivot'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'excerpt',
        'attributes',
        'featured_image',
        'price',
        'calories_per_serving',
        'fat_calories_per_serving',
        'currency_id',
        'unit_id',
        'brand_id',
        'store_id',
        'category_id',
        'user_id',
        'discount_type',
        'discount_amount',

    ];

    /**
     * Get the brand associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the category associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the unit associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Get the user associated with the product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the store associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Get the currency associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get the types associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    /**
     * Get the nutritions associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function nutritions()
    {
        return $this->belongsToMany(Nutrition::class);
    }


    /**
     * Get the nutritions associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    /**
     * Get the currency associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Get the currency associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }



    /**
     * Return the store's or vendor's total rating
     *
     * @return Integer
     */
    public function getTotalRatingAttribute()
    {
        return  $this->ratings->count();
    }

    /**
     * Return the store's or vendor's rating avg
     *
     * @return Integer
     */
    public function getRatingAttribute()
    {
        $count = $this->ratings->count();
        $totalrating = 0;

        foreach ($this->ratings as $item) {
            $totalrating += $item->rating;
        }

        if ($count != 0) {
            return $totalrating / $count;
        }

        return 0;
    }
}
