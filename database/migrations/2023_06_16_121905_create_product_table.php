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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->nullable();
            $table->float('price')->nullable()->unsigned();
            $table->float('discount_price')->nullable()->unsigned();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('image_url',255)->nullable();
            $table->string('shipping',255)->nullable();
            $table->float('weight')->nullable()->unsigned();
            $table->text('information')->nullable();
            $table->string('slug',255)->nullable();
            $table->integer('qty')->nullable();
            $table->unsignedBigInteger('product_category_id');
            $table->boolean('status')->default(1);
            
            $table->timestamps();

            $table->foreign('product_category_id')->references('id')->on('product_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
