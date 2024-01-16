<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = null;

        if (Auth::check() && !Session::has('locale')) {
            $locale = $request->user()->locale;
            Session::put('locale', $locale);
        }

        if ($request->has('locale')) {
            $locale = $request->get('locale');
            Session::put('locale', $locale);
        }

        $locale = Session::get('locale');

        if (null === $locale) {
            $locale = config('app.fallback_locale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
