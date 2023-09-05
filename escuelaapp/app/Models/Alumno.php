<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Alumno extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = "alumnos";

    protected $fillable = [
        'nombres',
        'telefono',
        'fecha_nacimiento',
        'email',
        'nivel_id'
    ];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class,'nivel_id','id');
    }
}
