<?php

namespace Database\Seeders;

use App\Models\Download;
use Illuminate\Database\Seeder;

class DownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      Download::factory(10)->create();
    }
}
