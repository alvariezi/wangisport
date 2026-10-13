<?php

namespace App\Http\Middleware;

use App\Support\Audit\AuditLogger;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class LogAdminActivity
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $response = $next($request);

        // Catat hanya request mutasi data oleh Admin
        if (
            in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'])
            && $request->user()?->isAdmin()
            && $response->successful()
        ) {
            AuditLogger::log(
                action: 'http_admin_action:' . $request->route()?->getName(),
                oldValues: $request->except([
                    'password',
                    'password_confirmation',
                ]),
            );
        }

        return $response;
    }
}