<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'article_id',
        'title',
        'description',
        'text'
    ];

    protected $visible = [
        'article_id',
        'title',
        'description',
        'text'
    ];

    public function comment() {
        return $this->hasMany('App\Comment');
    }
}
