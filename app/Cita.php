<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    protected $table = 'citas';

    use SoftDeletes;

    protected $fillable = [

        'fecha', 'status', 'observaciones', 'paciente_id', 'medico_id', 'especialidad_id',
    ];




    public function scopeId($query, $id){


        return $query->where('medico_id','like','%$id%');


    }

    public function especialidad(){


        return $this->belongsTo('App\Especialidad','especialidad_id');

    }

    public function medicox(){


        return $this->belongsTo('App\User','medico_id');
    }

    public function paciente(){


        return $this->belongsTo('App\User','paciente_id');
    }

    public function recipe(){

        return $this->HasOne('App\Recipe');
    }

    public function historia(){

        return $this->HasOne('App\Historia');
    }




}
