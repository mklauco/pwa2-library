<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Authors;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Authors::where('id', '>', 0)->delete();
        Authors::factory(15)->create();
    }
}
