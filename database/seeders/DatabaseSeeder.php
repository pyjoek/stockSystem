<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $hq = Branch::firstOrCreate(
            ['code' => 'HQ'],
            ['name' => 'Head Office', 'location' => 'Dar es Salaam']
        );

        for ($i = 1; $i <= 15; $i++) {
            Branch::firstOrCreate(
                ['code' => 'VITA'.$i],
                ['name' => 'Vita Branch '.$i, 'location' => 'Dar es Salaam']
            );
        }

        Product::firstOrCreate(
            ['sku' => 'RICE-25'],
            ['name' => 'Rice 25kg', 'unit' => 'bag', 'cost_price' => 45000, 'sale_price' => 52000, 'reorder_level' => 10]
        );
        Product::firstOrCreate(
            ['sku' => 'SUGAR-1'],
            ['name' => 'Sugar 1kg', 'unit' => 'kg', 'cost_price' => 2500, 'sale_price' => 3200, 'reorder_level' => 50]
        );

        User::firstOrCreate(
            ['email' => 'admin@stock.local'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'branch_id' => $hq->id,
            ]
        );
    }
}
