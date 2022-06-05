<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function allPost()
    {
        return response()->json([
            Article::all()
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
