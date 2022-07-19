<?php

return [
    'types' => [
        [
            'name' => 'Orientale',
            'img' => 'https://images.pexels.com/photos/2347311/pexels-photo-2347311.jpeg?cs=srgb&dl=pexels-engin-akyurt-2347311.jpg&fm=jpg',

        ],
        [
            'name' => 'Gelateria',
            'img' => 'https://images.pexels.com/photos/5570880/pexels-photo-5570880.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        ],
        [
            'name' => 'Indiano',
            'img' => 'https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg?cs=srgb&dl=pexels-chan-walrus-958545.jpg&fm=jpg',
        ],
        [
            'name' => 'Internazionale',
            'img' => 'https://images.pexels.com/photos/941861/pexels-photo-941861.jpeg?cs=srgb&dl=pexels-chan-walrus-941861.jpg&fm=jpg',
        ],
        [
            'name' => 'Italiano',
            'img' => 'https://images.pexels.com/photos/1566837/pexels-photo-1566837.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        ],
        [
            'name' => 'Messicano',
            'img' => 'https://images.pexels.com/photos/7772198/pexels-photo-7772198.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        ],
        [
            'name' => 'Pizzeria',
            'img' => 'https://images.pexels.com/photos/905847/pexels-photo-905847.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        ],
        [
            'name' => 'Street food',
            'img' => 'https://images.pexels.com/photos/920570/pexels-photo-920570.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        ],
        [
            'name' => 'Vegetariano',
            'img' => 'https://images.pexels.com/photos/6608617/pexels-photo-6608617.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        ],


    ],
    'restaurants' => [
        [
            'id'=> '1',
            'name' => 'Fra',
            'password'=> '123456',
            'email' => 'ristorantepechino@mail.com',
            'email_verified_at'=> NULL,
            'lastname' => 'Rossi',
            'restaurant_name' => 'Ristorante Pechino',
            'address' => 'Via Rossini 1',
            'vat' => '15915915901',
            'image' => 'https://images.pexels.com/photos/2347311/pexels-photo-2347311.jpeg?cs=srgb&dl=pexels-engin-akyurt-2347311.jpg&fm=jpg',
            'types'=> ['Orientale', 'Internazionale']

        ],
        [
            'id'=> '2',
            'name' => 'Fra',
            'password'=> '1234567',
            'email' => 'gelaterigianni@mail.com',
            'email_verified_at'=> NULL,
            'lastname' => 'Rossi',
            'restaurant_name' => 'Gelateria Gianni',
            'address' => 'Via Rossini 2',
            'vat' => '15915915902',
            'image' => 'https://images.pexels.com/photos/5570880/pexels-photo-5570880.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'types'=> ['Gelateria', 'Italiano']
        ],
        [
            'id'=> '3',
            'name' => 'Fra',
            'password'=> '1234568',
            'email' => 'sushilab@mail.com',
            'email_verified_at'=> NULL,
            'lastname' => 'Rossi',
            'restaurant_name' => 'Sushi Lab',
            'address' => 'Via Rossini 3',
            'vat' => '15915915903',
            'image' => 'https://images.pexels.com/photos/3763816/pexels-photo-3763816.jpeg?cs=srgb&dl=pexels-horizon-content-3763816.jpg&fm=jpg',
            'types'=> ['Orientale', 'Internazionale']
        ],
        [
            'id'=> '4',
            'name' => 'Fra',
            'password'=> '1234569',
            'email' => 'tajmahal@mail.com',
            'email_verified_at'=> NULL,
            'lastname' => 'Rossi',
            'restaurant_name' => 'Taj Mahal',
            'address' => 'Via Rossini 4',
            'vat' => '15915915904',
            'image' => 'https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg?cs=srgb&dl=pexels-chan-walrus-958545.jpg&fm=jpg',
            'types'=> ['Orientale', 'Internazionale']
        ],
        [
            'id'=> '5',
            'name' => 'Fra',
            'password'=> '12345610',
            'email' => 'internazionalbistrot@mail.com',
            'email_verified_at'=> NULL,
            'lastname' => 'Rossi',
            'restaurant_name' => 'Internazional Bistrot',
            'address' => 'Via Rossini 5',
            'vat' => '15915915905',
            'image' => 'https://images.pexels.com/photos/941861/pexels-photo-941861.jpeg?cs=srgb&dl=pexels-chan-walrus-941861.jpg&fm=jpg',
            'types'=> ['Internazionale']
        ],
        [
            'id'=> '6',
            'name' => 'Fra',
            'password'=> '12345611',
            'email' => 'mammamia@mail.com',
            'email_verified_at'=> NULL,
            'lastname' => 'Rossi',
            'restaurant_name' => 'Mamma Mia',
            'address' => 'Via Rossini 6',
            'vat' => '15915915906',
            'image' => 'https://images.pexels.com/photos/1566837/pexels-photo-1566837.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'types'=> ['Italiano', 'Pizzeria']
        ],
        [
            'id'=> '7',
            'name' => 'Fra',
            'password'=> '12345612',
            'email' => 'chilipeppers@mail.com',
            'email_verified_at'=> NULL,
            'lastname' => 'Rossi',
            'restaurant_name' => 'Chili Peppers',
            'address' => 'Via Rossini 7',
            'vat' => '15915915907',
            'image' => 'https://images.pexels.com/photos/7772198/pexels-photo-7772198.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'types'=> ['Messicano', 'Internazionale']
        ],
        [
            'id'=> '8',
            'name' => 'Fra',
            'password'=> '12345613',
            'email' => 'pizzeriadonfranchino@mail.com',
            'email_verified_at'=> NULL,
            'lastname' => 'Rossi',
            'restaurant_name' => 'Pizzeria Don Franchino',
            'address' => 'Via Rossini 8',
            'vat' => '15915915908',
            'image' => 'https://images.pexels.com/photos/905847/pexels-photo-905847.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'types'=> ['Italiano', 'Pizzeria']
        ],
        [
            'id'=> '9',
            'name' => 'Fra',
            'password'=> '12345614',
            'email' => 'pizzette@mail.com',
            'email_verified_at'=> NULL,
            'lastname' => 'Rossi',
            'restaurant_name' => 'Pizzette',
            'address' => 'Via Rossini 9',
            'vat' => '15915915909',
            'image' => 'https://images.pexels.com/photos/920570/pexels-photo-920570.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'types'=> ['Italiano', 'Internazionale', 'Vegetariano']
        ],
        [
            'id'=> '10',
            'name' => 'Fra',
            'password'=> '12345615',
            'email' => 'gea@mail.com',
            'email_verified_at'=> NULL,
            'lastname' => 'Rossi',
            'restaurant_name' => 'Gea',
            'address' => 'Via Rossini 10',
            'vat' => '15915915910',
            'image' => 'https://images.pexels.com/photos/6608617/pexels-photo-6608617.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'types'=> ['Italiano', 'Internazionale', 'Vegetariano']
        ],


    ],

    'products' => [
        [
            'name' => 'Antipasti caldi',
            'description' => 'Lorem ipsum dolor',
            'price' => '10.99',
            'visibility' => 1,
            'image' => 'https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ],
        [
            'name' => 'Antipasti freddi',
            'description' => 'Lorem ipsum dolor',
            'price' => '9.99',
            'visibility' => 1,
            'image' => 'https://images.pexels.com/photos/59524/pexels-photo-59524.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ],
        [
            'name' => 'Pasta allo scoglio',
            'description' => 'Lorem ipsum dolor',
            'price' => '12.80',
            'visibility' => 1,
            'image' => 'https://images.pexels.com/photos/921374/pexels-photo-921374.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ],
        [
            'name' => 'Risotto',
            'description' => 'Lorem ipsum dolor',
            'price' => '15.60',
            'visibility' => 1,
            'image' => 'https://images.pexels.com/photos/2067418/pexels-photo-2067418.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ],
        [
            'name' => 'Braciole',
            'description' => 'Lorem ipsum dolor',
            'price' => '15.00',
            'visibility' => 1,
            'image' => 'https://images.pexels.com/photos/11749407/pexels-photo-11749407.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ],
        [
            'name' => 'Verdure in padella',
            'description' => 'Lorem ipsum dolor',
            'price' => '7.50',
            'visibility' => 1,
            'image' => 'https://images.pexels.com/photos/11213759/pexels-photo-11213759.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ],
        [
            'name' => 'Tiramisù',
            'description' => 'Lorem ipsum dolor',
            'price' => '6.00',
            'visibility' => 1,
            'image' => 'https://images.pexels.com/photos/6328588/pexels-photo-6328588.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ],
        [
            'name' => 'Gelato',
            'description' => 'Lorem ipsum dolor',
            'price' => '6.00',
            'visibility' => 1,
            'image' => 'https://images.pexels.com/photos/1362534/pexels-photo-1362534.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ],
        [
            'name' => 'Coca Cola',
            'description' => 'Lorem ipsum dolor',
            'price' => '3.00',
            'visibility' => 1,
            'image' => 'https://images.pexels.com/photos/50593/coca-cola-cold-drink-soft-drink-coke-50593.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ],
        [
            'name' => 'Birra',
            'description' => 'Lorem ipsum dolor',
            'price' => '4.00',
            'visibility' => 1,
            'image' => 'https://images.pexels.com/photos/1672304/pexels-photo-1672304.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ]
    ],
    'orders' => [
        [
            'guest_name' => 'Alessio',
            'guest_lastname' => 'Sada',
            'guest_email' => 'alessiosada04@gmail.com',
            'guest_address' => 'Viale Monza 12',
            'guest_phone_number' => '+(39) 3923950030',
            'total_price' => 49.99

        ],
        [
            'guest_name' => 'Francesca',
            'guest_lastname' => 'Huda',
            'guest_email' => 'francesca@gmail.com',
            'guest_address' => 'Viale Marche 12',
            'guest_phone_number' => '+(39) 3923950030',
            'total_price' => 29.99

        ],
        [
            'guest_name' => 'Kiba',
            'guest_lastname' => 'Inu',
            'guest_email' => 'kiba@gmail.com',
            'guest_address' => 'Viale Monza 12',
            'guest_phone_number' => '+(39) 3923950030',
            'total_price' => 19.99
        ],
    ]

];
