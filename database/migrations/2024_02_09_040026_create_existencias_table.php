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
        Schema::create('existencias', function (Blueprint $table) {
            $table->id();
            $table->double('existencia')->unsigned()->default(0)->nullable();
            $table->double('existencia_minima')->unsigned()->default(0)->nullable();
            $table->double('existencia_maxima')->unsigned()->default(0)->nullable();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('almacen_id');
            $table->timestamps();
            $table->foreign( 'item_id' )->references( 'id' )->on( 'items' )->onDelete( 'cascade' )->onUpdate('cascade');
            $table->foreign('almacen_id')->references('id')->on('almacens')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('existencias');
    }
};