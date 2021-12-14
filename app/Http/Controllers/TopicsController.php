<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use Storage;

class TopicsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // エンドユーザが認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            $topics = \App\Topic::orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'topics' => $topics,
            ];
        }
        
        // トピック一覧ビューでそれらを表示
        return view('topics.index', $data);
    }
    
    
    public function store(Request $request)
    {
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
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->topics()->create([
            'content' => $request->content,
            'image_path' => $image_path,
            's3_path' => $s3_path,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }

    public function show($id)
    {
        // idの値でトピックを検索して取得
        $topic = Topic::findOrFail($id);
        
        // 特定トピックについたコメント一覧を表示
        $comments = $topic->comments()->paginate(10);

        // トピック詳細ビューでそれを表示
        return view('topics.show', [
            'topic' => $topic,
            'comments' => $comments,
        ]);
    }

    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $topic = \App\Topic::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $topic->user_id) {
            Storage::disk('s3')->delete($topic->s3_path);
            $topic->delete();
        }
       
        // メッセージ作成ビューを表示
        return redirect('topics');
    }
}
