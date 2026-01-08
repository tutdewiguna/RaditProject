<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('Backend.Views.login');
    }

    public function register()
    {
        return view('Backend.Views.register');
    }

    public function attemptRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|regex:/^[\pL\s]+$/u',
            'password' => 'required|min:6',
            'confirmpassword' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.register')
                ->withInput()
                ->withErrors($validator);
        }

        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'role_id' => 1,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Registration successful. Please login.');
    }

    public function attemptLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            session([
                'isAdminLoggedIn' => true,
                'userId' => $user->id,
                'email' => $user->email,
                'name' => $user->name ?? '',
                'role_id' => $user->role_id ?? '',
            ]);

            return redirect()->route('admin.home');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('home');
    }
}

