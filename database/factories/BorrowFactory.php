<?php

namespace Database\Factories;

use App\Models\Borrow;
use Illuminate\Database\Eloquent\Factories\Factory;

use Arr;

class BorrowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Borrow::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reader_id' => $this->faker->randomNumber(1)+1,
            'book_id' => $this->faker->randomNumber(1)+1,
            'status' => Arr::random(['PENDING','ACCEPTED','REJECTED','RETURNED']),
            'request_processed_at' => $this->faker->dateTime(),
            'request_managed_by' => $this->faker->randomNumber(1)+1,
            'request_processed_message' => $this->faker->text(),
            'deadline' => $this->faker->dateTime(),
            'returned_at' => null,
            'return_managed_by' => $this->faker->randomNumber(1)+1
        ];
    }
}
