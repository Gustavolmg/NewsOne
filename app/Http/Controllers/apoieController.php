<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artigo;

class apoieController extends Controller
{
    public function header()
    {

        $corousel = 
        artigo::inRandomOrder()
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

    	return view('apoie', compact('corousel'));
    }
}
