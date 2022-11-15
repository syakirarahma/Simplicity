<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VideoTutorial;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VideoTutorial::create([
            'title' => 'Captain Legend: Cooking with Dimas The Meat Guy',
            'slug' => 'captain-legend-cooking-with-dimas-the-meat-guy',
            'resource' => 'https://youtube.com/embed/XSFRk39SVpc',
            'creator' => 'Arnold Pramono',
            'publish' => '20 Mei 2022',
            'desc' => 'Di video kali ini Captain Legend gak sendirian tentunya ditemenin sama salah satu manusia daging atau kita sebut saja dia The Meat Guy. Udah tau kan siapa pasti yauda tonton aja dulu videonya sampai habis!',
        ]);

        VideoTutorial::create([
            'title' => 'JADI JAGOAN MASTERCHEF DENGAN CARA INI!',
            'slug' => 'jadi-jagoan-masterchef-dengan-cara-ini',
            'resource' => 'https://youtube.com/embed/g83Urraf9iQ',
            'creator' => 'Arnold Pramono',
            'publish' => '30 Agustus 2022',
            'desc' => 'Di episode kali ini kita bikin Steak ala jagoan master chef, kalo kalian yang ingin menjadi Masterchef Tonton videonya sampai habis! dijamin jagooo!! ',
        ]);

        VideoTutorial::create([
            'title' => 'DRY AGED US PRIME OP RIBS DAN SIRLOIN SELAMA 10 HARI!!! | DRY AGED',
            'slug' => 'dry-aged-us-prime-op-ribs-dan-sirloin-selama-10-hari',
            'resource' => 'https://youtube.com/embed/fSmafZrciAQ',
            'creator' => 'Dimas The Meat Guy',
            'publish' => '15 Oktober 2022',
            'desc' => 'Experiment kita kali ini adalah nge dry aged daging US Prime OP Ribs dan Sirloin selama 10 hari Kira kira bakalan enak yang mana yaa?? OP Ribs atau Sirloin?? Langsung aja tonton videonya sampe habis!!',
        ]);
    }
}
