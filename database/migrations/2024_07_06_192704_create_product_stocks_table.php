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
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();// Foreign key
            $table->unsignedBigInteger('sub_variant_id')->nullable(); // Foreign key
             
            $table->integer('stock');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            // Define the foreign key constraint
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('sub_variant_id')->references('id')->on('product_sub_variantions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stocks');
    }
};
