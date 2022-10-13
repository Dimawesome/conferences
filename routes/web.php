<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('home.index');
//})->name('home.index');

//Route::get('/contact', function () {
//    return view('home.contact');
//})->name('home.contact');

Route::view('/', 'home.index')->name('home.index');
Route::view('/contact', 'home.contact')->name('home.contact');

Route::get('/articles/{id}', function ($articleId) {
    $articles = [
        1 => [
            'title' => 'First article',
            'content' => 'First article text 123123',
            'is_new' => true,
            'has_comments' => true,
            'authors' => [
                1 => [
                    'name' => 'John',
                    'surname' => 'Doe'
                ],
                2 => [
                    'name' => 'Vardenis',
                    'surname' => 'Pavardenis'
                ],
                3 => [
                    'name' => 'Petras',
                    'surname' => 'Petraitis'
                ]
            ],
        ],
        2 => [
            'title' => 'Second article',
            'content' => 'Second article text 123123',
            'is_new' => false
        ],
    ];

    abort_if(!isset($articles[$articleId]), 404);

    return view('articles.show', ['article' => $articles[$articleId]]);
})->name('articles.show');

Route::get('/articles/recent/{days?}', function ($days = 25) {
    return "Articles from $days days ago";
})->name('articles.recent');

