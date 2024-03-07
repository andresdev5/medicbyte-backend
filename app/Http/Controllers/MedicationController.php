<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

    }

    public function index(): JsonResponse {
        return response()->json(Medication::all());
    }

    public function show(int $id): JsonResponse {
        return response()->json(Medication::findOrFail($id));
    }

    public function store(Request $request): JsonResponse {
        $medication = Medication::create($request->all());
        return response()->json($medication, 201);
    }

    public function update(int $id, Request $request): JsonResponse {
        $medication = Medication::findOrFail($id);
        $medication->update($request->all());
        return response()->json($medication, 200);
    }

    public function delete(int $id): JsonResponse {
        Medication::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
