<?php

namespace Database\Factories;

use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

class BooksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Books::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => implode($this->faker->words(3), ' '),
            'description'   => implode($this->faker->words(10), ' '),
            'genre'         => $this->faker->randomElement(['novel', 'drama', 'documentary']),
            'author'        => rand(1, 15), // must coincide with number of authors
        ];
    }
}
