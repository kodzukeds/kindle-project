<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Download;
use App\Models\Kindle;

class DownloadFactory extends Factory
{
  protected $model = Download::class;

  public function definition(): array
  {
    return [
      'download_date' => $this->faker->dateTime(),
      'download_size' => $this->faker->numberBetween(100, 10000),
      'book_id' => Book::inRandomOrder()->first()->ISBN,
      'kindle_id' => Kindle::inRandomOrder()->first()->id,
    ];
  }
}
