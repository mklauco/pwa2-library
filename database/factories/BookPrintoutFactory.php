<?php

namespace Database\Factories;

use App\Models\BookPrintout;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookPrintoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookPrintout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id'       => rand(1, 40), // 40 must coincide what is in "BooksSeeder"
            'obtained_at'   => $this->faker->dateTimeThisYear()
        ];
    }
}
