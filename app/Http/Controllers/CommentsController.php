<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;

class CommentsController extends Controller
{
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:6000',// contentフィールドは必須チェック、6000文字以内かをチェックする
        ]);

        // idの値でトピックを検索して取得
        $topic = Topic::findOrFail( $request->topic_id);
        
        // 対象となるトピックについて、認証済みユーザ（自分）のコメントとして投稿する
        $topic->comments()->create([
            'user_id' => \Auth::id(),
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    

    
    public function destroy($id)
    {
        // idの値でコメントを検索して取得
        $comment = \App\Comment::findOrFail($id);
        
        // 認証済みユーザ(閲覧者)がそのコメントの所有者である場合は、コメントを削除
        if (\Auth::id() === $comment->user_id) {
            $comment -> delete();
        }
        
        // 前のURLへリダイレクトさせる
        return back();
    }
}
