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
            $table->string('barCode')->nullable();
            $table->text('description');
            $table->text('warranty')->nullable();

            $table->integer('price');
            $table->string('unit');
            $table->integer('discount')->nullable();
            $table->string('discountType')->nullable();
            $table->integer('stock');

            $table->string('image');

            $table->string('catrgoryId');
            $table->string('status');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
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
