<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtipo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao',45);
            $table->timestamps();
            $table->unsignedBigInteger('tipo_id');

            $table->foreign('tipo_id')->references('id')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subtipo');
    }
}
