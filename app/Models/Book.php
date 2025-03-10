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
  protected $fillable = ['title', 'genre', 'publication_date'];

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
    return $this->belongsToMany(Author::class);
  }

  public function publisher(): BelongsTo
  {
    return $this->belongsTo(Publisher::class);
  }

  public function kindles(): BelongsToMany
  {
    return $this->belongsToMany(Kindle::class);
  }
}
