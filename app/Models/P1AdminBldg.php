<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P1AdminBldg extends Model
{
    use HasFactory;

    protected $table = 'p1adminbldg'; // Set the table name

    protected $fillable = [
        'department', 'username', 'computer_name', 'model', 'pc_grade', 
        'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks'
    ];
}
    