<?php

namespace App\Http\Controllers;

use App\Models\Violation;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    /**
     * Display a listing of all violations.
     */
    public function index()
    {
        // Optionally eager load related user and tickets
        $violations = Violation::with(['user', 'tickets'])->get();

        return response()->json($violations);
    }

    /**
     * Store a newly created violation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'vehicle_plate_number' => 'required|string|max:255',
            'violation_type' => 'required|string|max:255',
            'location' => 'required|string|max:500',
            'date_time' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        $violation = Violation::create($validated);

        return response()->json([
            'message' => 'Violation created successfully',
            'violation' => $violation,
        ], 201);
    }

    /**
     * Display the specified violation.
     */
    public function show($id)
    {
        $violation = Violation::with(['user', 'tickets'])->findOrFail($id);
        return response()->json($violation);
    }

    /**
     * Update the specified violation.
     */
    public function update(Request $request, $id)
    {
        $violation = Violation::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'vehicle_plate_number' => 'sometimes|string|max:255',
            'violation_type' => 'sometimes|string|max:255',
            'location' => 'sometimes|string|max:500',
            'date_time' => 'sometimes|date',
        ]);

        $violation->update($validated);

        return response()->json([
            'message' => 'Violation updated successfully',
            'violation' => $violation,
        ]);
    }

    /**
     * Remove the specified violation.
     */
    public function destroy($id)
    {
        $violation = Violation::findOrFail($id);
        $violation->delete();

        return response()->json([
            'message' => 'Violation deleted successfully',
        ]);
    }
}
