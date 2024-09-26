<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;

class CheckPasswordResetToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->query('token');
        $email = $request->query('email');

        $broker = Password::broker();

        $user = $broker->getUser(['email' => $email]);

        if (! $broker->tokenExists($user, $token)) {
            return redirect()->route('invalid.token')->withErrors(['token' => 'Invalid token']);
        }

        return $next($request);
    }
}
