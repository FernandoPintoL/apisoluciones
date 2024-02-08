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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('')->nullable();
            $table->string('descripcion')->default('')->nullable();
            $table->string('photo_path')->default('')->nullable();
            $table->double('precio_costo')->unsigned()->default(0)->nullable();
            $table->double('precio_venta')->unsigned()->default(0)->nullable();
            $table->boolean('isHabilitado')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};