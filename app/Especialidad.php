<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especialidad extends Model
{

    protected $table = "especialidades";

    use SoftDeletes;

    protected $fillable = [
        'nombre',
    ];


    public function cita()
    {

        return $this->hasMany('App\Cita');

    }
    public function historia()
    {

        return $this->hasMany('App\Historia');

    }
    public function user()
    {

        return $this->belongsToMany('App\User','especialidades_users','especialidad_id');

    }


}
