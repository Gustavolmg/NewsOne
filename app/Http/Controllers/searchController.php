<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artigo;

class searchController extends Controller
{	
    public function buscar (Request $pesquisa){

        $news = artigo::join('users','artigos.id_usuario','=', 'users.id_usuario')
    	->select('users.name', 'artigos.*')
        ->orderBy('created_at', 'desc')
        ->where('titulo', 'like' , "%".$pesquisa['search_nome']."%")
        ->limit(12)
        ->get();


    	$corousel = 
    	artigo::inRandomOrder()
    	->limit(3)
    	->get();

    	return view('search', compact('news','pesquisa', 'corousel'));
    }
}
