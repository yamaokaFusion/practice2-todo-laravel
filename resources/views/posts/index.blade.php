<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>簡易掲示板システム</title>

    <style>
        body {
            width: 600px;
            margin: 40px auto;
            font-family: sans-serif;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        .post {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .name {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>簡易掲示板</h1>

{{-- 成功メッセージ --}}
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

{{-- 投稿フォーム --}}
<form action="{{ route('posts.store') }}" method="post">
    @csrf

    <p>
        <label>名前：</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </p>

    <p>
        <label>メッセージ：</label><br>
        <textarea name="message" rows="3">{{ old('message') }}</textarea>
        @error('message')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </p>

    <button type="submit">投稿する</button>
</form>

{{-- 投稿一覧 --}}
@foreach($posts as $post)
    <div class="post">
        <div class="name">{{ $post->name }}</div>
        <div class="message">{{ $post->message }}</div>
        <div class="date" style="font-size:12px; color:#666;">
            {{ $post->created_at->format('Y-m-d H:i') }}
        </div>
    </div>
@endforeach

</body>
</html>
