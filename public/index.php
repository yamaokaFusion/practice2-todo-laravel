<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());

/**
 * 上から記載されている関数やその処理をまとめる
 * 
 * 3.
 * ＝
 * 
 * 4.
 * ＝
 * 
 * 6.define('LARAVEL_START', microtime(true));
 * ＝ 定数を定義してます。定数名を最初に、その次に値を設定し、定数を定義します。
 * 　 今回はLARAVEL_STARTを名前として、タイムスタンプとミリ秒を取得し、値とします。
 * 
 * 9.
 * ＝
 */