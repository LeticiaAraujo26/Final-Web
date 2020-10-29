<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->string('forma_pagamento');
            $table->unsignedFloat('preco', 8, 2)->nullable();
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('funcionario_id')->nullable($value = true)->constrained();
            $table->foreignId('gerente_id')->nullable($value = true)->constrained();
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
        Schema::dropIfExists('vendas');
    }
}
