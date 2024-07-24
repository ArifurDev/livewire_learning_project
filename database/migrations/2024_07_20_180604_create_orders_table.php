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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->integer('total_products')->nullable();
            $table->decimal('sub_total', 8, 2)->nullable();
            $table->string('vat')->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->decimal('pay', 8, 2)->nullable();
            $table->decimal('due', 8, 2)->nullable();
            $table->string('payment_status')->nullable();
            $table->decimal('shiping_charge', 8, 2)->nullable();
            $table->string('order_status')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
