<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('order_code', 30)->unique();
            $table->string('receiver_name', 100);
            $table->string('receiver_phone', 20);
            $table->string('receiver_email', 100)->nullable();
            $table->string('receiver_address');
            $table->text('note')->nullable();
            $table->tinyInteger('payment_method')->default(0);
            $table->tinyInteger('payment_status')->default(0);
            $table->decimal('shipping_fee', 15, 2)->default(0);
            $table->decimal('discount', 15, 2)->default(0);
            $table->decimal('total_price', 15, 2)->default(0);
            $table->tinyInteger('status')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};