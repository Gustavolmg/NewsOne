<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\artigo;

class artigocontroller extends Controller
{
    //
    public function art($num = 1){

    	$artigo =  artigo::where('id_art', $num)
    	->get()->first();

        $usuario = user::select('name')->where('id_usuario', $artigo['id_usuario'])->get()->first();


    	return view('artnews', compact('artigo','usuario'));

    }
}
