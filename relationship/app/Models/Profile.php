<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{
    use HasFactory, HasApiTokens;
    // one to one relationship 
    protected $fillable = [
        'profile_bio',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
