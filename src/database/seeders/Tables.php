<?php

namespace hanakivan\LaravelSimpleCms\database\seeders;

use Carbon\Carbon;
use Faker\Factory;
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
        $faker = Factory::create();

        for($i=1;$i<=50;$i++) {
            $title = $faker->unique()->city();
            DB::table('hanakivan_articles')->insert([
                'slug' => str_replace(" ", "-", Str::lower($title)),
                'title' => $title,
                'contents' => $faker->text(),
                "published_at" => Carbon::now(),
                "modified_at" => Carbon::now(),
            ]);
        }
    }
}
