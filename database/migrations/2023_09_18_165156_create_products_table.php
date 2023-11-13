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
            $table->integer('added_by');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('discount')->nullable();
            $table->integer('after_disscount');
            $table->string('sku');
            $table->string('slug');
            $table->integer('status')->nullable();
            $table->string('tags');
            $table->text('short_description')->nullable();
            $table->longText('long_description');
            $table->longText('additonal_description')->nullable();
            $table->string('preview_image');
            $table->integer ('banner')->nullable();
            $table->integer ('today_deal')->nullable();
            $table->integer ('trendy')->nullable();
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
