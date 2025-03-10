<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kindle extends Model
{
  use HasFactory;
  
  protected $fillable = ['name', 'type', 'email'];

  public function books(): BelongsToMany
  {
    return $this->belongsToMany(Book::class);
  }

  public function bookmarks(): HasMany
  {
    return $this->hasMany(Bookmark::class);
  }

  public function highlightedQuotes(): HasMany
  {
    return $this->hasMany(HighlightedQuote::class);
  }

  public function downloads(): HasMany
  {
    return $this->hasMany(Download::class);
  }

  public function readingProgress(): HasMany
  {
    return $this->hasMany(ReadingProgress::class);
  }
}
