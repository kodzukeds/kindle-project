<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HighlightedQuote extends Model
{
  use HasFactory;
  
  protected $fillable = ['quote_text', 'page'];

  public function book(): BelongsTo
  {
    return $this->belongsTo(Book::class);
  }

  public function kindle(): BelongsTo
  {
    return $this->belongsTo(Kindle::class);
  }
}
