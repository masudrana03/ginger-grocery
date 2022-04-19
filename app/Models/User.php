<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone_code',
        'phone',
        'password',
        'referral_token',
        'referrer_id',
        'date_of_birth',
        'type',
        'store_id',
        'email_verified_at',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Specifies the user's FCM token
    *
    * @return string|array
    */
    public function routeNotificationForFcm()
    {
        return $this->fcm_token;
    }

    /**
     * @param  Request $request
     * @return User    $user
     */
    public function updateProfile($request)
    {
        $this->name  = $request->name;
        $this->phone = $request->phone ?: $this->phone;
        $this->save();

        return $this;
    }

    /**
     * Get the cart associated with the user.
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    /**
     * @return mixed
     */
    public function savedProducts()
    {
        return $this->belongsToMany(Product::class, 'saved_product')
                    ->with(
                        'brand',
                        'category',
                        'unit',
                        'user:id,name',
                        'store',
                        'currency',
                        'types',
                        'nutritions',
                        'images'
                    )
                    ->withTimestamps();
    }

    /**
     * A user has a referrer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    /**
     * A user has many referrals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    /**
     * A user has many billing address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billingAddresses()
    {
        return $this->hasMany(Address::class)->whereType(1);
    }

    /**
     * A user has many shipping address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shippingAddress()
    {
        return $this->hasMany(Address::class)->whereType(2);
    }

    /**
     * Returns Store model associated with the user.
     *
     * @return Relationship
     */
    public function store()
    {
        return $this->belongsTo(Store::class)->withDefault();
    }

    /**
     * A user has many stripe cards.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stripeCards()
    {
        return $this->hasMany(StripeCustomerCard::class);
    }

    /**
     * Returns country model associated with the user.
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'phone_code');
    }
}
