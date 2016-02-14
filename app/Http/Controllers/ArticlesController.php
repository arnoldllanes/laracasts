<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\Http\Requests;

use App\Http\Requests\ArticleRequest;

use App\Http\Controllers\Controller;

use Carbon\Carbon;


class ArticlesController extends Controller
{
   public function index()
   {
   		$article = Article::latest('published_at')->published()->get();

   		return view('articles.index')->with('articles', $article);
   }

   public function show($id)
   {
   		$article = Article::findOrFail($id);

   		return view('articles.show')->with('article', $article);
   }

   public function create()
   {
   		return view('articles.create');
   }


   //This type hint is from the CreateArticleRequest under App\Requests... The body of this method will not fire unless the validation passes
   public function store(ArticleRequest $request)
   {

   		Article::create($request->all());

   		return redirect('articles');
   }

   public function edit($id)
   {
      $article = Article::findOrFail($id);

      return view('articles.edit')->with('article', $article);
   }

   public function update($id, ArticleRequest $request)
   {
      $article = Article::findOrFail($id);

      $article->update($request->all());

      return redirect('articles');
   }

}
