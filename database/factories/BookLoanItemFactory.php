<?php

namespace Database\Factories;

use App\Models\BookLoanItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookLoanItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookLoanItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_printout_id' => rand(1, 20), // watch for BookPrintoutSeeder
            'book_loan_id' => rand(1, 15), // watch for BookLoanSeeder
            'returned_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
