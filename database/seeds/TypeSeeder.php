<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = config('db.types');

        foreach($types as $type) {
            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->image = $type['img'];
            $new_type->save();
        }
    }
}
