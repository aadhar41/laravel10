<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     // return '<h1>Home Page</h1>';
//     return view('home.index', []);
// })->name('home.index');

// Route::get('contact', function () {
//     return view('home.contact', []);
// })->name('home.contact');

Route::get('/', [HomeController::class, 'home'])
    ->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])
    ->name('home.contact');
// Route::view('/contact', 'home.contact')->name('home.contact');

Route::get('/single', AboutController::class);

$posts = [
    1 => [
        'title' => 'Introduction to laravel.',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        'is_new' => true,
        'has_comments' => true,
    ],
    2 => [
        'title' => 'Amet consectetur, adipisicing elit.',
        'content' => 'Doloremque in repudiandae hic optio laudantium magnam labore architecto tenetur aliquam nulla.',
        'is_new' => false
    ],
    3 => [
        'title' => 'Dolor sit amet consectetur.',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        'is_new' => true,
        'has_comments' => true,
    ],
    4 => [
        'title' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
        'content' => 'Quas cumque doloremque in repudiandae hic optio laudantium magnam labore architecto tenetur aliquam nulla.',
        'is_new' => false
    ],
];

Route::prefix('/fun')->name('fun.')->group(function () use ($posts) {
    Route::get('/responses', function () use ($posts) {
        return response($posts, 200)
            ->header('content-type', 'application/json')
            ->cookie('MY_COOKIE', 'Aadhar gaur', 3600);
    })->name('responses');

    Route::get('/redirect', function () {
        return redirect('/contact');
    })->name('redirect');

    Route::get('/back', function () {
        return back();
    })->name('back');

    Route::get('/named-route', function () {
        return redirect()->route('posts.show', ['id' => 1]);
    })->name('named-route');

    Route::get('/away', function () {
        return redirect()->away('https://www.google.com');
    })->name('away');

    Route::get('/json', function () use ($posts) {
        return response()->json($posts);
    })->name('json');

    Route::get('/download', function () use ($posts) {
        return response()->download(public_path('/daniel.jpg'), 'download.jpg');
    })->name('download');
});

Route::resource('posts', PostsController::class)->only(['index', 'show', 'create', 'store']);

// Route::get('/posts', function (Request $request) use ($posts) {
//     // dd(request()->all());
//     dd((int) request()->query('page', 1));
//     return view('posts.index', ['posts' => $posts]);
// });

// Route::get('/posts/{id}', function ($id) use ($posts) {
//     abort_if(!isset($posts[$id]), 404);
//     return view('posts.show', ['posts' => $posts[$id]]);
// })->name('posts.show');

// Route::get('recent-posts/{days_ago?}', function ($daysAgo = 20) {
//     return 'Post from ' . $daysAgo . ' days ago.';
// })->name('posts.recent.index')->middleware('auth');