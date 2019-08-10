<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->comment("Chave estrangeira para usuário");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('team_id')->nullable()->unsigned()->comment("Chave estrangeira para time");
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

            $table->string('name')->comment('Nome do usuario');
            $table->string('course')->comment('Curso');
            $table->string('shirt_size')->comment('Tamanho da camisa');
            $table->string('rga');
            $table->date('birthday');

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
        Schema::dropIfExists('participants');
    }
}
