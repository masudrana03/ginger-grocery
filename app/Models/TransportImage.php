<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportImage extends Model
{
    use HasFactory;


    protected $fillable = [
        'image',
        'transport_id ',
    ];

}
