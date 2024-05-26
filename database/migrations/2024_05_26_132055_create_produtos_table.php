<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->decimal('preco_compra');
            $table->decimal('preco_venda');
            $table->decimal('percentual_lucro')->nullable();
            $table->integer('estoque')->default(0);
            $table->integer('estoque_minimo')->nullable();
            $table->date('validade')->nullable();
            $table->boolean('desativado')->default(false);
            $table->foreignId('desativado_user_id')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
