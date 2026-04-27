<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for($i = 0; $i < 10; $i++){
            Berita::create([
                'judul' => $faker->sentence,
                'penulis' => $faker->name,
                'tanggal_publikasi' => $faker->date
            ]);
        }
    }
}
