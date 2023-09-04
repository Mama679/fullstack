<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = "niveles";

    public function alumno()
    {
        return $this->hasMany(Alumno::class,"nivel_id","id");
    }
}
