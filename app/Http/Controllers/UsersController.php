<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Especialidad;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;
Use Auth;


class UsersController extends Controller
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
        $users = User::paginate(1);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $especialidades = Especialidad::all();
        return view('users.create', ['roles' => $roles, 'especialidades' => $especialidades]);
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
            'apellido' => 'required|max:255',
            'cedula' => 'required|max:8|unique:users',
            'fechanacimiento' => 'required',
            'edad'=> 'max:255',
            'sexo'=> 'required',
            'telefono' => 'max:255',
            'celular' => 'max:255',
            'direccion'=> 'max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',

        ]);


        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }
        try {
            \DB::beginTransaction();

            $user = User::create([
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'cedula' => $request->input('cedula'),
                'fechanacimiento' => $request->input('fechanacimiento'),
                'edad' => $request->input('edad'),
                'sexo' => $request->input('sexo'),
                'telefono' => $request->input('telefono'),
                'celular' => $request->input('celular'),
                'direccion' => $request->input('direccion'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'especialidad_id' => $request->input('especialidad_id'),


            ]);

            $user->assignRole($request->input('role'));

        } catch (\Exception $v) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/medicos')->with('mensaje', 'Rol creado satisfactoriamente');
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
        $roles = Role::all();
        $user = User::findOrFail($id);
        $especialidades = Especialidad::all();
        return view('users.edit', ['user' => $user,'roles'=>$roles,'especialidades'=>$especialidades ]);
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
        $v = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'cedula' => 'required|max:8|unique:users,cedula' . $id . ',id',
            'fechanacimiento' => 'max:255',
            'edad'=> 'max:255',
            'sexo'=> 'max:255',
            'telefono' => 'max:255',
            'celular' => 'max:255',
            'direccion'=> 'max:255',
            'email' => 'required|email|max:255|unique:users,email' . $id . ',id',
            'role' => 'required',
            'password' => 'min:6|confirmed',
            'especialidad_id' => 'required',

        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $user = User::findOrFail($id);

            $user->update([
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'cedula' => $request->input('cedula'),
                'fechanacimiento' => $request->input('fechanacimiento'),
                'edad' => $request->input('edad'),
                'sexo' => $request->input('sexo'),
                'telefono' => $request->input('telefono'),
                'celular' => $request->input('celular'),
                'direccion' => $request->input('direccion'),
                'email' => $request->input('email'),
                'especialidad_id' => $request->input('especialidad_id'),


            ]);

            if ($request->input('password')) {
                $v = Validator::make($request->all(),
                    [
                        'password' => 'required|min:6|confirmed',
                    ]);

                if ($v->fails()) {
                    return redirect()->back()->withErrors($v)->withInput();
                }
                $user->update([
                    'password' => bcrypt($request->input('password')),
                ]);
            }


            $user ->syncRoles($request->input('role'));

        } catch (\Exception $e) {
            echo $e->getMessage();
            \DB::rollback();
        } finally {
            \DB::commit();
        }

        return redirect('/medicos')->with('mensaje', 'Usuario actualizado satisfactoriamente');
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
        $medicos = User::role('Medico')->paginate();
        return view('users.medicos',['medicos'=>$medicos]);

    }
}
