<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
      Schema::create('books', function (Blueprint $table) {
          $table->string('ISBN')->primary();
          $table->string('title');
          $table->string('genre')->nullable();
          $table->date('publication_date')->nullable();
          $table->foreignId('publisher_id')->constrained()->onDelete('cascade');
          $table->timestamps();
      });
  }
  
  public function down()
  {
      Schema::dropIfExists('books');
  }
};
