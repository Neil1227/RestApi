<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Load your custom Blade login view
    }

    public function login(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'user' => 'required',
            'password' => 'required'
        ]);

        // Check if input is an email or username
        $fieldType = filter_var($request->user, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$fieldType => $request->user, 'password' => $request->password])) {
            return redirect()->intended('/dashboard'); // Redirect to dashboard if successful
        }

        return back()->withErrors(['user' => 'Invalid username or password.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

