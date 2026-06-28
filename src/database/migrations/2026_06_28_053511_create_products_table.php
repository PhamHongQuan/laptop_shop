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
            $table->unsignedBigInteger('category_id')->index();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->string('thumbnail', 255)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 15, 2);
            $table->integer('stock')->default(0);
            $table->string('cpu', 100)->nullable();
            $table->string('gpu', 100)->nullable();
            $table->string('ram', 50)->nullable();
            $table->string('storage', 50)->nullable();
            $table->string('screen', 100)->nullable();
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
