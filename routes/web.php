<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    $document = YamlFrontMatter::parseFile(resource_path('posts/my-fourth-post.html'));

    ddd($document->title);
    // return Post::find('my-first-post');
    // $posts = Post::findAll();
    // return view('posts', [
    //     'posts' => $posts
    // ]);
});

Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+'); // Allowed only dash and underscore in route
