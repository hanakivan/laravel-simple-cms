<?php

namespace hanakivan\LaravelSimpleCms\app\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * @property-read Int $id
 * @property String $title
 * @property String $slug
 * @property String $contents
 *
 * @mixin Builder
 *
 * @property Collection<ArticleCategory> $categories
 */
class Article extends Model
{
    use SoftDeletes;

    public $table = "hanakivan_articles";

    public function categories()
    {
        return $this->belongsToMany(ArticleCategory::class, "hanakivan_articles_to_category");
    }
}
