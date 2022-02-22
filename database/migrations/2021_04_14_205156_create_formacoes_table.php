<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacoes', function (Blueprint $table) {
            $table->id();
            $table->string('graduacao');
            $table->string('instituicao');
            $table->string('pais');
            $table->string('cidade');
            $table->string('uf');
            $table->string('status')->nullable();

            $table->bigInteger('professor_id')->unsigned();
            $table->foreign('professor_id')->references('id')->on('professores')->onDelete('cascade');

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
        Schema::dropIfExists('formacoes');
    }
}
