<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
    	$name = 'Arnold Llanes';

    	return view('pages.about')->with([
    		'first' => 'Arnold',
    		'last' => 'Llanes'
    		]);
    }

    public function contact()
    {
    	return view('pages.contact');
    }
}
