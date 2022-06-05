<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);

        return view('article.index', [
            'articles' => $articles,
            'total' => $articles->total(),
            'perPage' => $articles->perPage(),
            'currentPage' => $articles->currentPage()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => '$request->image',
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
        ]);

        return redirect(route('Article'))->with('successMessage', 'Berhasil input data!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.update', [
            'article' => $article,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => '$request->image',
            'category_id' => $request->category,
        ]);

        return redirect(route('Article'))->with('updateMessage', 'Berhasil update data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('Article'))->with('deleteMessage', 'Berhasil delete data!');
    }
}
