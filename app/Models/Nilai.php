<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = ['operator_id', 'kriteria_id', 'nilai'];

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
