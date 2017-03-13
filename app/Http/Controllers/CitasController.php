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
        $citas = Cita::paginate();
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
        //dd($request->input());
        $v = Validator::make($request->all(), [
            // validacion de campos input
            'paciente_id'=>'required',
            'observaciones'=>'required|max:255',
            'especialidadades'=>'required',
        ]);

        if($v->fails()){

            //return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            Cita::create([
                //db                      campo input
                'paciente_id'=>$request->input('paciente_id'),
                'especialidad_id'=>$request->input('especialidades'),
                'observaciones'=>$request->input('observaciones'),
            ]);

        } catch (\Exception $v) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }

        return redirect('/home')->with('mensaje', 'Cita creada con exito');

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
        $paciente = User::findOrFail($cita->paciente_id);
        $especialidades = Especialidad::all();
        $medicos = User::role('Medico')->get();
        return view('cite.edit', ['cita'=>$cita, 'especialidades'=>$especialidades, 'paciente'=>$paciente, 'medicos'=>$medicos]);
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

        try {
            \DB::beginTransaction();
            $cita = Cita::findOrFail($id);
            $cita->update([
                'fecha' => $request->input('fecha'),
                'medico_id' => $request->input('medico'),
                'status' => ($request->input('status')),
            ]);
        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/cita')->with('mensaje', 'Cita editada Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cita::destroy($id);
        return redirect('/cita')->with('mensaje', 'Cita eliminada satisfactoriamente');
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
