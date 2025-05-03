<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DeleteIndividualController extends Controller
{
    public function deleteRecord($table, $id)
    {
        $allowedTables = ['p1prod', 'p1adminbldg', 'p1bldga', 'p1whbldg', 'p2', 'p3', 'p5', 'p6'];
    
        if (!in_array($table, $allowedTables)) {
            return response()->json(['error' => 'Invalid table'], 400);
        }
    
        $modelMap = [
            'p1prod' => \App\Models\P1Prod::class,
            'p1adminbldg' => \App\Models\P1AdminBldg::class,
            'p1bldga' => \App\Models\P1BldgA::class,
            'p1whbldg' => \App\Models\P1WhBldg::class,
            'p2' => \App\Models\P2::class,
            'p3' => \App\Models\P3::class,
            'p5' => \App\Models\P5::class,
            'p6' => \App\Models\P6::class
        ];
    
        $model = $modelMap[$table];
        $record = $model::find($id);
    
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    
        $record->delete();
    
        return response()->json(['success' => true]);
    }
    


}
