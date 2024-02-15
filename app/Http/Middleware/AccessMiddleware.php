<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user->status == 0) {
            return response()->json([
                'status_code' => 403,
                'error_code' => 3390,
                'message' => 'کاربر گرامی برای استفاده از اپلیکیشن به مدیریت پیام دهید',
            ], 403);
        }
        return $next($request);
    }
}
