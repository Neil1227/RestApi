<?php
namespace App\Http\Controllers;

use App\Models\P1AdminBldg;
use Illuminate\Http\Request;

class P1AdminBldgController extends Controller
{
    public function index()
    {
        $computers = P1AdminBldg::all(); // Fetch all data from the p1adminbldg table
        return view('p1adminbldg', ['computers' => $computers]); // Pass data to the view
    }
}
