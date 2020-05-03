<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artigo;

class destaqueController extends Controller
{
    public function novidade()
    {
    	$news = 
    	artigo::orderBy('created_at', 'desc')
    	->orderBy('views','desc')
    	->limit(12)
    	->get();

    return view('destaque', compact('news'));
    	
    }
}
