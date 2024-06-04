<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf', 11)->nullable();
            $table->string('telefone', 11)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('email')->nullable();
            $table->string('cep', 8)->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero', 5)->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf', 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        \Illuminate\Support\Facades\DB::table('clientes')->insert([
            'nome' => 'CONSUMIDOR',
            'cpf' => '00000000000',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
