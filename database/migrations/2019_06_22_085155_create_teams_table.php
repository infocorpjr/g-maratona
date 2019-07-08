<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')
                ->unsigned()
                ->nullable()
                ->comment("Chave estrangeira para usuário");
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->integer('marathon_id')
                ->unsigned()
                ->nullable()
                ->comment("Chave estrangeira para maratona");
            $table->foreign('marathon_id')
                ->references('id')
                ->on('marathons')
                ->onDelete('set null');

            $table->string('name');
            $table->text('description');
            $table->boolean('validated')->default(false);
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
        Schema::dropIfExists('teams');
    }
}
