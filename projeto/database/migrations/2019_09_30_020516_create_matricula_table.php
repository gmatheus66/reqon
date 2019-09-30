<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricula',9);
            $table->integer('ano');
            $table->string('semestre',10);
            // $table->unsignedBigInteger('curso_id');
            // $table->unsignedBigInteger('aluno_id');

            // $table->foreign('curso_id')->references('id')->on('curso');
            // $table->foreign('aluno_id')->references('id')->on('aluno');
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
        Schema::dropIfExists('matricula');
    }
}
