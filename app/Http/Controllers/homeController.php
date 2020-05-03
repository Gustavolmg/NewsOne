<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artigo;

class homeController extends Controller
{
    public function entrada(){
    	$news = 
    	artigo::orderBy('created_at', 'desc')
    	->limit(12)
    	->get();
    	return view('home', compact('news'));
    }
}
