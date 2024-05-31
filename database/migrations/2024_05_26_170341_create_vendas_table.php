<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_hora');
            $table->foreignId('cliente_id');
            $table->decimal('valor_total')->default(0);
            $table->bigInteger('forma_pagamento_id')->nullable();
            $table->dateTime('data_pagamento')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->decimal('desconto_valor')->default(0);
            $table->integer('desconto_percentual')->default(0);
            $table->boolean('finalizada')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
