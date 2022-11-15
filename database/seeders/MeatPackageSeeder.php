<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\MeatPackage;

class MeatPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MeatPackage::create([
            'title' => 'Sirloin Slice',
            'slug' => 'sirloin-slice',
            'type' => 'Primary Cut',
            'price' => 65000,
            'about' => 'Lorem Ipsum',
            'stock' => 30
        ]);

        MeatPackage::create([
            'title' => 'Tenderloin Slice',
            'slug' => 'tenderloin-slice',
            'type' => 'Primary Cut',
            'price' => 75000,
            'about' => 'Lorem Ipsum',
            'stock' => 30
        ]);

        MeatPackage::create([
            'title' => 'Paru/Lung',
            'slug' => 'paru-lung',
            'type' => 'Secondary Cut',
            'price' => 45000,
            'about' => 'Lorem Ipsum',
            'stock' => 30
        ]);

        MeatPackage::create([
            'title' => 'Lidah/Ox-Tongue',
            'slug' => 'lidah-ox-tongue',
            'type' => 'Secondary Cut',
            'price' => 50000,
            'about' => 'Lorem Ipsum',
            'stock' => 30
        ]);

        MeatPackage::create([
            'title' => 'Gandik',
            'slug' => 'gandik',
            'type' => 'Fancy & Variety Meat',
            'price' => 60000,
            'about' => 'Lorem Ipsum',
            'stock' => 30
        ]);
    }
}