<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professores', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('sexo')->nullable();
            $table->string('cpf')->unique();
            $table->string('rg')->nullable();
            $table->string('emissao')->nullable();
            $table->string('nascimento')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('endereco', 300)->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('cep')->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('pais')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('portador_necessidade')->nullable();
            $table->string('status')->nullable();

            $table->bigInteger('campus_id')->unsigned();
            $table->foreign('campus_id')->references('id')->on('campus')->onDelete('cascade');

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
        Schema::dropIfExists('professores');
    }
}
