<?php
namespace Database\Factories;

use App\Models\Book;
use App\Models\Kindle;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ReadingProgress;

class ReadingProgressFactory extends Factory
{
    protected $model = ReadingProgress::class;

    public function definition(): array
    {
        return [
            'last_read_page' => $this->faker->numberBetween(1, 1000),
            'book_percentage' => $this->faker->randomFloat(2, 0, 100),
            'start' => $this->faker->dateTime(),
            'is_finished' => $this->faker->boolean(),
            'book_id' => Book::inRandomOrder()->first()->ISBN,
            'kindle_id' => Kindle::inRandomOrder()->first()->id,
        ];
    }
}
