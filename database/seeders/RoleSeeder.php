<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        //Seeding super admin role
        $super_admin = Role::create([
            'type' => Role::SUPER_ADMIN,
            'slug' => 'super-admin',
        ]);

        //Seeding admin role
        $admin = Role::create([
            'type' => Role::ADMIN,
            'slug' => 'admin',
        ]);
    }
}
