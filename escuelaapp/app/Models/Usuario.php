<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    protected $table = 'usuarios';
    
    protected $fillable = [
        'usernom',
        'nombres',
        'email',
        'rol_id',
        'password',
    ];

    

    public function rol(){
        return $this->belongsTo(Rol::class,'rol_id','id');
    }
}
