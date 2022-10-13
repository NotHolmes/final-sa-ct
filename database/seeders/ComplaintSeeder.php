<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Complaint;
use App\Models\Organization;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->command->line("Generating 500 complaints");
//        Complaint::factory(500)->create();

        $this->command->line("Generating 50 complaints");
        Complaint::factory(50)->create();
    }
}
