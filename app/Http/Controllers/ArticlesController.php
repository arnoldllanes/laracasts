<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Auth\AuthController;

use App\Article;

use App\Http\Requests;

use App\Http\Requests\ArticleRequest;

use App\Http\Controllers\Controller;

use Carbon\Carbon;

use Auth;


class ArticlesController extends Controller
{
   public function __construct() {

      //Run this middle only on the create function
      $this->middleware('auth', ['only' => 'create']);

   }


   public function index()
   {

   		$article = Article::latest('published_at')->published()->get();

   		return view('articles.index')->with('articles', $article);
   }

   public function show(Article $article)
   {
        
   		return view('articles.show')->with('article', $article);
   }

   public function create()
   {
   		return view('articles.create');
   }


   //This type hint is from the CreateArticleRequest under App\Requests... The body of this method will not fire unless the validation passes
   public function store(ArticleRequest $request)
   {
         //Create an article with the attributes from the form
         $article = new Article($request->all());
         
         //Get the authenticated users' articles and save a new one passing through the $article object
         //It is important to note that when you use the method it implies that we are chaining. If I were to use articles-> it would return a collection of all the articles
         
         Auth::user()->articles()->save($article);

   		return redirect('articles');
   }

   public function edit(Article $article)
   {

      return view('articles.edit')->with('article', $article);
   }

   public function update(Article $article, ArticleRequest $request)
   {

      $article->update($request->all());

      return redirect('articles');
   }

}
