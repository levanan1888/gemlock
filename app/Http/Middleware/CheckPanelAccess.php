<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPanelAccess
{
    public function handle(Request $request, Closure $next, string $requiredRole): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('filament.admin.auth.login');
        }

        $hasAccess = match ($requiredRole) {
            'admin' => $user->isAdmin(),
            'admin_genlock' => $user->isGemlockAdmin(),
            'gemsolar' => $user->isGemsolarAdmin(),
            default => false,
        };

        if (! $hasAccess) {
            abort(403, 'Bạn không có quyền truy cập vào panel này.');
        }

        return $next($request);
    }
}
