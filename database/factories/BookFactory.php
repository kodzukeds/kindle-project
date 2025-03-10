<?php
namespace Database\Factories;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'ISBN' => $this->faker->isbn13(),
            'title' => $this->faker->sentence(),
            'genre' => $this->faker->word(),
            'publication_date' => $this->faker->date(),
            'publisher_id' => Publisher::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

