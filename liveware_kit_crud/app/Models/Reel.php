<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reel extends Model
{
    protected $fillable = [
        'reels_title',
        'description',
        'image_path'
    ];
}
