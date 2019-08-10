<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment("Chave primária para atores");
            $table->integer('user_id')->unique()->unsigned()->comment("Chave estrangeira para usuário");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Atenção! O padrão é ser participante ...
            $table->boolean('is_administrator')->default(false)->comment("Determina se o ator é administrador");
            $table->boolean('is_technician')->default(false)->comment('Determina se o ator é técnico');
            $table->boolean('is_voluntary')->default(false)->comment('Determina se o ator é voluntário');
            $table->boolean('is_participant')->default(true)->comment('Determina se o ator é participante');

            $table->boolean('status')->default(false)->comment("Status se já foi aprovado na role");

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
        Schema::dropIfExists('actors');
    }
}
