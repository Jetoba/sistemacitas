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

        if (!Auth::user()->can('ModuloUsuarios'))
            abort(403, 'Permiso Denegado.');

        $users = null;
        $buscar = \Request::get('buscar');
        if($buscar!='')
            $users= User::nombre($buscar)
                ->apellido($buscar)
                ->cedula($buscar)
                ->paginate(10);
        else
            $users = User::latest()->paginate(10);
            $roles = Role::all();
        return view('users.index', ['users' =>$users, 'buscar'=>$buscar, 'roles' => $roles]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Auth::user()->can('AgregarUsuarios'))
            abort(403, 'Permiso Denegado.');

        $roles = Role::all();
        $especialidades = Especialidad::all();
        return view('users.create', ['roles' => $roles, 'especialidades' => $especialidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'cedula' => 'required|max:8|unique:users',
            'fechanacimiento' => 'required|date',
            'edad' => 'required',
            'sexo' => 'required',
            'telefono' => 'required|max:255',
            'direccion' => 'required|max:255',
            'celular' => 'required|max:255',
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


            ]);

            $user->assignRole($request->input('role'));

        } catch (\Exception $v) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/home')->with('mensaje', 'Usuario creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (!Auth::user()->can('EditarUsuarios'))
            abort(403, 'Permiso Denegado.');
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


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


            $user->syncRoles($request->input('role'));

        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }

        return redirect('/usuarios')->with('mensaje', 'Usuario creado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Auth::user()->can('EliminarUsuarios'))
            abort(403, 'Permiso Denegado.');

        User::destroy($id);
        return redirect('/home')->with('mensaje', 'Usuario eliminado satisfactoriamente');
    }


    public function medicosindex()
    {
        if (!Auth::user()->can('ModuloCitasdeMedico'))
            abort(403, 'Permiso Denegado.');

        $medicos = User::role('Medico')->latest()->paginate(10);
        return view('users.medicos', ['medicos' => $medicos]);
    }

    public function asignar($id)
    {
         if (!Auth::user()->can('EspecialidadMedico'))
            abort(403, 'Permiso Denegado.');

        $user = User::findOrFail($id);
        $especialidades = Especialidad::all();
        return view('users.especialidadmedico', ['user' => $user, 'especialidades' => $especialidades]);
    }

    public function asignarespecializacion(Request $request, $id)
    {
        if (!Auth::user()->can('EspecialidadMedico'))
            abort(403, 'Permiso Denegado.');

        $user = User::findOrFail($id);
        $user->especialidad()->sync($request->input('especialidades'));
        return redirect('/medicos')->with('mensaje', 'Especializacion Asignada Satisfactoriamente');
    }

    public function mostrarcitas($id)
    {
        if (!Auth::user()->can('VerCitasDeMedico'))
            abort(403, 'Permiso Denegado.');

        $medico = User::findorFail($id);
        $usuario = Cita::where('medico', $id)->get();

        return view('citas.medicocitas', ['usuario' => $usuario, 'medico' => $medico]);

    }

    public function permisos($id)
    {
        if (!Auth::user()->can('PermisosUsuarios'))
            abort(403, 'Permiso Denegado.');

        $user = User::findOrFail($id);
        $permisos = Permission::all();
        return view('users.permisos', ['user' => $user, 'permisos' => $permisos]);
    }

    public function asignarPermisos(Request $request, $id)
    {
        if (!Auth::user()->can('PermisosUsuarios'))
            abort(403, 'Permiso Denegado.');

        $user = User::findOrFail($id);
        $user->revokePermissionTo(Permission::all());
        if ($request->input('permisos'))
            $user->givePermissionTo($request->input('permisos'));
        return redirect('/usuarios')->with('mensaje', 'Permisos Asignados Satisfactoriamente');
    }

    public function pacientesindex()
    {
        if (!Auth::user()->can('ModuloPacientes'))
            abort(403, 'Permiso Denegado.');

        $pacientes = null;
        $buscar = \Request::get('buscar');
        if ($buscar != '')
            $pacientes = User::role('Paciente')
                ->nombre($buscar)
                ->apellido($buscar)
                ->cedula($buscar)
                ->paginate();
        else

            $pacientes = User::role('Paciente')->latest()->paginate(10);
        return view('users.Pacientes', ['pacientes' => $pacientes, 'buscar' => $buscar]);
    }




}
