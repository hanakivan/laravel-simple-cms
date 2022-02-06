<?php

namespace hanakivan\LaravelSimpleCms;

use App\Http\Controllers\Controller;
use hanakivan\LaravelSimpleCms\Models\Article;
use Illuminate\Http\Request;

class LaravelSimpleCMSController extends Controller
{
    public const DEFAULT_ROUTE_PREFIX = "clanky";

    public function index(Request $request)
    {
        return view("hanakivan::index", ["title" => "Domov"]);
    }

    public function detail(String $slug, Request $request)
    {
        $article = Article::where("slug", $slug)->firstOrFail();

        return view("hanakivan::detail", ["title" => $article->title    ]);
    }
}
