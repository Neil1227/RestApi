<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if admin is logged in
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('login');
        }

        // Count records for existing tables
        $counts = [
            'p1' => DB::table('p1adminbldg')->count() +
                    DB::table('p1bldga')->count() +
                    DB::table('p1prod')->count() +
                    DB::table('p1whbldg')->count(),
            'p2' => DB::table('p2')->count(),
            'p3' => DB::table('p3')->count(),
            'p5' => DB::table('p5')->count(),
            'p6' => DB::table('p6')->count(),
        ];

        // Count records per company from the 'computers' table
        $company_counts = [
            'spi' => DB::table('computers')->whereNotNull('superl_philippines_inc')->where('superl_philippines_inc', '!=', '')->count(),
            'aal' => DB::table('computers')->whereNotNull('angeles_alliance_leatherware')->where('angeles_alliance_leatherware', '!=', '')->count(),
            'siglo' => DB::table('computers')->whereNotNull('siglo_leatherware')->where('siglo_leatherware', '!=', '')->count(),
        ];

        // Total number of computers
        $company_counts['total'] = $company_counts['spi'] + $company_counts['aal'] + $company_counts['siglo'];

        return view('dashboard', compact('counts', 'company_counts'));
    }
    
    public function getChartData(){
    // Count records for each table
    $data = [
        'p1' => DB::table('p1adminbldg')->count() +
                DB::table('p1bldga')->count() +
                DB::table('p1prod')->count() +
                DB::table('p1whbldg')->count(),
        'p2' => DB::table('p2')->count(),
        'p3' => DB::table('p3')->count(),
        'p5' => DB::table('p5')->count(),
        'p6' => DB::table('p6')->count(),
    ];

    return response()->json($data);
}

}
