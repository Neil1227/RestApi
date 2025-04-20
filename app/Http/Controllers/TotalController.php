<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TotalController extends Controller
{
    public function index()
    {
        // Count the number of records where the column is not null or empty
        $spi = DB::table('computers')->whereNotNull('superl_philippines_inc')->where('superl_philippines_inc', '!=', '')->count();
        $aal = DB::table('computers')->whereNotNull('angeles_aliance_leatherware')->where('angeles_aliance_leatherware', '!=', '')->count();
        $siglo = DB::table('computers')->whereNotNull('siglo_leatherware')->where('siglo_leatherware', '!=', '')->count();

        // Store counts in an array
        $counts = [
            'spi' => $spi,
            'aal' => $aal,
            'siglo' => $siglo,
            'total' => $spi + $aal + $siglo, // Sum of all records
        ];

        // Debugging: Uncomment this to check the output
        // dd($counts);

        return view('dashboard', compact('counts'));
    }
}
