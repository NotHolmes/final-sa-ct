<?php

namespace Database\Seeders;

use App\Models\Checklist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->line("Generating 50 checklists");
        Checklist::factory(50)->create();
    }
}
