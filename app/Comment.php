<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'comment_id',
        'article_id',
        'text'
    ];

    protected $visible = [
        'comment_id',
        'article_id',
        'text'
    ];

    public function article() {
        return $this->hasOne('App\Article','article_id','article_id');
    }
}
