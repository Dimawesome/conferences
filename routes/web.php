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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/about', \App\Http\Controllers\AboutController::class);

Route::get('/', function () {
    return view('home.index');
})->name('home.index');

Route::get('/contact', function () {
    return view('home.contact');
})->name('home.contact');

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
        ],
    ],
    2 => [
        'title' => 'Second article',
        'content' => 'Second article text 123123',
        'is_new' => false
    ],
];

Route::view('/', 'home.index')->name('home.index');
Route::view('/contact', 'home.contact')->name('home.contact');


//Route::get('/articles', [ArticlesController::class, 'index']);
//Route::resource('articles', ArticlesController::class)->only(['index', 'show']);

//Route::get('/articles/{id}', function ($articleId) {
//    $articles = [
//        1 => [
//            'title' => 'First article',
//            'content' => 'First article text 123123',
//            'is_new' => true,
//            'has_comments' => true,
//            'authors' => [
//                1 => [
//                    'name' => 'John',
//                    'surname' => 'Doe'
//                ],
//                2 => [
//                    'name' => 'Vardenis',
//                    'surname' => 'Pavardenis'
//                ],
//                3 => [
//                    'name' => 'Petras',
//                    'surname' => 'Petraitis'
//                ]
//            ],
//        ],
//        2 => [
//            'title' => 'Second article',
//            'content' => 'Second article text 123123',
//            'is_new' => false
//        ],
//    ];
//
//    abort_if(!isset($articles[$articleId]), 404);
//
//    return view('articles.show', ['article' => $articles[$articleId]]);
//})->name('articles.show');
//
//Route::get('/articles/recent/{days?}', function ($days = 25) {
//    return "Articles from $days days ago";
//})->name('articles.recent');

//Route::prefix('/lecture')->name('lecture.')->group(function() use ($articles) {
//    Route::get('response', static function () use ($articles) {
//        return response($articles, 201)
//            ->header('Content-Type', 'application/json')
//            ->cookie('USER_COOKIE', 'Jhon Doe', 3600);
//    })->name('response');
//
//    Route::get('redirect', function () {
//        return redirect('/contact');
//    })->name('redirect');
//
//    Route::get('back', function () {
//        return back();
//    })->name('back');
//
//    Route::get('named-route', function () {
//        return redirect()->route('articles.show', ['id' => 2]);
//    })->name('named-route');
//
//    Route::get('away', function () {
//        return redirect()->away('https://google.com');
//    })->name('away');
//
//    Route::get('json', function () use ($articles) {
//        return response()->json($articles);
//    })->name('json');
//
//    Route::get('download', function () use ($articles) {
//        return response()->download(public_path('test.jpg'));
//    })->name('download');
//});


Route::post('/articles/list', function (Request $request) {
    dd($request->query());
});
