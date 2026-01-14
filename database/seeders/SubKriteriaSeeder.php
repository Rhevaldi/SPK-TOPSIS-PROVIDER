<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kriteria;     
use App\Models\SubKriteria; 

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
{
    $harga      = Kriteria::where('nama','Harga')->first();
    $kuota      = Kriteria::where('nama','Jumlah Kuota')->first();
    $kecepatan  = Kriteria::where('nama','Kecepatan Internet')->first();
    $bonus      = Kriteria::where('nama','Bonus')->first();

    SubKriteria::insert([

       
        ['kriteria_id'=>$harga->id,'nama'=>'5.000 – 20.000','nilai'=>5],
        ['kriteria_id'=>$harga->id,'nama'=>'21.000 – 40.000','nilai'=>4],
        ['kriteria_id'=>$harga->id,'nama'=>'41.000 – 60.000','nilai'=>3],
        ['kriteria_id'=>$harga->id,'nama'=>'61.000 – 80.000','nilai'=>2],
        ['kriteria_id'=>$harga->id,'nama'=>'> 100.000','nilai'=>1],
 
        ['kriteria_id'=>$kuota->id,'nama'=>'> 100 GB','nilai'=>5],
        ['kriteria_id'=>$kuota->id,'nama'=>'60 – 99 GB','nilai'=>4],
        ['kriteria_id'=>$kuota->id,'nama'=>'30 – 59 GB','nilai'=>3],
        ['kriteria_id'=>$kuota->id,'nama'=>'10 – 39 GB','nilai'=>2],
        ['kriteria_id'=>$kuota->id,'nama'=>'< 10 GB','nilai'=>1],

       
        ['kriteria_id'=>$kecepatan->id,'nama'=>'> 20 Mbps','nilai'=>5],
        ['kriteria_id'=>$kecepatan->id,'nama'=>'18 – 20 Mbps','nilai'=>4],
        ['kriteria_id'=>$kecepatan->id,'nama'=>'15 – 17 Mbps','nilai'=>3],
        ['kriteria_id'=>$kecepatan->id,'nama'=>'< 15 Mbps','nilai'=>2],

        
        ['kriteria_id'=>$bonus->id,'nama'=>'Akses TikTok','nilai'=>5],
        ['kriteria_id'=>$bonus->id,'nama'=>'Masa aktif panjang','nilai'=>4],
        ['kriteria_id'=>$bonus->id,'nama'=>'Gaming','nilai'=>3],
        ['kriteria_id'=>$bonus->id,'nama'=>'Telepon Gratis','nilai'=>2],
        ['kriteria_id'=>$bonus->id,'nama'=>'Google Maps','nilai'=>1],
    ]);
}


}
