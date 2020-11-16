<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = new \App\Models\Roles();
        $admin = new \App\Models\Roles();
        $super_admin->role_name = 'super_admin';
        $super_admin->slug = 'super-admin';
        $admin->role_name = 'admin';
        $admin->slug = 'admin';
        $super_admin->save();
        $admin->save();
    }
}
