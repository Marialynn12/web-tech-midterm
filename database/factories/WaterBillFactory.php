<?php

namespace Database\Factories;

use App\Models\WaterBill;
use Illuminate\Database\Eloquent\Factories\Factory;

class WaterBillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WaterBill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'house_number' => $this->faker->word,
        'month' => $this->faker->word,
        'payment' => $this->faker->word,
        'balance' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
