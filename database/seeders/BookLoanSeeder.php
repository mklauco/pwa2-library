<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\BookLoan;

class BookLoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BookLoan::factory(15)->create();
    }
}
