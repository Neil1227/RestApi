<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P1BldgA extends Model
{
    use HasFactory;

    protected $table = 'p1bldga'; // Set the correct table name

    protected $fillable = [
        'department', 'username', 'computer_name', 'model', 'pc_grade', 
        'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks'
    ];
}
