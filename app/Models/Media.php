<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'location', 
        'email', 
        'phone',
        'youtube',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
    ];
}
