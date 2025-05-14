<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{

    public function update(Request $request)
    {
        try {
            $model = $this->getModelFromTable($request->table);
            $record = $model::findOrFail($request->id);
            $record->update($request->except(['id', 'table']));
    
            return response()->json([
                'success' => true,
                'message' => 'Record updated successfully'
            ], 200); // ✅ ensure HTTP 200
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500); // ⚠️ only send 500 when there's a real error
        }
    }
    
    

private function getModelFromTable($table)
{
    return match($table) {
        'p1adminbldg' => \App\Models\P1AdminBldg::class,
        'p1prod' => \App\Models\P1Prod::class,
        'p1bldga' => \App\Models\P1BldgA::class,
        'p1whbldg' => \App\Models\P1WHBldg::class,
        'p2' => \App\Models\P2::class,
        'p3' => \App\Models\P3::class,
        'p5' => \App\Models\P5::class,
        'p6' => \App\Models\P6::class,
        default => abort(404),
    };
}


}


