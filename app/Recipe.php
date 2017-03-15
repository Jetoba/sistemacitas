<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    protected $table = 'recipes';
    use SoftDeletes;

    protected $fillable = [

        'observaciones', 'historia_id', 'status', 'farmaceuta_id'
       ];


    //RELACIONES

    public function medicina(){
        return $this->belongsToMany('App\Medicina','recipe_has_medicinas','recipe_id','medicina_id');
    }


    public function historia(){


        return $this->belongsTo('App\Historia','historia_id');
    }


    public function farmaceuta(){


        return $this->belongsTo('App\User','farmaceuta_id');
    }


    //SCOPE
    public function ScopeStatus($query){

        return $query->where('status','=','Asignado');
    }
    public function ScopeDespachados($query){

        return $query->where('status','=','Despachado');
    }

    public function scopeId($query, $id){


        return $query->where('cita_id','like','%$id%');

    }

    public function scopeNombre($query, $nombre)
    {
        return $query->where('nombre', 'like', '%'.$nombre.'%');
    }
    public function scopeApellido($query, $apellido)
    {
        return $query->orWhere('apellido', 'like', '%'.$apellido.'%');
    }
    public function scopeCedula($query, $cedula)
    {
        return $query->orWhere('cedula', 'like', '%'.$cedula.'%');
    }
}
