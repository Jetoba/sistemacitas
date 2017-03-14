<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicina extends Model
{
    protected $table = 'medicinas';
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    public function recipe(){
        return $this->belongsToMany('App\Recipe','recipe_has_medicinas','medicina_id','recipe_id');
    }

}
