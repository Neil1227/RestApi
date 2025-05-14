<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class DeleteController extends Controller
{

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $table = $request->input('table');
    
        if (!Schema::hasTable($table)) {
            return response()->json(['success' => false, 'message' => 'Table not found.']);
        }
    
        DB::table($table)->where('id', $id)->delete();
    
        return response()->json(['success' => true]);
    }


}
