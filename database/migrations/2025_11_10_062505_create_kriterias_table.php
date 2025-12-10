<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::create('kriterias', function (Blueprint $table) {
        $table->id();
        $table->string('nama');        // Nama kriteria, contoh: Harga, Kapasitas
        $table->enum('tipe', ['benefit', 'cost']); // Tipe kriteria: benefit/cost
        $table->float('bobot', 8, 2); // Bobot kriteria, misal 0.3, 0.2
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriterias');
    }
};
