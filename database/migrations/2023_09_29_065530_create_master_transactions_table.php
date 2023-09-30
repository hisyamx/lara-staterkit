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
        Schema::create('master_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('order_date')->nullable();
            $table->char('order_number')->length(20)->nullable();
            $table->string('transaction_name')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('master_products');
            $table->integer('amount')->length(20)->nullable();
            $table->float('total_price')->length(50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_transactions');
    }
};
