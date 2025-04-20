<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model {
    use HasFactory;

    protected $fillable = ['user', 'password'];
    
    protected $hidden = ['password']; // Hide password when fetching data
}

