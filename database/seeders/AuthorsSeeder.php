<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Authors;
use Illuminate\Support\Facades\DB;

class AuthorsSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {   
        Authors::factory(10)->create();
    }
}
