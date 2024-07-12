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

            $table->longText('warranty')->nullable();

            $table->decimal('price', 8, 2)->nullable();
            $table->string('unit');
            $table->integer('discount')->nullable();
            $table->string('discountType')->nullable();

            $table->string('status');
            $table->json('tags'); // JSON column for tags

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
