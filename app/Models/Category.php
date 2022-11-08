<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'slug'
    ];
    public function instructors(){
        return $this->hasMany(Instructor::class,'category_id');;
    }
    public function courses(){
        return $this->hasMany(Course::class,'category_id');;
    }
}
