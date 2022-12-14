<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Response;
use Illuminate\Session\Store;
use Illuminate\View\View;

/**
 * Class ArticleController
 *
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $article = new Article();

        return view('articles.index', ['articles' => $article->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticleRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function store(StoreArticleRequest $request, Article $article): RedirectResponse
    {
        $validated = $request->validated();
        $article->fill($validated);
        $article->save();

        $request->session()->flash('status', 'Article created!');

        return redirect()->route('articles.show', ['article' => $article->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        return view('articles.show', ['article' => (new Article)->findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('articles.edit', ['article' => (new Article())->findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreArticleRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(StoreArticleRequest $request, int $id): RedirectResponse
    {
        $article = (new Article())->findOrFail($id);
        $validated = $request->validated();
        $article->fill($validated);
        $article->save();

        $request->session()->flash('status', 'Article was updated!');

        return redirect()->route('articles.show', ['article' => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $article = (new Article())->findOrFail($id);
        $article->delete();

        session()->flash('status', 'Article was deleted!');

        return redirect()->route('articles.index');
    }
}
