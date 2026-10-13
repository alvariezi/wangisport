<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Support\Audit\AuditLogger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminFieldController extends Controller
{
    public function toggleStatus(
        Request $request,
        Field $field
    ): JsonResponse {
        $request->validate([
            'status' => 'required|in:active,suspended,inactive',
        ]);

        $oldIsActive = (bool) $field->is_active;
        $newStatus = $request->input('status');
        $newIsActive = $newStatus === 'active';

        $field->update([
            'is_active' => $newIsActive,
        ]);

        AuditLogger::log(
            action: 'field.status_change',
            target: $field,
            oldValues: [
                'status' => $oldIsActive
                    ? 'active'
                    : 'inactive',
                'is_active' => $oldIsActive,
            ],
            newValues: [
                'status' => $newStatus,
                'is_active' => $newIsActive,
            ]
        );

        return response()->json([
            'message' => 'Status lapangan berhasil diperbarui',
            'field' => $field->fresh(),
        ]);
    }
}