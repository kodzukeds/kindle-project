<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kindle;

class KindleFactory extends Factory
{
    protected $model = Kindle::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
