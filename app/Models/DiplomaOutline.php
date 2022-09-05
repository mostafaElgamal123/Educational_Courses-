<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiplomaOutline extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'level',
        'content',
        'course_id'
    ];
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');;
    }
}
