<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    protected $table = 'recipes';
    use SoftDeletes;

    protected $fillable = [

        'observaciones', 'cita_id'
       ];


    //RELACIONES

    public function medicina(){
        return $this->belongsToMany('App\Medicina','recipe_has_medicinas','recipe_id');
    }

    protected function user(){

        return $this->belongsTo('App\User', 'paciente_id');
    }
    public function medico(){


        return $this->belongsTo('App\User','medico_id');
    }
    public function historia(){


        return $this->belongsTo('App\Historia','recipe_id');
    }

    //SCOPE
    public function ScopeStatus($query){

        return $query->where('status','=','Pendiente');
    }
}
