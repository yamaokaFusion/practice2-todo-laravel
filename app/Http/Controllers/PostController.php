<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 投稿一覧を表示
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    // 投稿保存処理
    public function store(Request $request)
    {
        // 入力チェック
        $request->validate([
            'name' => 'required|max:255',
            'message' => 'required',
        ]);

        // データ保存
        Post::create([
            'name' => $request->name,
            'message' => $request->message,
        ]);

        // 一覧に戻りつつ成功メッセージを表示
        return redirect()->route('posts.index')->with('success', '投稿が完了しました！');
    }
}
