<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categories = Category::all();
       foreach($categories as $category){
        products::factory(10)->create([
            'category_id' => $category->id
        ]);
       }
    }
}
