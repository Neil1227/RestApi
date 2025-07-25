<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EditController extends Controller
{
    public function updateOrTransfer(Request $request)
    {
        try {
            $id = $request->input('id');
            $oldTable = $request->input('table');       // source table
            $newTable = $request->input('factory');     // destination table (optional)

            if (!$id || !$oldTable) {
                return response()->json([
                    'success' => false,
                    'message' => 'Missing table or ID.'
                ]);
            }

            // Get the original record
            $record = DB::table($oldTable)->where('id', $id)->first();

            if (!$record) {
                return response()->json([
                    'success' => false,
                    'message' => 'Record not found.'
                ]);
            }

            // Convert to array
            $recordArray = (array) $record;

            // UPDATE PATH
            $newData = $request->except(['id', 'table', 'factory']);
            $newData['updated_at'] = Carbon::now();

            // Compare values (excluding 'id' and 'updated_at')
            $original = $recordArray;
            unset($original['id'], $original['updated_at']);
            $compareData = $newData;
            unset($compareData['updated_at']);

            $normalizedOriginal = array_map(fn($v) => is_null($v) ? '' : trim((string)$v), $original);
            $normalizedCompareData = array_map(fn($v) => is_null($v) ? '' : trim((string)$v), $compareData);

            // Check if transfer is requested
            $isTransfer = $newTable && $newTable !== $oldTable;

            if (!$isTransfer && $normalizedCompareData == $normalizedOriginal) {
                return response()->json([
                    'success' => false,
                    'message' => 'No changes detected.'
                ]);
            }

            if ($isTransfer) {
                // Remove 'id' so it doesn't conflict on insert
                unset($recordArray['id']);

                // Update the recordArray with new field values if any are provided
                foreach ($newData as $key => $val) {
                    if (array_key_exists($key, $recordArray)) {
                        $recordArray[$key] = $val;
                    }
                }

                $recordArray['updated_at'] = Carbon::now();

                // Insert to new table
                DB::table($newTable)->insert($recordArray);

                // Delete from old table
                DB::table($oldTable)->where('id', $id)->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Record transferred successfully.'
                ]);
            } else {
                // Regular update
                $updated = DB::table($oldTable)->where('id', $id)->update($newData);

                if ($updated) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Record updated successfully.'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Update failed or no changes made.'
                    ]);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Operation failed: ' . $e->getMessage()
            ]);
        }
    }
}
