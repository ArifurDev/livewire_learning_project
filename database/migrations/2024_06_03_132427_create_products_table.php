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
            $table->string('slug');
            $table->string('sku')->nullable();
            $table->string('code')->nullable();
            $table->longText('description');
            $table->json('images'); // JSON column for image paths

            $table->longText('warranty')->nullable();

            $table->string('price');
            $table->string('unit');
            $table->integer('discount')->nullable();
            $table->string('discountType')->nullable();
            $table->integer('stock');


            $table->unsignedBigInteger('catrgory_id');// Foreign key
            $table->string('status');
            $table->json('tags'); // JSON column for tags

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();



            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
