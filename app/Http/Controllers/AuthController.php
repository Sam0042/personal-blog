<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request){
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|min:3',
            'name' => 'required'
        ],
        [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password harus lebih dari 8 karakter',
            'name.required' => 'Nama wajib diisi',
        ]);
        $request['status'] = 'verify';
        $data = User::create($request->all());
        Auth::login($data);
        return redirect('/dashboard');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|max:50'
        ],
        [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);
        if(Auth::attempt($request->only('email', 'password'), $request->remember)){
            return redirect('/dashboard');
        };
        return back()->with('failed', 'Email atau password salah');
    }


    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect('/login');
}
}
