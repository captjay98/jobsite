<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employer;
use App\Models\Seeker;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:25|unique:'.User::class,
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'account_type' => 'required|string|',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'account_type' => $request->account_type,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        var_dump($user->id);

        if ($request->account_type === "employer") {
            Employer::create(['user_id' => $user->id]);
        } elseif ($request->account_type === "seeker") {
            Seeker::create(['user_id' => $user->id]);
        }

        event(new Registered($user));

        Auth::login($user);

        if ($request->account_type === "employer") {
            return redirect(RouteServiceProvider::EHOME);
        } elseif ($request->account_type === "seeker") {
            return redirect(RouteServiceProvider::SHOME);
        } // elseif ($request->account_type === "admin") {
        //     return redirect(RouteServiceProvider::SHOME);
        // }


        return redirect(RouteServiceProvider::HOME);
    }
}
