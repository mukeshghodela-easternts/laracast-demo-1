<?php

use App\Http\Controllers\PostCommentsController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Services\Newsletter;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post}', [PostController::class, 'show'])->name('post');

Route::post('newsletter', function (Newsletter $newsletter) {

    request()->validate(['email' => 'required|email']);

    try {
        $newsletter->subscribe(request('email'));
    } catch (\Exception $e) {
        throw \Illuminate\Validation\ValidationException::withMessages(["email" => "This email could not be added to our newsletter."]);;
    }

    return redirect('/')->with('success', 'You are now signed up for our newsletter');
});


Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'userLogout'])->middleware('auth');







// Route::get('categories/{category:slug}', function (Category $category) { //Find post by slug
//     return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');

// Route::get('authors/{author:username}', function (User $author) { //Find post by author
//     return view('posts.index', [
//         'posts' => $author->posts,
//         'categories' => Category::all()
//     ]);
// });
