<?php
namespace App\Http\Controllers;

use App\Models\P1BldgA;
use Illuminate\Http\Request;

class P1BldgAController extends Controller
{
    public function index()
    {
        $computers = P1BldgA::all(); // Fetch all records from p1adminbldg table
        return view('p1bldga', ['computers' => $computers]); // Pass data to the view
    }
}
