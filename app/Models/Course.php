<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'slug',
        'description',
        'image',
        'rating',
        'lectures',
        'duration',
        'Skill_level',
        'language',
        'discount',
        'category_id',
        'instructor_id',
        'status'
    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');;
    }
    public function instructors(){
        return $this->belongsTo(Instructor::class,'instructor_id');;
    }
    public function DiplomaOutlines(){
        return $this->hasMany(DiplomaOutline::class,'course_id');;
    }
    public function applynows(){
        return $this->hasMany(ApplyNow::class,'course_id');;
    }
}
