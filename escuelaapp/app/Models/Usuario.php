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
    //protected $primaryKey = 'id_usuario';
    //public $incrementing = true;
    //public $timestamps = true;


    protected $fillable = [
        'usernom',
        'nombres',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        
    ];

    public function rol(){
        return $this->belongsTo(Rol::class,'rol_id','id');
    }
}
