<?php

namespace App\Http\Middleware;

use App\Http\Resources\ErrorResource;
use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $from = Carbon::now()->toDateString();
        $to = Carbon::tomorrow()->toDateString();

        $count = \App\Models\Request::whereBetween('created_at', [$from, $to])->where('user_id', $user->id)->count();

        if ($count >= $user->max_request) {
            return response()->json([
                'status_code' => 403,
                'error_code' => 202,
                'message' => 'متاسفانه شما به حداکثر درخواست در روز رسیده اید'
            ], 403);
        }


        return $next($request);
    }
}
