<?php

namespace App\Http\Controllers;

use App\Models\ViolationStatus;
use Illuminate\Http\Request;

class ViolationStatusController extends Controller
{
    /**
     * Display a listing of violation statuses.
     */
    public function index()
    {
        $statuses = ViolationStatus::all();
        return response()->json($statuses);
    }

    /**
     * Store a newly created violation status.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'violation_id' => 'required|exists:violations,violation_id',
            'status' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:1000',
        ]);

        $status = ViolationStatus::create($validated);

        return response()->json([
            'message' => 'Violation status created successfully',
            'violation_status' => $status,
        ], 201);
    }

    /**
     * Display the specified violation status.
     */
    public function show($id)
    {
        $status = ViolationStatus::findOrFail($id);
        return response()->json($status);
    }

    /**
     * Update the specified violation status.
     */
    public function update(Request $request, $id)
    {
        $status = ViolationStatus::findOrFail($id);

        $validated = $request->validate([
            'violation_id' => 'sometimes|exists:violations,violation_id',
            'status' => 'sometimes|string|max:255',
            'remarks' => 'nullable|string|max:1000',
        ]);

        $status->update($validated);

        return response()->json([
            'message' => 'Violation status updated successfully',
            'violation_status' => $status,
        ]);
    }

    /**
     * Remove the specified violation status.
     */
    public function destroy($id)
    {
        $status = ViolationStatus::findOrFail($id);
        $status->delete();

        return response()->json([
            'message' => 'Violation status deleted successfully',
        ]);
    }
}
