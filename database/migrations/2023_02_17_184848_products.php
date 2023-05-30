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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(1);
            $table->bigInteger('quantity');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            // $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('sub_category_id');

            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('sub_category_id')->references('id')->on('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
