<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historia extends Model
{
    protected $table = 'historias';
    use SoftDeletes;

    protected $fillable = [
        'paciente_id','medico_id','informe', 'especialidad_id', 'cita_id'
    ];

    //
    public function paciente(){

        return $this->belongsTo('App\User','paciente_id');
    }
    //
    public function medico(){

        return $this->belongsTo('App\User','medico_id');
    }
    //
    public function cita(){

        return $this->belongsTo('App\Cita','cita_id');
    }
    //especialidad
    public function especialidad(){

        return $this->belongsTo('App\Especialidad','especialidad_id');
    }

    public function scopeId($query, $id){


        return $query->where('paciente_id','like','%$id%');


    }

}
