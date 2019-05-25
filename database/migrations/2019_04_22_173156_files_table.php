<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')
                ->nullable();

            $table->text('description')
                ->nullable();

            // Chave estrangeira.
            $table->morphs('fileable');

            // INFORMAÇÕES DO ARQUIVO NO DISCO.
            $table->string('file_path')
                ->comment('O nome do arquivo no disco');

            $table->string('extension')
                ->comment('A extensão do arquivo no disco');

            $table->string('file_size')
                ->comment('A tamanho do arquivo no disco');
            
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
