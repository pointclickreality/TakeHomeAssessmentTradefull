<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // path to product assets
        $path = '/assets/media/stock/900x600/';

        return [
            'name' => $this->faker->unique()->hexColor(),
            // set the value of the product image based on the 79 available images
            'product_image' => $this->faker->unique(true)->numberBetween(1, 79) . '.jpg',
            'likes' => $this->faker->unique(true)->numberBetween(0, 9000),
            'dislikes' => $this->faker->unique(true)->numberBetween(0, 9000),
            'sales' => $this->faker->unique(true)->numberBetween(0, 15000),
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['trending', 'starred', 'featured']),

            // take advantage of lazy loading the related keys, when the seeder is ran
            'product_category_id' => ProductCategory::factory()->lazy(),
            'user_id' => User::factory()->lazy(),
        ];
    }
}
