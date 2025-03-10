<?php

namespace Database\Seeders;

use App\Models\HighlightedQuote;
use Illuminate\Database\Seeder;

class HighlightedQuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      HighlightedQuote::factory(10)->create();
    }
}
