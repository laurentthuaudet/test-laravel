<?php

namespace Database\Seeders;

use App\Models\NetAssetValue;
use Illuminate\Database\Seeder;

class NetAssetValueSeeder extends Seeder
{
    public function run()
    {
        $prosus = NetAssetValue::insertGetId([
            'name' => 'Prosus',
            'value' => 95.885,
            'parent_id' => null,
            'date' => '092024',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $data = [
            ['name' => 'Tencent', 'value' => 164.3, 'parent_id' => $prosus, 'date' => '092024'],
            ['name' => 'Delivery Hero', 'value' => 8.8, 'parent_id' => $prosus, 'date' => '092024'],
            ['name' => 'Remitly', 'value' => 1.4, 'parent_id' => $prosus, 'date' => '092024'],
            ['name' => 'VK', 'value' => 1.3, 'parent_id' => $prosus, 'date' => '092024'],
            ['name' => 'Trip.com', 'value' => 0.9, 'parent_id' => $prosus, 'date' => '092024'],
            ['name' => 'Skillsoft', 'value' => 0.6, 'parent_id' => $prosus, 'date' => '092024'],
            ['name' => 'Sinch', 'value' => 0.3, 'parent_id' => $prosus, 'date' => '092024'],
            ['name' => 'SimilarWeb', 'value' => 0.2, 'parent_id' => $prosus, 'date' => '092024'],
            ['name' => 'Unlisted', 'value' => 37.9, 'parent_id' => $prosus, 'date' => '092024'],
            ['name' => 'Cash', 'value' => 13.6, 'parent_id' => $prosus, 'date' => '092024'],
            ['name' => 'Debt', 'value' => -10.5, 'parent_id' => $prosus, 'date' => '092024'],
        ];

        foreach ($data as $item) {
            NetAssetValue::insert(array_merge($item, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
