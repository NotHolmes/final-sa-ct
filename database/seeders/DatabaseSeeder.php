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
            $user->r_id = $resident->id;
            $user->name = $resident->r_name;
            $user->save();
        }

        $this->call(StatusSeeder::class);
        $this->call(MaintenanceSeeder::class);

        // set m_id in maintenance = own id
        foreach(Maintenance::all() as $maintenance) {
            $maintenance->m_id = $maintenance->id;
            $maintenance->save();
        }

        // set c_id in checklist = own id
        foreach(Checklist::all() as $checklist) {
            $checklist->c_id = $checklist->id;
            $checklist->save();
        }

        $this->call(PartSeeder::class);
        // seed checklist
        $this->call(ChecklistSeeder::class);

        // update maintenance.c_id with checklist.m_id
        foreach(Checklist::all() as $checklist) {
            $maintenance = Maintenance::find($checklist->m_id);
            $maintenance->c_id = $checklist->id;
            $maintenance->save();
        }


        // set cp_id in checklist_part = own id
        foreach(Checklist::all() as $checklist) {
            foreach($checklist->parts as $part) {
                $part->pivot->cp_id = $part->pivot->id;
                $part->pivot->save();
            }
        }

        // add random parts to checklist
        foreach(Checklist::all() as $checklist) {
            $parts = Part::inRandomOrder()->limit(rand(1, 5))->get();
            foreach($parts as $part) {
                $checklist->parts()->attach($part->id);
            }
        }

//        $this->call(ChecklistSeeder::class);
//        foreach (Checklist::all() as $checklist){
//            $maintenance = Maintenance::inRandomOrder()->first()->unique();
//
//            $checklist->m_id = $maintenance->id;
//            $maintenance->c_id = $checklist->id;
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
