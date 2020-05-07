<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\artigo;

class homeController extends Controller
{
    public function entrada(){
    	$news = 
    	artigo::join('users','artigos.id_usuario','=', 'users.id_usuario')
    	->select('users.name', 'artigos.*')
    	->orderBy('artigos.created_at', 'desc')
    	->limit(12)
    	->get();

    	$corousel = 
    	artigo::inRandomOrder()
        ->orderBy('created_at', 'desc')
    	->limit(3)
    	->get();

    	return view('home', compact('news', 'corousel'));
    }
}
