<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'cedula', 'fechanacimiento', 'edad', 'sexo',
        'telefono', 'celular', 'direccion', 'email', 'password', 'especialidad_id',
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
        return $this->belongsTo('App\Especialidad');
    }

    public function citas(){
        return $this->belongsTo('App\Cita');
    }

    public function citasmedico(){

        return $this->belongsTo('App\Cita','medico_id');
    }

    public function historia(){

        return $this->hasOne('App\Historia');
    }

}
