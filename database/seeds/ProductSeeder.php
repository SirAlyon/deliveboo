<?php

use Illuminate\Database\Seeder;

use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('db.products');

        foreach ($products as $product) {
            $new_product = new Product();
            $new_product->name = $product['name'];
            $new_product->description = $product['description'];
            $new_product->price = $product['price'];
            $new_product->visibility = $product['visibility'];
            $new_product->image = $product['image'];
            $new_product->save();
        }
    }
}
