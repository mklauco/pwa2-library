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
            'name'          => $this->faker->catchPhrase(),
            'description'   => $this->faker->paragraph(),
            'genre'         => $this->faker->randomElement(['novel', 'drama', 'documentary']),
            'author'        => rand(1, 15), // must coincide with number of authors
        ];
    }
}
