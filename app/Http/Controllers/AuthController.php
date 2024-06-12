<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): view|RedirectResponse
    {
        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request): view|RedirectResponse
    {
        if ($request->isMethod('get')) {
            return view('auth.register');
        }

        $validation = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'full_name' => 'required|string',
            'company_name' => 'required|string'
        ]);

        if (!$validation->fails()) {
            $user = User::create([
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'full_name' => $request->get('full_name'),
                'company_name' => $request->get('company_name')
            ]);

            Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]);
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withInput()->withErrors(['error' => $validation->errors()->first()]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login.form'));
    }
}
