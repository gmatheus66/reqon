<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf',11);
            $table->string('nome',45);
            $table->string('rg_numero',8);
            $table->string('rg_estado',2);
            $table->string('rg_orgao_exp',10);
            $table->string('cargo',20);
            $table->string('email',50);
            $table->string('password');
            $table->string('telefone',9);
            $table->string('matricula',10);
            $table->char('glg_token',255)->nullable();
            $table->char('fcb_token',255)->nullable();
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
        Schema::dropIfExists('funcionarios');
    }
}
