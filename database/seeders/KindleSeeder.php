<?php

namespace Database\Seeders;

use App\Models\Kindle;
use Illuminate\Database\Seeder;

class KindleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      Kindle::factory(10)->create();
    }
}
