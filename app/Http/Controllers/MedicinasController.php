<?php

namespace App\Http\Controllers;

use App\Medicina;
use Illuminate\Http\Request;
Use Validator;
use Auth;


class MedicinasController extends Controller
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
        if (!Auth::user()->can('ModuloMedicina'))
            abort(403, 'Permiso Denegado.');

        $users = null;
        $buscar = \Request::get('buscar');
        if($buscar!='')
            $medicinas= Medicina::nombre($buscar)->paginate(10);
        else
            $medicinas = Medicina::paginate(10);
        
        return view('medicinas.index', ['medicinas'=>$medicinas, 'buscar'=>$buscar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('ModuloMedicina'))
            abort(403, 'Permiso Denegado.');

        return view ('medicinas.create');
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

            Medicina::create([
                'nombre' => $request->input('nombre'),

            ]);

        } catch (\Exception $v) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/medicinas')->with('mensaje', 'Medicina Agregada satisfactoriamente');
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
        if (!Auth::user()->can('EditarMedicina'))
            abort(403, 'Permiso Denegado.');

        $medicina = Medicina::findOrFail($id);
        return view('medicinas.edit', ['medicina'=>$medicina]);
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
            $medicina = Medicina::findOrFail($id);
            $medicina->update([
                'nombre' => $request->input('nombre'),
            ]);
        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }

        return redirect('/medicinas')->with('mensaje', 'Medicina actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('EliminarMedicina'))
            abort(403, 'Permiso Denegado.');

        Medicina::destroy($id);
        return redirect('/medicinas')->with('mensaje', 'Medicina eliminada satisfactoriamente');
    }
}
