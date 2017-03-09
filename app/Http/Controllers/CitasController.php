<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Especialidad;
use Validator;
use Illuminate\Http\Request;
use Auth;
use App\User;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::status()->paginate();
        return view ('cite.index',['cita' => $citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidad::all();
        return view('cite.create',['especialidades'=>$especialidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            // validacion de campos input
            'usuario_id'=>'required',
            'observaciones'=>'required:255',
            'especialidadades'=>'required',
        ]);

        if($v->fails()){

            return redirect()->back()->withErrors($v)->withInput();
        }
        try {
            \DB::beginTransaction();

            Cita::create([

                //db                      campo input
                'usuario_id'=>$request->input('usuario_id'),
                'especialidad_id'=>$request->input('especialidadades'),
                'observaciones'=>$request->input('observaciones'),

            ]);

        } catch (\Exception $v) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }

        return redirect('/home')->with('mensaje', 'Cita creado con exito');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        return view('cite.edit', ['cita'=>$cita]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function medicosindex(){
        $medicos = User::role('Medico')->paginate(5);
        return view('users.medicos',['medicos'=>$medicos]);

    }

    public function mostrarcitas($id)
    {
        $medico = User::findorFail($id);
        $usuarios= Cita::where('medico', $id)->get();

        return view('citas.citasmedico',['usuarios'=>$usuarios, 'medico'=>$medico]);

    }
    public function miscitas(){

        $id = Auth::user()->id;
        $citas= Cita::where('medico', $id)->where('status','=','Asignada')->get();

        return view('doctores.home',['citas'=>$citas]);

    }
}
