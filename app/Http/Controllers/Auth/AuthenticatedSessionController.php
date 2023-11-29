<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        // dd(Auth()->user()->is_active);
        if (!Auth()->user()->is_active) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return abort(403, 'Account Deactivated, Contact Admin.');
        }

        $request->session()->regenerate();
        if (Auth()->user()->account_type === "employer") {
            return redirect(RouteServiceProvider::EHOME);

        } elseif (Auth()->user()->account_type === "seeker") {
            return redirect(RouteServiceProvider::SHOME);

        } elseif (Auth()->user()->is_admin === true) {
            return redirect(RouteServiceProvider::AHOME);
        }

        return redirect()->intended(RouteServiceProvider::HOME);


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
