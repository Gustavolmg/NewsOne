<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artigo;

class Sobre_nosController extends Controller
{
    public function header()
    {
    	
        $corousel = 
        artigo::inRandomOrder()
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        return view('sobre_nos', compact('corousel'));
    }
}
