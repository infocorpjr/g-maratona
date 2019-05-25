<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->coment('Nome do Evento');
            $table->string('location');
            $table->date('date')->coment('formato com barras fixas dd/mm/aaaa');
            $table->string('time')->coment('formato 00:00 24horas');
            $table->longText('description')->nullable()->coment('Descrição');
            $table->string('path_capa')->default('')->comment('O Caminho do arquivo');
            $table->boolean('draft')->comment('Rascunho')->default(false);
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
