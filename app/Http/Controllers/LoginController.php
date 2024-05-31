<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * return login page
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('index');
    }

    /**
     * authenticate user and redirect to the posts page or login page
     * @param LoginRequest $request
     * @return RedirectResponse
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('posts');
        }

        return back()->withErrors([
            'email' => 'Wrong credentials',
        ])->onlyInput('email');
    }

    /**
     * log out user
     * @return RedirectResponse
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->intended('/');
    }
}
