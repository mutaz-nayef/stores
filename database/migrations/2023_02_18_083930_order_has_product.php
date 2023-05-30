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
        Schema::create('order_has_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_full_product');
            $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('sub_product_id')->nullable()->constrained()->cascadeOnDelete('sub_product_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
