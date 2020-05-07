<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artigo;

class destaqueController extends Controller
{
    public function novidade()
    {
    	$news = 
    	artigo::join('users','artigos.id_usuario','=', 'users.id_usuario')
        ->select('users.name', 'artigos.*')
        ->orderBy('created_at', 'desc')
    	->orderBy('views','desc')
    	->limit(12)
    	->get();


        $corousel = 
        artigo::inRandomOrder()
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();


    return view('destaque', compact('news', 'corousel'));
    	
    }
}
