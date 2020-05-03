<?php

use Illuminate\Database\Seeder;

class userstableseeder extends Seeder
{

    public function run()
    {

        $nomes = [
            'Antonio', 'Antony', 'Alan', 'Amanda', 'Asmodeus', 'Breno', 'Bartolomeu', 'bieber', 'Barney', 'Bela', 'Bruna', 'Belinha', 'Carlos', 'Carla', 'Cezar', 'Cindamundes', 'Demitrio', 'Damião', 'Darkus', 'Dalila', 'Deniese','Delaila', 'Durara', 'Elias', 'Elise', 'Ermanoteu', 'Elen', 'Elivan', 'Fagner', 'Fernadno', 'Fabiana', 'Gustavo', 'Galandriel', ' Gullag', 'Helder', 'Ian','Igor', 'Ivanice', 'Induar', 'Jota', 'João', 'José', ' Joaquim', 'Joana', 'Josoares', 'Jacinto Pinto Aquino Rego' ,  'Kebler', 'Lima', 'Leopoldo', 'Leomar', 'Leonardo', 'Leandra', 'Luzia', 'Maria', 'Marcia', 'Madalena', 'Miguel', 'Natalia', 'Nataly', 'Naide', 'Orto', 'Olga', 'Olivia', 'Queila', 'Queiroz', 'Paulo', 'Paulina', 'Raissa'
        ];
        $cat = [
            'saude', 'beleza', 'transito','economia', 'educacao', 'politica', 'tecnologia'
        ];

        shuffle($nomes);

        for ($i = 0; $i < 20 ; $i++) {

            DB::table('users')-> insert([
            	'name' => $nomes[$i],
                'area' => $cat[1],
            	'img_p' => 'test.png',
            	'email' => $nomes[$i].Str::random(4).'@gmail.com',
            	'password' => Hash::make('123'),
            	'created_at' => date('Y-m-d G:i:s.u'),
            ]);

            shuffle($cat);


        }

    }
}
