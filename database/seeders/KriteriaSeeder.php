<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    public function run()
{
    
    Kriteria::create(['nama' => 'Harga', 'bobot' => 5, 'tipe' => 'cost']);
    Kriteria::create(['nama' => 'Jumlah Kuota', 'bobot' => 5, 'tipe' => 'benefit']);
    Kriteria::create(['nama' => 'Kecepatan Internet', 'bobot' => 5, 'tipe' => 'benefit']);
    Kriteria::create(['nama' => 'Bonus', 'bobot' => 4, 'tipe' => 'benefit']);
}
}