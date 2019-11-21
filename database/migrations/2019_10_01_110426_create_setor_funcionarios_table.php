<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetorFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setor_funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('setor_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->timestamps();

            $table->foreign('setor_id')->references('id')->on('setors');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setor_funcionarios');
    }
}
