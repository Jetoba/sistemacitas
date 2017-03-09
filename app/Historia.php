<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $table = 'historias';

    protected $fillable = [
        'usuario_id','medico_id','recipe_id','informe'
    ];

    public function user(){

        return $this->belongsTo('App\User','usuario_id');
    }

    public function medicos(){

        return $this->belongsTo('App\User','medico_id');
    }

    public function cita(){

        return $this->belongsTo('App\Cita','historia_id');
    }

    public function recipe(){

        return $this->hasOne('App\Recipe');
    }

}
