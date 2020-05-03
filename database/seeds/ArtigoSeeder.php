<?php

use Illuminate\Database\Seeder;

class ArtigoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cat = [ 
            'saude', 'beleza', 'transito','economia', 'educacao', 'politica', 'tecnologia'
        ];
    	for ($i = 0; $i < 15; $i++) {
    		
            DB::table('artigos')-> insert([
            	'id_usuario' => '1',
            	'img_art' => 'test.png',
            	'titulo' =>  Str::random(15),
            	'sub_titulo' =>  Str::random(255),
            	'categoria' =>  $cat[1],
            	'texto' => 'test1.txt',
                'views' => random_int(0, 7000),
            	'created_at' => '2020-04-26 '.date('G:i:s.u'),
            ]);
            shuffle($cat);
    	}
    	
    }
}

