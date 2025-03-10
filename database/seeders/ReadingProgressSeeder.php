<?php

namespace Database\Seeders;

use App\Models\ReadingProgress;
use Illuminate\Database\Seeder;

class ReadingProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      ReadingProgress::factory(10)->create();
    }
}
