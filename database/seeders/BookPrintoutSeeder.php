<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\BookPrintout;

class BookPrintoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BookPrintout::factory(200)->create();
    }
}
