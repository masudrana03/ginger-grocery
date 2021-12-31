<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutService extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'service_section_tittle1',
        'service_section_description1',
        'service_section_tittle2',
        'service_section_description2',
        'service_section_tittle3',
        'service_section_description3',
        'service_section_tittle4',
        'service_section_description4',
        'service_section_tittle5',
        'service_section_description5',
        'service_section_tittle6',
        'service_section_description6',
    ];
}
