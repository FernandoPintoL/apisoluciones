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
        Schema::create('almacens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_creacion_id');
            $table->unsignedBigInteger('user_responsable_id');
            $table->string('name')->default('')->nullable();
            $table->double('capacidad_maxima')->unsigned()->default(0)->nullable();
            $table->double('capacidad_minima')->unsigned()->default(0)->nullable();
            $table->string('estado')->default("")->nullable();
            $table->timestamps();
            $table->foreign('user_creacion_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_responsable_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacens');
    }
};