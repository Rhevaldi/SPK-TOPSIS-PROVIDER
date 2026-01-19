<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Operator;


class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operators = [
            'Three (3)',
            'IM3',
            'Axis',
            'By.U',
            'Smartfren',
            'XL',
            'Simpati',
            'Kartu Halo',
        ];

    foreach ($operators as $nama) {
        Operator::firstOrCreate([
            'nama' => $nama
        ]);

    }
}

}