<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ArticlesController;

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

$posts = [
    1 => [
        'title' => 'First article',
        'content' => 'First article content',
        'is_new' => true,
        'authors' => [
            1 => [
                'name' => 'Authorname_1',
                'surname' => 'Authorsurname_1',
            ],
            2 => [
                'name' => 'Authorname_2',
                'surname' => 'Authorsurname_2',
            ],
        ]
    ],
    2 => [
        'title' => 'Second article',
        'content' => 'Second article content',
        'is_new' => false,
        'authors' => [
            1 => [
                'name' => 'Authorname_3',
                'surname' => 'Authorsurname_3',
            ],
        ]
    ],
];

Route::prefix('posts')->name('posts.')->group(function () use ($posts) {
    Route::get('/', function () use ($posts) {
        return view('posts.index', ['posts' => $posts]);
    })->name('index');

    Route::get('newest/{isNew?}', function (bool $isNew = false) use ($posts) {
        $data = [];

        if ($isNew) {
            foreach ($posts as $key => $post) {
                if ($post['is_new']) {
                    $data[$key] = $post;
                }
            }
        } else {
            $data = $posts;
        }

        return view('posts.index', ['posts' => $data]);
    })->name('newest');

    Route::get('{id}', function (int $id) use ($posts) {
        abort_if(!isset($posts[$id]), 404);

        return view('posts.show', ['post' => $posts[$id]]);
    })->name('show');

    Route::get('author/{postId}/{authorId}', function (int $postId, int $authorId) use ($posts) {
        abort_if(!isset($posts[$postId]['authors'][$authorId]), 404);

        return view('posts.author', [
            'postTitle' => $posts[$postId]['title'],
            'author' => $posts[$postId]['authors'][$authorId]
        ]);
    })->name('author');
});

Route::view('/', 'home.index');
Route::view('/contact', 'home.contact');

Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('recent/{days?}', function ($days = 25) {
        return "Article from $days days ago";
    })->name('recent');

    Route::get('{id}', function ($id) {
        $articles = [
            1 => [
                'title' => 'Title 1',
                'content' => 'Content 1'
            ],
            2 => [
                'title' => 'Title 2',
                'content' => 'Content 2'
            ]
        ];

        abort_if(!isset($articles[$id]), 500);

        return view('articles.show', ['article' => $articles[$id]]);
    })->name('show');
});
