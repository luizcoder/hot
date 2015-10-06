<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('cpf')->unique();
            $table->string('telefone');
            $table->integer('hotsite_id')->unsigned();
            $table->foreign('hotsite_id')->references('id')->on('hotsites');
            
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('participantes_concursos', function($table){
            $table->integer('participante_id')->unsigned();
            $table->foreign('participante_id')->references('id')->on('participantes');
            $table->integer('concurso_id')->unsigned();
            $table->foreign('concurso_id')->references('id')->on('concursos');
            $table->text('resposta');
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
        Schema::dropIfExists('participantes');
        Schema::dropIfExists('participantes_concursos');
    }
}
