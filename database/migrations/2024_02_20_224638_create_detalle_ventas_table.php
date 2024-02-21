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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('item_id');
            $table->double('cantidad')->default(0)->nullable();
            $table->double('sub_total')->default(0)->nullable();
            $table->timestamps();
            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('no action')->onUpdate('no action');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};