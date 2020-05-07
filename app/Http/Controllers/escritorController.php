<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use App\user;
use App\artigo;

class escritorController extends Controller
{
    public function home(Request $user)
    {
        $usuario = session('usuario') ?? null;
        $artigos = session('ar');

        $corousel = 
        artigo::inRandomOrder()
        ->limit(3)
        ->get();

    	return view('Escritor', compact('user', 'usuario', 'artigos', 'corousel'));
    }

    public function login(Request $user)
    {
        // Cria as variaveis que serão mais usadas no codigo
        $login = user::where('name', $user->usuario)->first();
        $resultado = "";
        $artigoss = array();

        // Limpa se existir algum outro usuario no sistema, para que não acha mais de um usuario por session
        $user->session()->flush();

        //Verifica se o usuario existe ou não, e retorna correspondentemente com um aviso ou entra direto
        if ($login == NULL) {
            $resultado = "Usuário não encontrado";
        } else {
            
                if (Hash::check($user->senha, $login->password)) {

                        // Adiciona na sessão todos os artigos relacionados ao usuario
                        $arts = artigo::select('id_art', 'titulo', 'views')->where('id_usuario', $login->id_usuario)->get();

                            foreach ($arts as $value) {

                                $artigoss[] = [
                                    'id_art' => $value->id_art,
                                    'titulo' => $value->titulo,
                                    'views' => $value->views
                                               ];

                            }

                            session(['ar' => $artigoss]);

                        // Adiciona na sessão as informações do usuario
                        session([
                            'usuario' =>[
                                     'id_usuario' => $login->id_usuario,
                                     'name' => $login->name,
                                     'area' => $login->area,
                                     'email' => $login->email,
                                     'art_feitos' => count($arts),
                                     'entrou' => $login->created_at,
                                     'img' => asset('img/'.$login->img_p)
                                 ]
                        ]);

                } else {
                    $resultado = "Sua senha esta invalida";
                }

             }

        return redirect()->route('escritor');
    }

    public function edt_perfil()
    {

        $usuario = session('usuario');
        $area = (isset(request()->cetegorias)) ? implode(", " ,request()->cetegorias) : session('usuario')['area'];
        $oldimg = user::select('img_p')->where('id_usuario', $usuario['id_usuario'])->get()->first();
        $newlogin = user::where('id_usuario', $usuario['id_usuario'])->get()->first();

        // Veridica se a imagem existe e assim guarda ela
         if (request()->image <> null) {

        // Quarda a imagem na pasta public com um nome unico de tempo
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
 
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

            if (!file_exists($imageName)) {

                // try{
                        
                    // Deleta a antiga foto de perfil para não acumular no servidor
                    File::delete('img/'.$oldimg['img_p']);

                    // Transfere a imagem para o public do servidor
                    request()->image->move(public_path('img'), $imageName);

                    } else {
                        $imageName = $oldimg['img_p'];
                    }

         } else {
            $imageName = $oldimg['img'];
         }

                // Atualiza tudo do usuario no banco de dados
                $edt = user::where('id_usuario', $usuario['id_usuario'])->update([
                    'name' => request()->name,
                    'area' => $area,
                    'img_p' => $imageName,
                ]);

                            session([
                                'usuario' =>[
                                         'id_usuario' => $newlogin->id_usuario,
                                         'name' => $newlogin->name,
                                         'area' => $newlogin->area,
                                         'email' => $newlogin->email,
                                         'art_feitos' => '13',
                                         'entrou' => $newlogin->created_at,
                                         'img' => asset('img/'.$imageName)
                                     ]
                            ]);

                            $resultado = 'Seu usuario foi atualizado com sucesso';

            return redirect()->route('escritor', compact($resultado));


        // FIm da função edt_perfil
    }

    public function logout(Request $user)
    {
        $user->session()->flush();
        

        return redirect()->route('escritor');
        // Fim da função logout
    }

    public function ver_make(Request $artigo)
    {   

        $artigo = [
            'titulo' => $artigo['art_nome'],
            'sub_titulo' => $artigo['art_descricao']
        ];

        return view('make_art', compact('artigo'));
        // Fim do controller ver_make
    }

    public function make(Request $artigo_c)
    {
        $user_id = session('usuario')['id_usuario'];
        $artigo = $artigo_c;

        // Validação do conteudo de texto
            $testxName = time().'.txt';
        
        if (!file_exists('artigos/'.$testxName)) {

                    // Transfere o texto para o public do servidor
                    Storage::disk('publico')->put('artigos/'.$testxName, $artigo['artigo_text']);
                    $textName = $testxName;
                    } else {
                        $textName = 'test1.txt';
                    }

        // Validação da imagem
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
 
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

            if (!file_exists($imageName)) {


                    // Transfere a imagem para o public do servidor
                    request()->image->move(public_path('img'), $imageName);

                    } else {
                        $imageName = 'img/test.png';
                    }

            artigo::insert([
                    'id_usuario' => $user_id,
                    'img_art' => $imageName,
                    'titulo' =>  $artigo['artigo_titulo'],
                    'sub_titulo' =>  $artigo['artigo_subtitulo'],
                    'categoria' =>  $artigo['cat'],
                    'texto' => $textName,
                    'views' => random_int(0, 7000),
                    'created_at' => date('Y-m-d G:i:s.u'),
                ]); 

            return redirect()->route('escritor');

    }
    // Fim da classe make()


    // Fim do controller
}
