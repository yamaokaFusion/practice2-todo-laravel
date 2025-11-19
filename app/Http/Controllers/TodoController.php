<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // 一覧表示
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('todos.index', compact('todos'));
    }

    // 新規追加
    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Todo::create(['title' => $request->title]);
        return redirect()->back();
    }

    // 完了・未完了の切替
    public function update(Request $request, Todo $todo)
    {
        $todo->update(['is_done' => !$todo->is_done]);
        return redirect()->back();
    }

    // 削除
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back();
    }
}
