<?php

namespace App\Support\Audit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

final class AuditLogger
{
    public static function log(
        string $action,
        ?Model $target = null,
        ?array $oldValues = null,
        ?array $newValues = null
    ): void {
        DB::table('audit_logs')->insert([
            'actor_id' => auth()->id(),

            'entity' => $target
                ? strtolower($target->getTable())
                : 'system',

            'entity_id' => $target?->getKey(),

            'action' => $action,

            'request_id' => Request::header('X-Request-ID'),

            'before' => $oldValues
                ? json_encode($oldValues)
                : null,

            'after' => $newValues
                ? json_encode($newValues)
                : null,

            'metadata' => json_encode([
                'ip_address' => Request::ip(),
                'user_agent' => Request::userAgent(),
            ]),

            'logged_at' => now(),

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}