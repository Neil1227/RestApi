<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComputerController extends Controller
{
    public function index()
    {
        $computers = DB::table('computers')->get(); // Fetch all records
        return view('computer-list', compact('computers')); // Pass data to the view
    }
    

}


