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
            $table->text('description');
            $table->integer('frontuser_id')->reference('id')
                ->on('frontuser')
                ->onDelete('cascade');
            $table->string('image')->nullable();
            $table->integer('price');
            $table->string('discount', 5, 2)->nullable();
            $table->string('quantity')->nullable();
            $table->integer('stock_id')->references('id')
                ->on('stocks')
                ->onDelete('cascade');
            $table->foreignId('categorys_id')->references('id')
                ->on('categorys')
                ->onDelete('cascade');
            $table->date("break_product_at")->nullable();
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
