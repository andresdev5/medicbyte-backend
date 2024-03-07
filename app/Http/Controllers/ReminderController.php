<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReminderController extends Controller {
    public function index(): JsonResponse {
        return response()->json(Reminder::with('medication')->get());
    }

    public function show(int $id): JsonResponse {
        return response()->json(Reminder::with('medication')->find($id));
    }

    public function store(Request $request): JsonResponse {
        $data = $request->json()->all();

        $fields = [
            'medication_id' => $data['medication']['id'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'interval_value' => $data['interval_value'],
            'interval_unit' => $data['interval_unit'],
            'interval_count' => $data['interval_count'] ?? 0,
            'max_intervals' => $data['max_intervals'] ?? 0,
            'notes' => $data['notes'] ?? null,
            'status' => $data['status'] ?? 'active',
        ];

        $reminder = Reminder::create($fields);
        return response()->json($reminder, 201);
    }

    public function update(int $id, Request $request): JsonResponse {
        $reminder = Reminder::findOrFail($id);
        $reminder->update($request->all());
        return response()->json($reminder, 200);
    }

    public function delete(int $id): JsonResponse {
        Reminder::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
