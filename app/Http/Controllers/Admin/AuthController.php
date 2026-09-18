<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (session()->get('admin_logged_in') || Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ], [
            'login.required' => 'Please enter your Admin Email or Username.',
            'password.required' => 'Please enter your Admin Password.',
        ]);

        $login = trim($request->input('login'));
        $password = $request->input('password');

        $user = User::where('email', $login)->orWhere('name', $login)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            session()->put('admin_logged_in', true);
            session()->put('admin_user_name', $user->name);
            session()->put('admin_user_email', $user->email);

            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, ' . $user->name . '!');
        }

        return redirect()->back()->withInput($request->only('login'))->with('error', 'Invalid Username/Email or Password!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->forget(['admin_logged_in', 'admin_user_name', 'admin_user_email']);
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out of Admin Panel successfully.');
    }
}
