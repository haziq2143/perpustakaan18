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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('description_id');
            $table->string('title');
            $table->string('author');
            $table->string('pages');
            $table->integer('stock');
            $table->string('shelf_number');
            $table->string('code_book');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('description_id')->references('id')->on('descriptions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
