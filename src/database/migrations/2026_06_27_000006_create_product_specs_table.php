<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_specs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->unique();
            $table->string('cpu')->nullable();
            $table->string('gpu')->nullable();
            $table->string('ram', 100)->nullable();
            $table->string('ram_type', 100)->nullable();
            $table->string('storage', 100)->nullable();
            $table->string('storage_type', 100)->nullable();
            $table->string('screen_size', 50)->nullable();
            $table->string('resolution', 100)->nullable();
            $table->string('panel', 100)->nullable();
            $table->string('refresh_rate', 50)->nullable();
            $table->string('brightness', 50)->nullable();
            $table->string('color_gamut', 100)->nullable();
            $table->string('camera', 100)->nullable();
            $table->string('battery', 100)->nullable();
            $table->string('adapter', 100)->nullable();
            $table->decimal('weight', 4, 2)->nullable();
            $table->string('os', 100)->nullable();
            $table->string('wifi', 100)->nullable();
            $table->string('bluetooth', 100)->nullable();
            $table->string('keyboard')->nullable();
            $table->string('audio')->nullable();
            $table->string('material', 100)->nullable();
            $table->text('ports')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_specs');
    }
};