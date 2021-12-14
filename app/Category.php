<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['content'];

    /**
     * このカテゴリが所有するトピック(Topicモデルとの関係を定義)
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    
    /**
     * このカテゴリが所有するコメント(Commentモデルとの関係を定義)
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}