<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::findAll()
    ]);
});

Route::get('posts/{post}', function (id) {
    $post = Post::find(id);

    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+'); // Allowed only dash and underscore in route
