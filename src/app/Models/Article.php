<?php

namespace hanakivan\LaravelSimpleCms\app\Models;

use Carbon\Carbon;
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
 * @property String|Carbon $published_at
 * @property String|Carbon $modified_at
 *
 * @mixin Builder
 *
 * @property Collection<ArticleCategory> $categories
 */
class Article extends Model
{
    use SoftDeletes;

    public $table = "hanakivan_articles";

    protected $dates = [
        "published_at",
        "modified_at",
    ];

    public function categories()
    {
        return $this->belongsToMany(ArticleCategory::class, "hanakivan_articles_to_category");
    }
}
