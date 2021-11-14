<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Books;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Books::where('id', '>', 0)->delete();
        Books::factory(20)->create();
    }
}
