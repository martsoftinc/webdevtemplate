<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // Adjust view path as needed
    }




    public function login(Request $request) 
    {
        
        $request->validate([
        'email' => 'required|email',
        'password' => 'required'
        ]);
        $credentials = $request->only('email','password');
       
        if (Auth::attempt($credentials)) 
        {
            $user = Auth::user();
            if (!$user->last_login_at || $user->last_login_at->diffInHours(now()) >= 24) {
            $user->streak_days = ($user->streak_days ?? 0) + 1;
            $user->save();
        }
        
        // Update last login time
        $user->last_login_at = now();
        $user->save();

        $userRole = Auth::user()->role;

        switch ($userRole) {
            case 'admin':
                return redirect()->route('admin.dashboard');
                break;
            case 'student':
                return redirect()->route('student.dashboard');
                break;
            case 'pending':
                return redirect()->route('pending');
                break  ;  
            // Add more cases for other roles as needed
            default:
                return redirect()->route('login');
        }
            
           
        }
        return back()->withErrors(['loginError' => 'Invalid username or password.']); 
        
        }





    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

      return redirect('/login')->with('success', 'Logged out successfully.');
    }




}
