<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{

    protected $table = "especialidades";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'especialidad_id');

    }
    public function citas()
    {

        return $this->hasOne('App\Cita', 'especialidad_id');

    }
}
