<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Cart;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Order;
use App\Models\Rating;
use App\Models\OrderDeatils;
use App\Models\products;
use App\Models\Wishlist;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        Category::factory(10)->create();
        Order::factory(10)->create();
        Blog::factory(10)->create();
        Wishlist::factory(200)->create();
        Cart::factory(200)->create();
        Rating::factory(200)->create();
        OrderDeatils::factory(10)->create();
        // products::factory(10)->create();
        $this->call([
            ProductsSeeder::class
        ]);
    }
}
