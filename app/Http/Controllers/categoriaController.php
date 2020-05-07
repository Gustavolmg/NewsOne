<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artigo;

class categoriaController extends Controller
{

    public function result($cat,  request $busca){

		$news = artigo::join('users','artigos.id_usuario','=', 'users.id_usuario')
    	->select('users.name', 'artigos.*')
		->where('categoria', $cat);

		if (!empty($busca['ordem_cat'])) {
			$news->orderBy('created_at', $busca['ordem_cat']);
		}
		else {
			$news->orderBy('created_at', 'desc');
		}

		if (!empty($busca['tex_cat'])) {
			$news->where('titulo', 'like', '%'.$busca['tex_cat'].'%');
		}

		if (!empty($busca['date_cat']) AND (!empty($busca['date_v']) AND $busca['date_v'] == 'sim') ) {
			$news->where('created_at', 'like', $busca['date_cat'].'%');
		}

		$news = $news->limit(12)->get();


    	$corousel = 
    	artigo::inRandomOrder()
    	->limit(3)
    	->get();




    	return view("categoria", compact('news','cat','busca', 'corousel'));

    }
}
