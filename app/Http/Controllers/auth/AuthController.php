<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return response()->view('auth.login');
    }

    public function login(Request $request)
    {

        $validator = Validator($request->all(), [
            'email' => 'required|email|max:255|',
            'password' => 'required|min:8|',
        ]);

        if (!$validator->fails()) {
            $credentials = $request->only(['email', 'password']);

            if (Auth::guard('user')->attempt($credentials)) {
                // Authentication passed using the 'web' guard
                $request->session()->regenerate();
                return redirect()->intended('/');
            } elseif (Auth::guard('employee')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            } elseif (Auth::guard('manager')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            } elseif (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect('/cms/admin')->with(['success' => 'Welcome Back!']);
            } else {
                // Authentication failed
                return redirect()->back()->with(['message' => 'Invalid email or password.']);
            }
        } else {
            return redirect()->back()->with(['message' => $validator->getMessageBag()]);
        }
    }

    public function showRegisterForm()
    {
        return response()->view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required|min:10|max:10|unique:users,phone',
            'address' => 'nullable|min:3|max:255',

        ]);
        // dd($validator);

        if (!$validator->fails()) {

            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
            auth()->guard('admin')->login($admin);
            //        session()->flash('success', 'Your account has been created');
            return redirect('/')->with('success', 'Your account has been created');
        } else {
            // return redirect()->back()->withErrors($validator)->withErrors('Error');
            return response()->json(['message' => 'error']);
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('cms.login');
    }
}
