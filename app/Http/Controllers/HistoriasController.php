<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Historia;
use App\User;
use Illuminate\Http\Request;
Use Validator;
use Auth;
Use App\Recipe;
use Illuminate\Support\Facades\DB;

class HistoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cita = Cita::findOrFail($id);
        return view('historias.create', ['cita'=>$cita]);


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
            'informe' => 'required|max:900',

        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }
        try {
                \DB::beginTransaction();
                Historia::create([

                    'cita_id'=> $request->input('cita_id'),
                    'paciente_id' => $request->input('paciente'),
                    'especialidad_id' => $request->input('especialidad'),
                    'medico_id' => $request->input('medico'),
                    'informe' => $request->input('informe'),

                ]);
            } catch (\Exception $e) {
                \DB::rollback();
                var_dump($e);
            } finally {
                \DB::commit();
            }
            return redirect('/home')->with('mensaje', 'Historia creada Exitosamente');
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
        //
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

    public function mostrarhistoria($id)
    {
        $medico =  Auth::user()->id;
        $paciente = User::findorFail($id);
        $historia= Historia::where('paciente_id', $id)->where('medico_id',$medico)->latest()->paginate(1);
        $historiax= Historia::where('paciente_id', $id)->where('medico_id',$medico)->latest()->paginate();

        return view('historias.citaspaciente',['historia'=>$historia,
            'paciente'=>$paciente, 'medico' => $medico, 'historiax'=> $historiax,]);

    }

    public function mostrarhistoriaglobal($id)
    {
        $medico =  Auth::user()->id;
        $paciente = User::findorFail($id);
        $recipe = Recipe::where('historia_id',$id)->latest()->paginate(10);
        $historias= Historia::where('paciente_id', $id)->latest()->paginate(10);

        return view('historias.historiaglobal',['recipe'=>$recipe, 'paciente'=>$paciente, 'medico' => $medico, 'historias'=> $historias,]);

    }




}
