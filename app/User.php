<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable, HasRoles;
    use SoftDeletes;


    protected $fillable = [
        'nombre', 'apellido', 'cedula', 'fechanacimiento', 'edad', 'sexo',
        'telefono', 'celular', 'direccion', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function especialidad(){
        return $this->belongsToMany('App\Especialidad','especialidades_users','usuario_id');
    }

    public function cita(){
        return $this->hasMany('App\Cita');
    }

    public function historia(){

        return $this->hasMany('App\Historia');
    }

}
