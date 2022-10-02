<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Create the users table
     * Create the products related to those users, per user
     * Create the comments that can be associated with those products, per product
     *
     * @return void
     */
    public function run()
    {
        // create between 10 or 20 users
        $users = User::factory()->count(rand(5, 20))->create();

        // loop each user
        $users->each(function ($user) {
            // lets make products for each users
            $products = Product::factory()->count(rand(2, 10))->create([
                'user_id' => $user->id,
            ]);

            // loop products
            $user->products()->each(function ($product) {
                // Create 10 Comments
                $comments = Comment::factory()->count(rand(3, 15))->create([
                    'product_id' => $product->id,
                    'user_id' => $product->user->id,
                ]);
            });
        });
    }
}
