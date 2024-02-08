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
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('')->nullable();
            $table->string('email')->default('')->nullable();
            $table->string('direccion')->default('')->nullable();
            $table->string('celular')->default('')->nullable();
            $table->string('photoUrl')->default('')->nullable();
            $table->string('estado')->default('R')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfils');
    }
};