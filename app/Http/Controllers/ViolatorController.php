<?php

namespace App\Http\Controllers;

use App\Models\Violator;
use Illuminate\Http\Request;

class ViolatorController extends Controller
{
    /**
     * Display a listing of violators.
     */
    public function index()
    {
        $violators = Violator::all();
        return response()->json($violators);
    }

    /**
     * Store a newly created violator.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'license_number' => 'required|string|max:50',
            'birthdate' => 'required|date',
            'gender' => 'required|string|max:10',
            'occupation' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        $violator = Violator::create($validated);

        return response()->json([
            'message' => 'Violator created successfully',
            'violator' => $violator,
        ], 201);
    }

    /**
     * Display the specified violator.
     */
    public function show($id)
    {
        $violator = Violator::findOrFail($id);
        return response()->json($violator);
    }

    /**
     * Update the specified violator.
     */
    public function update(Request $request, $id)
    {
        $violator = Violator::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|integer|exists:users,id',
            'license_number' => 'sometimes|string|max:50',
            'birthdate' => 'sometimes|date',
            'gender' => 'sometimes|string|max:10',
            'occupation' => 'nullable|string|max:255',
            'contact_number' => 'sometimes|string|max:20',
            'address' => 'sometimes|string|max:500',
        ]);

        $violator->update($validated);

        return response()->json([
            'message' => 'Violator updated successfully',
            'violator' => $violator,
        ]);
    }
}
