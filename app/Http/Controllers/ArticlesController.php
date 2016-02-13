<?php

namespace App\Http\Controllers;


use App\Article;

use App\Http\Requests;

use App\Http\Requests\CreateArticleRequest;

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
   public function store(CreateArticleRequest $request)
   {

   		Article::create($request->all());

   		return redirect('articles');
   }

   public function edit($id)
   {
      $article = Article::findOrFail($id);

      return view('articles.edit')->with('articles', $article);
   }

}
