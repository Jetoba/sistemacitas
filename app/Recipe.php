<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipe';

    protected $fillable = [

        'medicina_1', 'medicina_2', 'medicina_3', 'paciente_id',
        'medico_id', 'status', 'observaciones',
       ];

    protected function user(){


        return $this->belongsTo('App\User', 'paciente_id');
    }
    public function medico(){


        return $this->belongsTo('App\User','medico_id');
    }
    public function historia(){


        return $this->belongsTo('App\Historia','recipe_id');
    }


}
