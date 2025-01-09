<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function show()
    {
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {
            return redirect(route('discussions.index'));
        }

        return redirect()->back()->withInput()
            ->withErrors([
                'credentials' => 'The Email or Password is incorrect!',
            ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
