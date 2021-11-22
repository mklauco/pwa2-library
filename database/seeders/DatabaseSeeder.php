<?php

namespace Database\Seeders;

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
        $this->call(UserAdminSeeder::class);
        // \App\Models\User::factory(10)->create();
        $this->call(AdminUserSeeder::class);
        $this->call(AuthorsSeeder::class);
        $this->call(BooksSeeder::class);
    }
}
