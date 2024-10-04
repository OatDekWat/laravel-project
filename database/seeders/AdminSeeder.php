<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin Name';  // ชื่อ Admin
        $user->email = 'admin@example.com';  // อีเมล Admin
        $user->password = Hash::make('password');  // รหัสผ่าน
        $user->role = 'admin';  // กำหนด role เป็น admin
        $user->save();
    }
}