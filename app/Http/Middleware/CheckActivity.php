<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $lastActivity = $user->last_activity;
            
            // Check if user has been inactive for more than 30 minutes
            if ($lastActivity && $lastActivity->diffInMinutes(now()) > 30) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                return redirect()->route('login')->with('message', 'You have been logged out due to inactivity.');
            }
            
            // Update last activity
            $user->update(['last_activity' => now()]);
        }

        return $next($request);
    }
}
