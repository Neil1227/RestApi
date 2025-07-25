<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

use App\Http\Controllers\ComputerController;
use App\Http\Controllers\P1BldgAController;
use App\Http\Controllers\P1AdminBldgController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\EditController;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DashboardController;

Route::get('/get-all-computers', function () {
    $tables = ['p1prod', 'p1adminbldg', 'p1bldga', 'p1whbldg', 'p2', 'p3', 'p5', 'p6'];

    $allData = collect();

    foreach ($tables as $table) {
        $data = DB::table($table)->get()->map(function ($item) use ($table) {
            $item->source_table = $table; // Tag the origin
            return $item;
        });

        $allData = $allData->merge($data);
    }

    return response()->json($allData);
});


Route::post('/insert-record', [InventoryController::class, 'insertRecord']);
Route::post('/update-computer', [EditController::class, 'updateOrTransfer']);
Route::post('/delete-computer', [DeleteController::class, 'delete'])->name('delete.computer');
// In web.php
Route::get('/get-computer-data', [ComputerController::class, 'getComputerData']);
Route::get('/computer-list', [ComputerController::class, 'index'])->name('computer-list');
Route::get('/p1adminbldg', [P1AdminBldgController::class, 'index'])->name('p1adminbldg');
Route::get('/p1bldga', [P1BldgAController::class, 'index'])->name('p1bldga');

// _______________________________________________________
use App\Models\Computer;
use App\Models\P1AdminBldg;
use App\Models\P1BldgA;
use App\Models\P1Prod;
use App\Models\P1WhBldg;
use App\Models\P2;
use App\Models\P3;
use App\Models\P5;
use App\Models\P6;

Route::get('/all-list', function () {
    return view('all-list'); // Ensure this matches your Blade file name
})->name('all-list');

Route::get('/get-computer-data', function () {
    $computerData = Computer::select('superl_philippines_inc', 'siglo_leatherware', 'angeles_alliance_leatherware')->get();
    return response()->json($computerData);
});
Route::get('/get-p1prod-data', function () {
    $p1ProdData = P1Prod::select('department', 'username', 'computer_name', 'model', 'pc_grade', 'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks')->get();
    return response()->json($p1ProdData);
});
Route::get('/get-p1adminbldg-data', function () {
    $p1AdminData = P1AdminBldg::select('department', 'username', 'computer_name', 'model', 'pc_grade', 'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks')->get();
    return response()->json($p1AdminData);
});
Route::get('/get-p1bldga-data', function () {
    $p1BldgAData = P1BldgA::select('department', 'username', 'computer_name', 'model', 'pc_grade', 'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks')->get();
    return response()->json($p1BldgAData);
});
Route::get('/get-p1whbldg-data', function () {
    $p1whBldgAData = P1WhBldg::select('department', 'username', 'computer_name', 'model', 'pc_grade', 'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks')->get();
    return response()->json($p1whBldgAData);
});
Route::get('/get-p2-data', function () {
    $p2Data = P2::select('department', 'username', 'computer_name', 'model', 'pc_grade', 'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks')->get();
    return response()->json($p2Data);
});
Route::get('/get-p3-data', function () {
    $p3Data = P3::select('department', 'username', 'computer_name', 'model', 'pc_grade', 'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks')->get();
    return response()->json($p3Data);
});
Route::get('/get-p5-data', function () {
    $p5Data = P5::select('department', 'username', 'computer_name', 'model', 'pc_grade', 'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks')->get();
    return response()->json($p5Data);
});
Route::get('/get-p6-data', function () {
    $p6Data = P6::select('department', 'username', 'computer_name', 'model', 'pc_grade', 'processor', 'ram', 'storage', 'ip_address', 'os', 'remarks')->get();
    return response()->json($p6Data);
});



// Show login page but prevent access if already logged in
Route::get('/login', function () {
    if (Session::has('admin_logged_in')) {
        return redirect()->route('dashboard');
    }
    return view('login');
})->name('login');

// Process login form submission
Route::post('/login', function (Request $request) {
    $request->validate([
        'user' => 'required',
        'password' => 'required',
    ]);

    $admin = Admin::where('user', $request->user)->first();

    if (!$admin) {
        return back()->withErrors(['user' => 'User not found.']);
    }

    if (!Hash::check($request->password, $admin->password)) {
        return back()->withErrors(['password' => 'Incorrect password.']);
    }

    // Store login session
    Session::put('admin_logged_in', true);
    return redirect()->route('dashboard');
})->name('login.process');

// Show the dashboard only if logged in
Route::get('/dashboard', function () {
    if (!Session::has('admin_logged_in')) {
        return redirect()->route('login');
    }
    return view('dashboard');
})->name('dashboard');

// Other protected routes for buildings and sections
$routes = [
    'p1adminBldg' => 'P1 Admin Bldg',
    'p1BldgA' => 'P1 Bldg A',
    'p1prod' => 'P1 Production',
    'p1whBldg' => 'P1 WH Bldg',
    'p2' => 'P2',
    'p3' => 'P3',
    'p5' => 'P5',
    'p6' => 'P6'
];

foreach ($routes as $route => $view) {
    Route::get("/{$route}", function () use ($route) { // Pass $route explicitly
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('login');
        }
        return view($route);
    })->name($route);
}

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/chart-data', [DashboardController::class, 'getChartData'])->name('dashboard.chartData');


// Logout Route
Route::get('/logout', function () {
    Session::forget('admin_logged_in');
    return redirect()->route('login')->with('message', 'Logged out successfully.');
})->name('logout');

// ***********************************************************************************************************
