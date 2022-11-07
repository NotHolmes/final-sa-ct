<?php

namespace Database\Seeders;

use App\Models\Checklist;
use App\Models\Maintenance;
use App\Models\Part;
use App\Models\Resident;
use App\Models\User;
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
        $this->call(ResidentSeeder::class);

        foreach(Resident::all() as $resident) {
            $user = User::find($resident->user_id);
            $user->resident_id = $resident->id;
            $user->name = $resident->r_name;
            $user->save();
        }

        $this->call(StatusSeeder::class);
        $this->call(MaintenanceSeeder::class);
        $this->call(PartSeeder::class);


        // seed checklist
        $this->call(ChecklistSeeder::class);

        // update maintenance.checklist_id with checklist.maintenance_id
        foreach(Checklist::all() as $checklist) {
            $maintenance = Maintenance::find($checklist->maintenance_id);
            $maintenance->checklist_id = $checklist->id;
            $maintenance->save();
        }


        // add random parts to checklist
        foreach(Checklist::all() as $checklist) {
            $parts = Part::inRandomOrder()->limit(3)->get();
            $checklist->parts()->sync($parts);
        }

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
