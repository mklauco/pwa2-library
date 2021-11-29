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
        $returned_at = $this->faker->dateTimeThisMonth();
        return [
            'loan_id'       => rand(1, 15),
            'printout_id'   => rand(1, 200),
            'returned_at'   => $this->faker->randomElement([null, $returned_at])
        ];

    }
}
