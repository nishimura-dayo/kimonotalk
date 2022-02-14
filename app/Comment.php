<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['content','category_id','user_id','image_path','s3_path'];
    
    /**
     * このコメントを所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このコメントを所有するトピック(Topicモデルとの関係を定義)
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    
    /**
     * このコメントを所有するカテゴリ(Categoryモデルとの関係を定義)
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}