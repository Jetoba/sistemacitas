<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\Cita;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $recipes = Recipe::status('Pendiente');
        $citas= Cita::where('usuario_id', $id)->get();
        $cites= Cita::where('medico_id', $id)->get();
        return view('home',['citas'=>$citas, 'cites'=>$cites, 'recipes'=>$recipes]);
    }

}
