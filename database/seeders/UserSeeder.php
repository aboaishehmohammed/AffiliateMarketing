<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ingot',
            'email' => 'admin@admin.com',
            'phone' => '0798668325',
            'birthdate' => now(),
            'role' => 1,
            'password' => bcrypt('admin1998'),
            'referral_link' =>User::randomLink(30),
            'created_at'=>now()
        ]);
    }
}
