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
        Schema::create('tipo_cambios', function (Blueprint $table) {
            $table->id();
            $table->double('tipo_cambio')->default(0)->nullable();
            $table->unsignedBigInteger('user_creacion_id');
            $table->unsignedBigInteger('moneda_id');
            $table->foreign('user_creacion_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('no action')->onUpdate('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_cambios');
    }
};