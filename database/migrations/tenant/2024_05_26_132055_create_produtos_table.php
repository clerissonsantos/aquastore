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
            $table->decimal('preco_compra')->default(0);
            $table->decimal('preco_venda')->default(0);
            $table->decimal('percentual_lucro')->default(0);
            $table->integer('estoque')->default(0);
            $table->integer('estoque_minimo')->default(0);
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
