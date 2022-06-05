<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function allPost(Request $request)
    {
        $articles = Article::paginate(5);

        return response()->json([
            'current_page' => $articles->currentPage(),
            'total_pages' => $articles->lastPage(),
            'total_articles' => $articles->total(),
            'articles' => $articles->items()
        ]);
    }

    public function show(Article $article)
    {
        return response()->json($article);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);

        $a = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'message' => 'Berhasil insert data!',
            'data' => $a
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json([
            'message' => 'data berhasil di update!',
            'data' => $article
        ]);
    }

    public function delete(Article $article)
    {
        $data = $article->delete();

        return response()->json([
            'message' => 'Data berhasil di delete',
            'status' => $data
        ]);
    }
}
