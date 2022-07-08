<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            [
                'name'          => ['ar' => 'الحجم' , 'en' => 'Size'],
                'type_field'    => 'multi_drop_down',
                'default_value' => ['sm', 'xl', 'lg', 'md'],
                'status'        => 1,

            ],
            [
                'name'          => ['ar' => 'اللون', 'en' => 'color'],
                'type_field'    => 'drop_down',
                'default_value' => ['red' , 'green', 'blue', 'yellow'],
                'status'        => 1,
            ],

            [
                'name'          => ['ar' => 'واى فاى', 'en' => 'WIFI'],
                'type_field'    => 'radio',
                'default_value' => ['Yes', 'No'],
                'status'        => 1,
            ],

            [
                'name'          => ['ar' => 'اسكرين', 'en'  => 'Screen'],
                'type_field'    => 'text',
                'default_value' => null,
                'status'        => 1,
            ]
        ];

        foreach($attributes as $attribute) {
            Attribute::create($attribute);
        }
    }
}
