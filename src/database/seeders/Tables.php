<?php

namespace hanakivan\LaravelSimpleCms\database\seeders;

use Carbon\Carbon;
use Faker\Provider\Text;
use hanakivan\LaravelSimpleCms\Models\ArticleCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Tables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hanakivan_articles')->insert([
            'slug' => Str::random(10),
            'title' => Str::random(10),
            'contents' => "",
            "published_at" => Carbon::now(),
            "modified_at" => Carbon::now(),
        ]);
    }
}
