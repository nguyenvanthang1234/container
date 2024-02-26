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
        Schema::create('featured_images', function (Blueprint $table) {
            $table->id();
            // duong dan  do dai
            $table->string("file",200);
            // anh thuoc bai viet nao post_id la khoa ngoai
            $table->unsignedBigInteger("post_id");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_images');
    }
};
