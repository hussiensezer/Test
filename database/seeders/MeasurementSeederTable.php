<?php

namespace Database\Seeders;

use App\Models\Measurement;
use Illuminate\Database\Seeder;

class MeasurementSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measurements = [
                ['ar' => 'كيلو' , 'en' => 'Kilo'],
                ['ar' => 'قطعة' , 'en' => 'piece'],
        ];

        foreach($measurements as $measurement) {
            Measurement::create([
                'name' => $measurement,

            ]);
        }
    }
}
