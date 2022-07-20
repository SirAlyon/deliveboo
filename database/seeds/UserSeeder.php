<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('db.restaurants');

        foreach ($restaurants as $restaurant) {
            $new_restaurant =  new User();
            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->password = $restaurant['password'];
            $new_restaurant->email = $restaurant['email'];
            $new_restaurant->email_verified_at = $restaurant['email_verified_at'];
            $new_restaurant->lastname = $restaurant['lastname'];
            $new_restaurant->restaurant_name = $restaurant['restaurant_name'];
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->vat = $restaurant['vat'];
            $new_restaurant->image = $restaurant['image'];
            /* $new_restaurant->types = $restaurant['types']; */

            $new_restaurant->save();
    }
}
