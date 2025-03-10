<?php

namespace Database\Factories;

use App\Models\Bookmark;
use App\Models\Book;
use App\Models\Kindle;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkFactory extends Factory
{
    protected $model = Bookmark::class;

    public function definition()
    {
        return [
            'page' => $this->faker->numberBetween(1, 500),
            'book_id' => Book::inRandomOrder()->first()->ISBN,
            'kindle_id' => Kindle::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
