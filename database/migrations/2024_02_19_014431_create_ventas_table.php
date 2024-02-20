<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_creacion_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('forma_pago_id');
            $table->unsignedBigInteger('moneda_id');
            $table->string('detalle')->default('')->nullable();
            $table->double('monto_total')->default(0)->nullable();
            $table->double('monto_descuento')->default(0)->nullable();
            $table->string('estado')->default('registrado')->nullable();
            $table->timestamps();
            $table->foreign('user_creacion_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('no action')->onUpdate('no action');
            $table->foreign('forma_pago_id')->references('id')->on('forma_pagos')->onDelete('no action')->onUpdate('no action');
            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};