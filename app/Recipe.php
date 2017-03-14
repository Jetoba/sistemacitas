<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    protected $table = 'recipes';
    use SoftDeletes;

    protected $fillable = [

        'observaciones', 'cita_id', 'status', 'farmaceuta_id'
       ];


    //RELACIONES

    public function medicina(){
        return $this->belongsToMany('App\Medicina','recipe_has_medicinas','recipe_id','medicina_id');
    }

    public function cita(){


        return $this->belongsTo('App\Cita','cita_id');
    }

    public function farmaceuta(){


        return $this->belongsTo('App\User','farmaceuta_id');
    }


    //SCOPE
    public function ScopeStatus($query){

        return $query->where('status','=','Pendiente');
    }

    public function scopeId($query, $id){


        return $query->where('cita_id','like','%$id%');


    }
}
