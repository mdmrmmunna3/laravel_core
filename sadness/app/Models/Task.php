<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class Task extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = [
        'name',
        'describ',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
