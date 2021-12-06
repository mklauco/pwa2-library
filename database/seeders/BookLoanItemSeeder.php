<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\BookLoanItem;

class BookLoanItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BookLoanItem::factory(20)->create();
    }
}
