<?php

namespace Database\Seeders;

use App\Http\Middleware\SuperAdmin;
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
        $this->call([
            RoleSeeder::class,
            SuperAdminSeeder::class
        ]);
    }
}
