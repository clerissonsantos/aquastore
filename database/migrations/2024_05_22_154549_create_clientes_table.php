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
            $table->timestamps();
            $table->softDeletes();
        });

        \Illuminate\Support\Facades\DB::table('clientes')->insert([
            'nome' => 'Cliente Teste',
            'cpf' => '07563288457',
            'telefone' => '83999098936',
            'data_nascimento' => '1991-05-02',
            'email' => 'clerisson.web@gmail.com',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
