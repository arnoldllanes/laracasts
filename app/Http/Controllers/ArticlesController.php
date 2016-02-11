<?php

namespace App\Http\Controllers;


use Request;

use App\Article;

use App\Http\Requests;

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

   public function store()
   {
   		
   		Article::create(Request::all());

   		return redirect('articles');
   }

}
