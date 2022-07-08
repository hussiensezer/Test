<?php

namespace Database\Seeders;

use App\Models\InventorySetting;
use Illuminate\Database\Seeder;

class InventorSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventorSetting = [
            'manual_withdraw'       => 0,
            'limit_alert'           => 0,
            'prefix_code_item'      => 'IT',
            'prefix_code_product'   => 'PR'
        ];

        InventorySetting::create([
            'manual_withdraw'       => $inventorSetting['manual_withdraw'],
            'limit_alert'           => $inventorSetting['limit_alert'],
            'prefix_code_item'      => $inventorSetting['prefix_code_item'],
            'prefix_code_product'   => $inventorSetting['prefix_code_product']
        ]);
    }
}
