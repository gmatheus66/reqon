<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequerimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('protocolo');
            $table->longText('descricao');

            $table->unsignedBigInteger('subtipo_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('req_pai_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('setor_id');

            $table->foreign('subtipo_id')->references('id')->on('subtipos');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('req_pai_id')->references('id')->on('requerimentos');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->foreign('setor_id')->references('id')->on('setors');
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
        Schema::dropIfExists('requerimentos');
    }
}
