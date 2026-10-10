<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.orders');
        }

        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $adminEmail = env('ADMIN_EMAIL');
        $adminPassword = env('ADMIN_PASSWORD');

        if (
            $request->email === $adminEmail &&
            Hash::check($request->password, $adminPassword)
        ) {
            session([
                'admin_logged_in' => true,
                'admin_email' => $request->email,
            ]);

            return redirect()->route('admin.orders');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Invalid email or password.',
            ]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget([
            'admin_logged_in',
            'admin_email',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}