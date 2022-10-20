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
        $admin = User::where('email', 'admin@example.com')->first();
        if (!$admin) {
            $admin = new User();
            $admin->name = "Administrator S.";
            $admin->role = 'ADMIN';
            $admin->password = Hash::make('adminpass');
            $admin->room_number = '000';
            $admin->save();
        }

        $user = User::where('email', 'user01@example.com')->first();
        if (!$user) {
            $user = new User();
            $user->name = "ยูสเซอร์ 01";
            $user->role = 'USER';
            $user->password = Hash::make('userpass');
            $user->room_number = '999';
            $user->save();
        }

        $editor = User::where('email', 'organization01@example.com')->first();
        if (!$editor) {
            $user = new User();
            $user->name = "Organization01";
            $user->role = 'EDITOR';
            $user->password = Hash::make('organizationpass');
            $user->room_number = '999';
            $user->save();
        }

        User::factory(10)->create();
    }
}
