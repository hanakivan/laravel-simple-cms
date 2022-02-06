<?php

namespace hanakivan\LaravelSimpleCms;

use App\Http\Controllers\Controller;
use hanakivan\LaravelSimpleCms\Models\Article;
use Illuminate\Http\Request;

class LaravelSimpleCMSController extends Controller
{
    public const DEFAULT_ROUTE_PREFIX = "clanky";

    public function index(Request $request, int $page = 1)
    {
        $page = (int)$page;
        $perPage = (int)config("hanakivan.listing.perPage");
        $total = Article::count();

        $limit = $perPage;
        $offset = ($page-1)*$perPage;

        $articles = Article::limit($limit)->offset($offset)->orderByDesc("published_at")->get();

        return view("hanakivan::index", [
            "articles" => $articles,
            "title" => "Domov",
            "pagination" => [
                "totalResults" => $total,
                "totalPages" => ceil($total/$perPage),
                "page" => $page,
                "perPage" => $perPage,
            ]
        ]);
    }

    public function detail(Request $request, String $slug)
    {
        $article = Article::where("slug", $slug)->firstOrFail();

        return view("hanakivan::detail", [
            "title" => $article->title,
            "article" => $article,
        ]);
    }
}
