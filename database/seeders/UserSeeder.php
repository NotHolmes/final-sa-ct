<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $admin = new User();
            $admin->name = "Administrator S.";
            $admin->role = 'ADMIN';
            $admin->username = 'admin';
            $admin->password = Hash::make('password');
            $admin->save();

            $user = new User();
            $user->name = "ยูสเซอร์ 01";
            $user->role = 'USER';
            $user->username = 'user';
            $user->password = Hash::make('password');
            $user->save();

        $user = new User();
        $user->name = "Resident 01";
        $user->role = 'RESIDENT';
        $user->username = 'resident';
        $user->password = Hash::make('password');
        $user->save();

            $user = new User();
            $user->name = "Organization01";
            $user->role = 'EDITOR';
            $user->username = 'org01';
            $user->password = Hash::make('password');
            $user->save();

        User::factory(10)->create();
    }
}
