<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Session;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('userId') || Session::has('userId') == null) {
            return redirect()->route('logOut');
        } else {
            $user = User::where('status', 1)->where('id', currentUserId())->first();
            if (!$user) {
                return redirect()->route('logOut');
            } else
                return $next($request);
        }
        return redirect()->route('logOut');
    }
}
