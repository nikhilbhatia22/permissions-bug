<?php

use Illuminate\Database\Seeder;

class ProductsAndCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ProductCategory::class,100)->create();
        factory(\App\Product::class,10000)->create();
    }
}
