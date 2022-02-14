<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['content', 'category_id', 'image_path', 's3_path'];
    
    /**
     * このトピックを所有するユーザ(Userモデルとの関係を定義)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * このトピックにつくコメント(Commentモデルとの関係を定義)
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
     * このコメントを所有するカテゴリ(Categoryモデルとの関係を定義)
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
