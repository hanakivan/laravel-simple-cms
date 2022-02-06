<?php

namespace hanakivan\LaravelSimpleCms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use hanakivan\LaravelSimpleCms\app\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function config;
use function view;

class LaravelSimpleCMSAuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::check()) {
            return redirect()->route("hanakivan.cms.auth.home");
        }

        if($request->method() === "POST") {
            $credentials = [
                "email" => $request->post("email"),
                "password" => $request->post("password"),
            ];

            User::where("email", $credentials["email"])->update([
                'password' => Hash::make($credentials["password"])
            ]);

            if(Auth::attempt($credentials, true)) {
                return redirect()->route("hanakivan.cms.auth.login");
            } else {
                die("bad password");
            }

        } else {
            return view("hanakivan::auth.login", [
                "title" => "Prihlásenie",
            ]);
        }
    }

    public function home()
    {
        return view("hanakivan::auth.home", [
            "title" => "Domov",
        ]);
    }
}
