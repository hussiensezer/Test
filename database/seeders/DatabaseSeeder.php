<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeederTable::class);
        $this->call(InventorSettingSeeder::class);
        $this->call(CategorySeederTable::class);
        $this->call(MeasurementSeederTable::class);
        $this->call(AttributeSeederTable::class);
        $this->call(ManufacturingProcessSeeder::class);

    }
}
