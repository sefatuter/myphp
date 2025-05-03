<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 1. check .env for mysql configuration
// php artisan migrate
// php artisan make:model if not exist
class Post extends Model 
{
    protected $fillable = ['title', 'content']; // Eloquent basics
}
