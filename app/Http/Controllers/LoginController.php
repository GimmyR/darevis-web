<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(): View {

        return view("login.loginForm");

    }

    public function doLogin(LoginRequest $request): RedirectResponse {

        $credentials = $request->validated();

        if(Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route("home");

        } else {
            
            $errors["email"] = "There is an error between your email and password.";
            
            return redirect()->route("login.loginForm")->withInput()->withErrors($errors);

        }

    }

    public function doLogout(): RedirectResponse {

        Auth::logout();

        return redirect()->route("login.loginForm");

    }
}
