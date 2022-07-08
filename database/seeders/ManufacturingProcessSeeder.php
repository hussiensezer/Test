<?php

namespace Database\Seeders;

use App\Models\ManufacturingProcess;
use Illuminate\Database\Seeder;

class ManufacturingProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturingProcesses = [
            [
                'name'      => ['ar' => 'قص', 'en' => 'cut'],
                'status'    => 1
            ],

            [
                'name'      => ['ar' => 'لصق', 'en' => 'paste'],
                'status'    => 1
            ],
        ];

        foreach($manufacturingProcesses as $manufacturingProcess) {

            ManufacturingProcess::create([
                'name'      => $manufacturingProcess['name'],
                'status'    => $manufacturingProcess['status']
            ]);
        }
    }
}
