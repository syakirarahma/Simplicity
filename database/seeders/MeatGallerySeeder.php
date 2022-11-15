<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class MeatGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::create([
            'meat_packages_id' => '1',
            'image' => 'https://agromeatshop.com/wp-content/uploads/2021/10/April-0078-scaled.jpg'
        ]);

        Gallery::create([
            'meat_packages_id' => '2',
            'image' => 'https://agromeatshop.com/wp-content/uploads/2021/10/Tenderloin-Slice-1-scaled.jpg'
        ]);

        Gallery::create([
            'meat_packages_id' => '3',
            'image' => 'https://agromeatshop.com/wp-content/uploads/2021/09/Paru-1-scaled.jpg'
        ]);

        Gallery::create([
            'meat_packages_id' => '4',
            'image' => 'https://agromeatshop.com/wp-content/uploads/2021/09/Lidah-1-scaled.jpg'
        ]);
        
        Gallery::create([
            'meat_packages_id' => '5',
            'image' => 'https://agromeatshop.com/wp-content/uploads/2021/10/Gandik-slice-scaled.jpg'
        ]);
    }
}
