<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class IndividualDeleteController extends Controller
{
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $table = $request->input('table');

        if (!Schema::hasTable($table)) {
            return response()->json(['success' => false, 'message' => 'Table not found.']);
        }

        $deleted = DB::table($table)->where('id', $id)->delete();

        if ($deleted) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Record not found or already deleted.']);
        }
    }
}
