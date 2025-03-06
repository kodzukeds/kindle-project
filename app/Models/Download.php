<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Download extends Model
{
  protected $fillable = ['download_date', 'download_size'];

  public function book(): BelongsTo
  {
    return $this->belongsTo(Book::class);
  }

  public function kindle(): BelongsTo
  {
    return $this->belongsTo(Kindle::class);
  }
}
