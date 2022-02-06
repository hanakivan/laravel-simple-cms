<?php

namespace hanakivan\LaravelSimpleCms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
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

    public function logout()
    {
        Auth::logout();

        return redirect()->to("/");
    }

    public function home()
    {
        return view("hanakivan::auth.home", [
            "title" => "Domov",
            "active" => "home",
        ]);
    }

    public function articles(Request $request)
    {
        return view("hanakivan::auth.articles", [
            "articles" => Article::orderByDesc("published_at")->get(),
            "title" => "Články",
            "active" => "articles",
            "isDeleted" => $request->has("deleted"),
        ]);
    }

    public function createArticle(Request $request)
    {
        $article = new Article();

        return view("hanakivan::auth.articles-form", [
            "article" => $article,
            "title" => "Vytvoriť článok",
            "isSaved" => false,
            "active" => "articles",
        ]);
    }

    public function editArticle(int $id, Request $request)
    {
        $article = Article::findOrFail($id);

        return view("hanakivan::auth.articles-form", [
            "article" => $article,
            "title" => "Upraviť článok",
            "isSaved" => $request->has("saved"),
            "active" => "articles",
        ]);
    }

    public function articleSubmit(Request $request)
    {
        $validated = $request->validate([
            "title" => "required",
            "contents" => "required",
        ]);

        $id = (int)$request->input("id");

        if($id) {
            $article = Article::findOrFail($id);
        } else {
            $article = new Article();
            $article->published_at = Carbon::now();
        }

        $article->modified_at = Carbon::now();
        $article->title = $validated["title"];
        $article->slug = mb_strtolower(str_replace([" "], ["-"], $article->title));
        $article->contents = $validated["contents"];
        $article->save();

        return redirect()->route("hanakivan.cms.auth.articles.edit", [
            "id" => $article->getKey(),
            "saved" => 1,
        ]);
    }

    public function deleteArticle(Int $id, Request $request)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect()->route("hanakivan.cms.auth.articles.list", [
            "deleted" => 1,
        ]);
    }
}
