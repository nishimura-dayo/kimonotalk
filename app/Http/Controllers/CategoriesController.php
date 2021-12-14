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
        return view('category.index', [
            'categories' => $categories,
        ]);
    }
    
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $category = Category::findOrFail($id);
        
        // カテゴリ一覧ビューでそれらを表示
        return view('category.show', [
            'category' => $category,
        ]);
    }
}
