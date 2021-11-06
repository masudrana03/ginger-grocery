<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
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
     * @param  Request $request
     * @return User    $user
     */
    public function updateProfile( $request ) {
        $this->name  = $request->name;
        $this->phone = $request->phone ?: $this->phone;
        $this->save();

        return $this;
    }

    /**
     * Get the cart associated with the uesr.
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
