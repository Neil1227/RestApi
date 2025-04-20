<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $table = 'computers'; // Set the correct table name
    			
    protected $fillable = [
        'superl_philippines_inc', 'siglo_leatherware', 'angeles_alliance_leatherware'
    ];
}


