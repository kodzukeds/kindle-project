<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('reading_progresses', function (Blueprint $table) {
      $table->id();
      $table->integer('last_read_page')->nullable();
      $table->float('book_percentage')->nullable();
      $table->date('start')->nullable();
      $table->boolean('is_finished')->default(false);
      $table->string('book_id');
      $table->foreign('book_id')->references('ISBN')->on('books')->onDelete('cascade');
      $table->foreignId('kindle_id')->constrained()->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('reading_progresses');
  }
};
