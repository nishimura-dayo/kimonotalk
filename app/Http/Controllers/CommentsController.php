<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use Storage;

class CommentsController extends Controller
{
    
    public function store(Request $request)
    {
        // dd($request->file('image_path')); // フォームから送信されたimage_pathをファイル形式で取得できるか
        // バリデーション
        $request->validate([
            'content' => 'required|max:6000',// contentフィールドは必須チェック、6000文字以内かをチェックする
            'image_path' => ['file','mimes:jpeg,png,jpg,bmb','max:2048'],
        ]);

        // s3アップロード開始
        $image = $request->file('image_path');
        
        // 画像が無い場合
        $image_path = null;
        $s3_path = null;
        
        // 画像ファイルが送信されたか確認
        if ($request->hasFile('image_path')) {
            
            // S3に画像をアップロードし、「S3上の画像の場所」を取得する
            $s3_path = Storage::disk('s3')->putFile('kimonotalk-s3disk', $image, 'public');
           
            // 「S3上の画像の場所」を元に、「Webページからアクセスできる画像のURL」を取得する
            $image_path = Storage::disk('s3')->url($s3_path);
        }
    
        // idの値でトピックを検索して取得
        $topic = Topic::findOrFail( $request->topic_id);
        
        // 対象となるトピックについて、認証済みユーザ（自分）のコメントとして投稿する
        $topic->comments()->create([
            'user_id' => \Auth::id(),
            'content' => $request->content,
            'image_path' => $image_path,
            's3_path' => $s3_path,
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
            Storage::disk('s3')->delete($comment->s3_path);
            $comment -> delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
