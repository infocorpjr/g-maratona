<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitationTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitation_team', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('participants_id')
                ->unsigned()
                ->comment("Chave estrangeira para usuário");
            $table->foreign('participants_id')
                ->references('id')
                ->on('participants')
                ->onDelete('cascade');

            $table->integer('team_id')->unsigned()->comment("Chave estrangeira para time");
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

            $table->boolean("participants_validador")
                ->default(false)
                ->comment("Participante aprovou o convite");

            $table->boolean("team_validador")
                ->default(false)
                ->comment("Time aprovou o convite");

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
        Schema::dropIfExists('solicitation_team');
    }
}
