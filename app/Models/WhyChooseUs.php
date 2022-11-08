<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title', 
        'slug',
        'description', 
        'image',
        'icon_1', 
        'icon_2',
        'icon_3',
        'Skilled_Instructors_title',
        'Skilled_Instructors_description',
        'International_Certificate_title',
        'International_Certificate_description',
        'Online_Classes_title',
        'Online_Classes_description',
    ];
}
