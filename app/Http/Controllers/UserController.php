<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * return register page
     * @return View
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function register(): View
    {
        return view("register");
    }

    /**
     * register an user
     * @param RegisterRequest $request
     * @return Application|\Illuminate\Foundation\Application|Redirector|RedirectResponse
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function doRegister(RegisterRequest $request): \Illuminate\Foundation\Application|Redirector|Application|RedirectResponse
    {
        $validated = $request->validated();

        User::query()
            ->create([
                "name" => $validated["name"],
                "email" => $validated["email"],
                "password" => $validated["password"],
            ]);

        return redirect(route('login'))->with('success', 'You are now registered');
    }

    /**
     * return login page
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function login(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view("index");
    }

    /**
     * authenticate user and redirect to the posts page or login page
     * @param AuthenticateRequest $request
     * @return RedirectResponse
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function doLogin(AuthenticateRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended("posts")->with('success', 'You are now logged ' . auth()->user()->name);
        }

        return back()->withErrors([
            "email" => "Wrong credentials",
        ])->onlyInput("email");
    }

    /**
     * log out user
     * @return RedirectResponse
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->intended("/");
    }
}
