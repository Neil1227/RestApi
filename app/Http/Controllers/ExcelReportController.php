<?php

namespace App\Http\Controllers;
use App\Exports\DynamicTableExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class TotalController extends Controller
{

public function generate(Request $request)
{
    $request->validate([
        'table' => 'required|string',
    ]);

    $table = $request->input('table');

    return Excel::download(new DynamicTableExport($table), 'report_' . $table . '.xlsx');
}
}
