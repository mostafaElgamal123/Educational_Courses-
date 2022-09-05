<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyNow extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name', 
        'phone',
        'email',
        'Faculty',
        'course_id'
    ];
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');;
    }
}
