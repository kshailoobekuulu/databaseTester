<?php


namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run() {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'role' => 'admin',
            'password' => bcrypt(config('app.superadmin_password')),
        ]);
    }
}
