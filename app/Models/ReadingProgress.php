<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReadingProgress extends Model
{
  protected $fillable = ['last_read_page', 'book_percentage', 'start', 'is_finished'];

  public function book(): BelongsTo
  {
    return $this->belongsTo(Book::class);
  }

  public function kindle(): BelongsTo
  {
    return $this->belongsTo(Kindle::class);
  }
}
