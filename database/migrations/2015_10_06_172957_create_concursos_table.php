<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->text('pergunta');
            $table->text('termo_url');            
            $table->mediumText('descricao');            
            $table->integer('hotsite_id')->unsigned();
            $table->foreign('hotsite_id')->references('id')->on('hotsites');
            $table->softDeletes();
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
        Schema::dropIfExists('concursos');
    }
}
