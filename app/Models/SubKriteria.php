<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    protected $table = 'sub_kriteria';

    protected $fillable = [
        'kriteria_id',
        'nama',
        'nilai'
    ];

    public function kriteria()
{
    return $this->belongsTo(Kriteria::class);
}

}
