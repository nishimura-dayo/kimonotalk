<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Storage;

class UsersController extends Controller
{
    public function index()
    {
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // ユーザのトピック一覧を作成日時の降順で取得
        $topics = $user->topics()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれらを表示
        return view('users.show', [
            'user' => $user,
            'topics' => $topics,
        ]);
    }

    public function avatorUpdate(Request $request)
    {
        // バリデーション
        $request->validate([
            'image_path' => ['file','mimes:jpeg,png,jpg,bmb','max:2048'],
        ]);

        // s3アップロード開始
        $image = $request->file('image_path');

        // 画像が無い場合
        $image_path = null;

        // 画像ファイルが送信されたか確認
        if ($request->hasFile('image_path')) {
            // S3に画像をアップロードし、「S3上の画像の場所」を取得する
            $path = Storage::disk('s3')->putFile('kimonotalk-s3disk', $image, 'public');

            // 「S3上の画像の場所」を元に、「Webページからアクセスできる画像のURL」を取得する
            $image_path = Storage::disk('s3')->url($path);
        }

        $user = \Auth::user();
        $user->image_path = $image_path;
        $user->save();

        // 前のURLへリダイレクトさせる
        return back();
    }
}