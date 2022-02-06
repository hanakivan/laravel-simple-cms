<?php

namespace hanakivan\LaravelSimpleCms\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * @property-read Int $id
 * @property String $name
 * @property String slug
 *
 * @mixin Builder
 *
 * @property Collection<Article> $articles
 */
class ArticleCategory extends Model
{
    use SoftDeletes;

    public $table = "hanakivan_articles_category";

    public function articles()
    {
        return $this->belongsToMany(Article::class, "hanakivan_articles_to_category");
    }
}
