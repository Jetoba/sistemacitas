<?php

namespace App\Http\Controllers;

use App\Especialidad;
use Illuminate\Http\Request;
use Auth;
use Validator;


class EspecialidadesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasPermissionTo('ModuloEspecialidades'))
            abort(403);

        $especialidades = Especialidad::paginate(10);
        return view('especialidades.index', ['especialidades'=>$especialidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('CrearEspecialidad'))
            abort(403);

        return view ('especialidades.create');
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
            'nombre' => 'required|max:255',

        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }
        try {
            \DB::beginTransaction();

            Especialidad::create([
                'nombre' => $request->input('nombre'),

            ]);

        } catch (\Exception $v) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/especialidades')->with('mensaje', 'Especialidad Agregada satisfactoriamente');
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
        if (!Auth::user()->hasPermissionTo('EditarEspecialidades'))
            abort(403);

        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.edit', ['especialidad'=>$especialidad]);
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
        $v =Validator::make($request->all(),[
            'nombre' => 'required|max:255',
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();
            $especialidad = Especialidad::findOrFail($id);
            $especialidad->update([
                'nombre' => $request->input('nombre'),
            ]);
        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }

        return redirect('/especialidades')->with('mensaje', 'Especialidad actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Auth::user()->hasPermissionTo('EliminarEspecialidades'))
            abort(403);

        Especialidad::destroy($id);
        return redirect('/especialidades')->with('mensaje', 'Especialidad eliminada satisfactoriamente');
    }


}