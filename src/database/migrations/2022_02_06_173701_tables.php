<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("hanakivan_articles_category", function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->string("slug", 50);

            $table->unique(["slug"], "hanakivan_articles_category_uniq");

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create("hanakivan_articles", function (Blueprint $table) {
            $table->id();
            $table->string("title", 255);
            $table->string("slug", 255);
            $table->text("contents");

            $table->timestamp("published_at");
            $table->timestamp("modified_at");

            $table->integer("user_id")->nullable();

            $table->unique(["slug"], "hanakivan_articles_uniq");

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete()->cascadeOnUpdate();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create("hanakivan_articles_to_category", function (Blueprint $table) {
            $table->integer("article_id");
            $table->integer("category_id");

            $table->foreign('article_id')->references('id')->on('hanakivan_articles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('category_id')->references('id')->on('hanakivan_articles_category')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("hanakivan_articles_to_category");
        Schema::dropIfExists("hanakivan_articles_category");
        Schema::dropIfExists("hanakivan_articles");
    }
}
