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
            $table->string('voucherNo');
            $table->string('qty');
            $table->string('total');
            $table->string('paymentSlip');
            $table->unsignedBigInteger('paymentId');
            $table->foreign('paymentId')
                  ->references('id')
                  ->on('payments')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('itemId');
            $table->foreign('itemId')
                  ->references('id')
                  ->on('items')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
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
