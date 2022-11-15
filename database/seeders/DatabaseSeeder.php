<?php

namespace Database\Seeders;

use App\Models\MeatPackage;
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
        $this->call([
            UserSeeder::class,
            MeatPackageSeeder::class,
            ArtikelSeeder::class,
            VideoSeeder::class,
            MeatGallerySeeder::class,
            ArtikelGallerySeeder::class,
        ]);

    }
}
