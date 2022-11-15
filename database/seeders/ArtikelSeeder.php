<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArtikelPackage;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArtikelPackage::create([
            'title' => 'Daging Sapi dan Kamping, Mana yang lebih Baik',
            'slug' => 'daging-sapi-dan-kambing-mana-yang-lebih-baik',
            'writer' => 'dr. Rizal Fadli',
            'publish' => '10 April 2022',
            'desc' => 'Secara umum, daging kambing adalah daging yang cukup populer di dunia, terutama di kawasan Timur Tengah. Di balik kelezatannya yang membuat daging ini cukup diminati, sebenarnya daging kambing tetap memiliki kandungan kalori lebih banyak. Dalam porsi yang sama, daging kambing mengandung sekitar 258 kalori, sedangkan daging sapi mengandung kalori sekitar 217 kalori. Selain lebih rendah lemak, daging kambing justru mengandung lebih banyak protein dan zat besi daripada daging sapi. Inilah yang menjadikan daging kambing pilihan yang baik bagi kamu yang mencari daging merah sehat dan ingin menjaga berat badan.',
        ]);

        ArtikelPackage::create([
            'title' => 'Mengenal Daging Sapi',
            'slug' => 'mengenal-daging-sapi',
            'writer' => 'Fachri',
            'publish' => '15 Juni 2022',
            'desc' => 'Daging sapi adalah daging yang didapatkan dari sapi. Pada umumnya digunakan untuk keperluan konsumsi makanan. Daging sapi memiliki definisi sebagai semua jaringan daging binatang sapi dan semua produk hasil pengolahan jaringan-jaringan dalam daging tersebut.',
        ]);

        ArtikelPackage::create([
            'title' => 'Nutrisi dan Manfaat Daging Sapi',
            'slug' => 'nutrisi-dan-manfaat-daging-sapi',
            'writer' => 'Yoko',
            'publish' => '20 Juli 2022',
            'desc' => 'Lemak Daging sapi mengandung jumlah lemak yang bervariasi. Jumlahnya bergantung pada usia, jenis, jenis kelamin, dan pakan yang digunakan. Daging tanpa lemak umumnya hanya mengandung sekitar 5-10 persen lemak, sedankan daging olahan seperti sosis cenderung tinggi lemak. Lemak yang terkandung dalam daging sapi merupakan lemak jenuh dan tak jenuh tunggal. Asam lemak utamanya adalah asam stearat, asam oleat, dan asam palmitat'
        ]);
    }
}
