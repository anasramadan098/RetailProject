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
            $table->decimal('price', 8, 2);
            $table->decimal('final_price', 8, 2);
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->integer('stock');   
            $table->string('sku')->nullable();
            $table->string('main_image')->default('defualt.png');
            $table->json('another_images')->default('[]');
            $table->json('feedbacks')->default('[]');
            $table->integer('rate')->default('0');
            $table->integer('discount')->default(null)->nullable();
            $table->string('ribbon')->default(null)->nullable();
            $table->json('options')->default(null)->nullable();

            $table->timestamps();
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
