<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('bookmarks', function (Blueprint $table) {
      $table->id();
      $table->integer('page');
      $table->string('book_id');
      $table->foreign('book_id')->references('ISBN')->on('books')->onDelete('cascade');
      $table->foreignId('kindle_id')->constrained()->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('bookmarks');
  }
};
