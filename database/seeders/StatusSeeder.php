<?php

namespace Database\Seeders;

use App\Models\Complaint;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = Status::first();
        if (!$status) {
            $this->command->line("Generating Statuses");
            $statuses = ['รอรับเรื่อง', 'ดำเนินการ', 'เสร็จสิ้น', 'ส่งต่อ', 'ดำเนินการ(เก่า->ใหม่)'];

            collect($statuses)->each(function ($status_name, $key) {
                $status = new Status();
                $status->name = $status_name;
                $status->save();
            });
        }

        // $this->command->line("Generating statuses for all complaints");
        // $complaints = Complaint::get();
        // $complaints->each(function($complaint, $key) {
        //     $n = fake()->numberBetween(1, 5);
        //     //$n = 1;
        //     $status_ids = Status::inRandomOrder()->limit($n)->get()->pluck(['id'])->all();
        //     $complaint->tags()->sync($status_ids);
        // });
    }
}
