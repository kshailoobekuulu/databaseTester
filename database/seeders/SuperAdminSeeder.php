<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeding first super admin user

        $super_admin = User::create([
            'name' => 'Super',
            'email' => config('app.superadmin_email'),
            'email_verified_at' => now(),
            'password' => bcrypt(config('app.superadmin_password')),
        ]);
        $super_admin->role()->associate(Role::where('type', Role::SUPER_ADMIN)->first());
        $super_admin->save();
    }
}
