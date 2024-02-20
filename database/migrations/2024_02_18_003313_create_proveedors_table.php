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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perfil_id');
            $table->string('propietario')->default('')->nullable();
            $table->string('nit')->default('')->nullable();
            $table->string('razonSocial')->default('')->nullable();
            $table->foreign('perfil_id')->references('id')->on('perfils')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};