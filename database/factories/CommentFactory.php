<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class CommentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->sentence(5),
            'likes' => $this->faker->numberBetween(1, 500),
            'dislikes' => $this->faker->numberBetween(1, 500),
            'product_id' => Product::factory()->lazy(),
            'user_id' => User::factory()->lazy(),
        ];
    }

}
