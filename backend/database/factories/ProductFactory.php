<?php

namespace Database\Factories;

use App\Models\Categorys;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'categorys_id' => Categorys::all()->random()->id,
            'price' => $this->faker->numberBetween(100, 10000), // Example price range
            'discount' => $this->faker->numberBetween(0, 50),   // Example discount range
            'stock' => $this->faker->numberBetween(0, 100),     // Example stock range
        ];
    }
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
