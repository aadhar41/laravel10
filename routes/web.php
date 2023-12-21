<?php

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

Route::view('/', 'home.index')->name('home.index');
Route::view('/contact', 'home.contact')->name('home.contact');

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

Route::get('/posts', function () use ($posts) {
    return view('posts.index', ['posts' => $posts]);
});

Route::get('/posts/{id}', function ($id) use ($posts) {
    abort_if(!isset($posts[$id]), 404);
    return view('posts.show', ['posts' => $posts[$id]]);
})->name('posts.show');

Route::get('recent-posts/{days_ago?}', function ($daysAgo = 20) {
    return 'Post from ' . $daysAgo . ' days ago.';
})->name('posts.recent.index');
