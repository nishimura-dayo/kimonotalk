<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        // カテゴリ一覧を取得
        $categories = Category::all();
        
        // カテゴリ一覧ビューでそれらを表示
        return view('index', [
            'categories' => $categories,
        ]);
    }
    
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $category = Category::findOrFail($id);

        if (\Auth::check()) { // エンドユーザが認証済みの場合
            // $topics = $category->topics()->orderBy('created_at', 'desc')->paginate(10);
            $topics = \App\Topic::where("category_id", $category->id)->orderBy('created_at', 'desc')->paginate(10);
        }
        
        // カテゴリ一覧ビューでそれらを表示
        return view('categories.show', [
            'category' => $category,
            'topics' => $topics,
        ]);
    }
}
