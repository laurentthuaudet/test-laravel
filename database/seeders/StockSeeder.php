<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder 
{
    public function run(): void
    {
        Stock::insert([
            ['name' => 'Apple Inc.', 'symbol' => 'AAPL', 'quantity' => 10, 'price' => 150.00],
            ['name' => 'Microsoft Corporation', 'symbol' => 'MSFT', 'quantity' => 5, 'price' => 250.00]
        ]);
    }
}