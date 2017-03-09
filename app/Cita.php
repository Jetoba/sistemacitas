<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = [

        'usuario_id', 'especialidad_id', 'medico_id', 'status',
        'historia_id', 'observaciones', 'fecha', 'hora'
    ];



    public function ScopeStatus($query){


        return $query->where('status','=','Asignada');


    }
    public function ScopeId($query, $id){


        return $query->where('usuario_id','like','%$id%');


    }
    public function Scopemedico($query, $id){


        return $query->where('medico_id','like','%$id%');


    }
    public function especialidad(){


        return $this->belongsTo('App\Especialidad','especialidad_id');

    }
    public function user(){


        return $this->belongsTo('App\User','usuario_id');
    }

    public function medico(){


        return $this->belongsTo('App\User','medico_id');
    }

    public function historia(){

        return $this->HasOne('App\Historia');
    }




}
