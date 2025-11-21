<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();                     // 投稿ID（自動採番）
            $table->string('name');           // 投稿者名
            $table->text('message');          // 本文
            $table->string('image')->nullable(); // 画像パス（任意）
            $table->timestamps();             // created_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
