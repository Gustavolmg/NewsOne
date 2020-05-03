<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artigo;

class searchController extends Controller
{	
    public function buscar (Request $pesquisa){

        $news = artigo::orderBy('created_at', 'desc')
        ->where('titulo', 'like' , "%".$pesquisa['search_nome']."%")
        ->limit(12)
        ->get();

    	return view('search', compact('news','pesquisa'));
    }
}
