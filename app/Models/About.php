<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'main_section_tittle',
        'main_section_description',
        'main_section_image',
        'section2_tittle',
        'section2_description',
        'section2_image1',
        'section2_image2',
        'who_description',
        'our_description',
        'mission_description',
        'about_id',
        'image',

    ];



    /**
     * Get the currency associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(AboutsliderImage::class);
    }
}
