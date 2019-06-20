<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarathonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marathons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->timestamp('starts')->nullable()->comment('Início do período de inscrição');
            $table->timestamp('ends')->nullable()->comment('Fim do período de inscrição');
            $table->timestamp('date')->nullable()->comment('Data da maratona');
            $table->smallInteger('team_count')->default(0)->comment('Quantidade de times permitidos por maratona');
            $table->smallInteger('team_members_count')->default(0)->comment('Quantidade de membros permitidos por time');
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
        Schema::dropIfExists('marathons');
    }
}
