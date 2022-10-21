<?php

namespace Database\Seeders;

use App\Models\Checklist;
use App\Models\Maintenance;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(ResidentSeeder::class);
        $this->call(MaintenanceSeeder::class);
//        $this->call(ChecklistSeeder::class);

//        foreach (Checklist::all() as $checklist){
//            $maintenance = Maintenance::inRandomOrder()->first()->unique();
//
//            $checklist->maintenance_id = $maintenance->id;
//            $maintenance->checklist_id = $checklist->id;
//
//            $maintenance->save();
//            $checklist->save();
//        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
