<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class InventoryController extends Controller
{
    public function insertRecord(Request $request)
    {
        $table = $request->input('table');
    
        if (!$table) {
            return response()->json(['error' => 'Table not specified'], 400);
        }
    
        $data = $request->except(['_token', 'table']);
        $data['created_at'] = now();
        $data['updated_at'] = now();
    
        try {
            DB::table($table)->insert($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    
    
    

    
}
