<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\Cita;
use App\Medicina;
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
//      FARMACEUTA
        $recipes = Recipe::status()->paginate(10);
//      CITAS DEL PACIENTE
        $citas= Cita::where('paciente_id', $id)->latest()->paginate(10);
//      CITAS DEL MEDICO
        $cites= Cita::where('medico_id', $id)->where('status','=', 'Vista')->paginate(10);
        return view('home',['citas'=>$citas, 'cites'=>$cites, 'recipes'=>$recipes]);
    }



}
