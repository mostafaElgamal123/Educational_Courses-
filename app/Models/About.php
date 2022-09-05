<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title', 
        'description', 
        'image',
        'available_subject', 
        'online_courses',
        'skilled_instructors',
        'happy_students'
    ];
}
