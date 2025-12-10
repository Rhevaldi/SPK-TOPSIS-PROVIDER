<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];


    public function nilais()
{
    return $this->hasMany(Nilai::class);
}



    
}
