<?php

use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


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
            //Fra: Update or create per evitare la duplicazione
            //o i vincoli del DB
            $new_restaurant = User::updateOrCreate(
                [
                    'email' => $restaurant['email'],
                    'vat' => $restaurant['vat']
                ],
                [
                    'name' => $restaurant['name'],
                    'password' => Hash::make($restaurant['password']),
                    'email_verified_at' => $restaurant['email_verified_at'],
                    'lastname' => $restaurant['lastname'],
                    'restaurant_name' => $restaurant['restaurant_name'],
                    'address' => $restaurant['address'],
                    'image' => $restaurant['image']
                ]
            );

            $types = [];

            foreach($restaurant['types'] as $type){
                $DBType = Type::where('name',$type)->first();
                if($DBType != null){
                    $types[]=$DBType->id;
                }
            }
            //Fra: sync in modo tale che cambiando il db.php
            //si possano ricreare nuove connessioni con i type
            $new_restaurant->types()->sync($types);
        }
    }
};
