<?php

namespace App\Http\Controllers;

use App\Models\RoleStatus;
use Illuminate\Http\Request;

class RoleStatusController extends Controller
{
    /**
     * Display a listing of role statuses.
     */
    public function index()
    {
        $roleStatuses = RoleStatus::all();
        return response()->json($roleStatuses);
    }

    /**
     * Store a newly created role status.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_name' => 'required|string|max:255',
        ]);

        $roleStatus = RoleStatus::create($validated);

        return response()->json([
            'message' => 'Role status created successfully',
            'role_status' => $roleStatus,
        ], 201);
    }

    /**
     * Display the specified role status.
     */
    public function show($id)
    {
        $roleStatus = RoleStatus::findOrFail($id);
        return response()->json($roleStatus);
    }

    /**
     * Update the specified role status.
     */
    public function update(Request $request, $id)
    {
        $roleStatus = RoleStatus::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'role_name' => 'sometimes|string|max:255',
        ]);

        $roleStatus->update($validated);

        return response()->json([
            'message' => 'Role status updated successfully',
            'role_status' => $roleStatus,
        ]);
    }

    /**
     * Remove the specified role status.
     */
    public function destroy($id)
    {
        $roleStatus = RoleStatus::findOrFail($id);
        $roleStatus->delete();

        return response()->json([
            'message' => 'Role status deleted successfully',
        ]);
    }
}
