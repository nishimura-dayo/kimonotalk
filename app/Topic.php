<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['content'];
    
    /**
     * このトピックを所有するユーザ(Userモデルとの関係を定義)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
