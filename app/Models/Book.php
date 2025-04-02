<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
  use HasFactory;

  protected $primaryKey = 'ISBN';
  public $incrementing = false;
  protected $keyType = 'string';
  protected $fillable = ['ISBN', 'title', 'genre', 'publication_date', 'publisher_id'];

  public function book(): HasOne
  {
    return $this->hasOne(ReadingProgress::class);
  }

  public function downloads(): HasMany
  {
    return $this->hasMany(Download::class);
  }

  public function bookmarks(): HasMany
  {
    return $this->hasMany(Bookmark::class);
  }

  public function highlightedQuotes(): HasMany
  {
    return $this->hasMany(HighlightedQuote::class);
  }

  public function authors(): BelongsToMany
  {
    return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
  }

  public function publisher(): BelongsTo
  {
    return $this->belongsTo(Publisher::class);
  }

  public function kindles(): BelongsToMany
  {
    return $this->belongsToMany(Kindle::class, 'book_kindle', 'book_id', 'kindle_id');
  }
}
