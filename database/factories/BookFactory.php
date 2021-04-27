<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word(),
            'authors'=>$this->faker->name(),
            'description'=>$this->faker->text(),
            'released_at'=>$this->faker->dateTime(),
            'cover_image'=>'',
            'pages'=>$this->faker->randomNumber(1),
            'language_code'=>'hu',
            'isbn'=>$this->faker->unique()->word(),
            'in_stock'=>$this->faker->randomNumber(1)
        ];
    }
}
