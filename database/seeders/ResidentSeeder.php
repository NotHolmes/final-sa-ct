<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use App\Models\Resident;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->line("Generating 10 resident");
        Resident::factory(10)->create();
    }
}
