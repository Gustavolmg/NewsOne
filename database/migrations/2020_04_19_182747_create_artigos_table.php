<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->increments('id_art');

            $table->unsignedBigInteger('id_usuario')->index();
            $table->foreign('id_usuario')
                    ->references('id_usuario')
                    ->on('users')
                    ->onDelete('cascade');

            $table->string('img_art');
            $table->string('titulo');
            $table->string('sub_titulo');
            $table->string('categoria');
            $table->string('texto');
            $table->integer('views');
            $table->timestamps();
            

            // cria relação entre as tabelas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
