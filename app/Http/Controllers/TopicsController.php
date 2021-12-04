<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;

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
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->topics()->create([
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }

    public function show($id)
    {
        // idの値でトピックを検索して取得
        $topic = Topic::findOrFail($id);

        // トピック詳細ビューでそれを表示
        return view('topics.show', [
            'topic' => $topic,
        ]);
    }

    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $topic = \App\Topic::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $topic->user_id) {
            $topic->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
