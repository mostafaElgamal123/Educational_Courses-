<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name', 
        'email', 
        'phone',
        'address', 
        'image',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'YouTube',
        'category_id',
        'status'
    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');;
    }
    public function courses(){
        return $this->hasMany(Course::class,'instructor_id');;
    }
}
