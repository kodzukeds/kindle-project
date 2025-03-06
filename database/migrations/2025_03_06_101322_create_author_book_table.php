<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('author_book', function (Blueprint $table) {
            $table->foreignId('author_id')->constrained()->onDelete('cascade');
            $table->string('book_id');
            $table->foreign('book_id')->references('ISBN')->on('books')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('author_book');
    }
};
