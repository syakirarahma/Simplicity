<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArtikelGallery;

class ArtikelGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArtikelGallery::create([
            'artikel_packages_id' => '1',
            'image' => 'https://d324bm9stwnv8c.cloudfront.net/artikel/20180814101437.611235961636.png'
        ]);

        ArtikelGallery::create([
            'artikel_packages_id' => '2',
            'image' => 'https://cdn-2.tstatic.net/tribunnewswiki/foto/bank/images/rumah-pemotongan-hewan-2.jpg'
        ]);

        ArtikelGallery::create([
            'artikel_packages_id' => '3',
            'image' => 'https://asset.kompas.com/crops/o6zdc0_3Z-kxUrW8nYaKeglbojo=/0x28:1000x695/750x500/data/photo/2021/07/14/60ee4d217d0f3.jpg'
        ]);
    }
}
