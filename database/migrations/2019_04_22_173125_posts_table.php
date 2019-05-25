<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('Título da notícia.');
            $table->string('subtitle')->comment('Subtítulo da notícia.')->nullable();
            $table->longText('body')->comment('Corpo da notícia.');
            $table->string('author')->comment('Autor da notícia.');
            $table->string('capa_path')->default('images/semCapa.png')->comment('Diretório da capa');
            $table->boolean('draft')->default(true)->comment('Campo para rascunho');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
