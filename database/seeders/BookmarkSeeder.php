<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bookmark;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      Bookmark::factory(10)->create();
    }
}
