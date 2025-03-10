<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'birthday' => $this->faker->date(),
            'country' => $this->faker->country(),
            'contact' => $this->faker->phoneNumber(),
        ];
    }
}
