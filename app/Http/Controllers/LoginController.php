<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // validate request
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // use Auth class to check login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put("email", $request->email);
            return redirect()->intended('/dashboard')->with('messageSuccess', 'Berhasil Login!');
        } else {
            $request->session()->flash('messageError', 'Gagal Login!');

            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
