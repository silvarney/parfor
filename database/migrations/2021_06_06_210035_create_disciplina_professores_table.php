<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinaProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplina_professores', function (Blueprint $table) {
            $table->id();
            $table->integer('posicao');
            $table->integer('pontos');
            $table->string('status')->nullable();

            $table->bigInteger('edital_id')->unsigned();
            $table->foreign('edital_id')->references('id')->on('editais')->onDelete('cascade');

            $table->bigInteger('professor_id')->unsigned();
            $table->foreign('professor_id')->references('id')->on('professores')->onDelete('cascade');

            $table->bigInteger('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');

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
        Schema::dropIfExists('disciplina_professores');
    }
}
