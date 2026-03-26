<?php

namespace App\Modules\Core\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sau auth:sanctum: đồng bộ user sang guard web (Spatie dùng chung guard web cho API).
 * Teams mode đã tắt — không cần set department context.
 */
class SetPermissionsTeamId
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('sanctum')->user();

        if ($user) {
            Auth::guard('web')->setUser($user);
        }

        return $next($request);
    }
}
