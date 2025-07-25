<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MoveController extends Controller
{

public function update_transfer(Request $request)
{
    $id = $request->input('id');
    $oldTable = $request->input('table');       // original table
    $newTable = $request->input('factory');     // new selected table

    $recordData = DB::table($oldTable)->where('id', $id)->first();

    if (!$recordData) {
        return response()->json(['error' => 'Record not found'], 404);
    }

    // Convert object to array
    $recordArray = (array) $recordData;

    // Remove unwanted fields like 'id'
    unset($recordArray['id']);

    // Insert into new table
    DB::table($newTable)->insert($recordArray);

    // Delete from old table
    DB::table($oldTable)->where('id', $id)->delete();

    return response()->json(['success' => 'Record moved successfully']);
}



}


