<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P6 extends Model
{
    use HasFactory;

    protected $table = 'p6'; // Replace with your actual table name if different

    // Define the fields if you're using fillable
    protected $fillable = [
        'department', 'username', 'computer_name', 'model',
        'pc_grade', 'processor', 'ram', 'storage',
        'ip_address', 'os', 'remarks'
    ];
}
