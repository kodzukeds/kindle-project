<?php

namespace Database\Factories;

use App\Models\HighlightedQuote;
use App\Models\Book; // Import the Book model
use App\Models\Kindle;
use Illuminate\Database\Eloquent\Factories\Factory;

class HighlightedQuoteFactory extends Factory
{
    protected $model = HighlightedQuote::class;

    public function definition()
    {
        return [
            'quote_text' => $this->faker->sentence(),
            'page' => $this->faker->numberBetween(1, 500),
            'book_id' => Book::inRandomOrder()->first()->ISBN,
            'kindle_id' => Kindle::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
