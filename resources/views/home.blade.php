@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sus Citas</div>
                @if(Auth::user()->roles[0]->hasPermissionTo('IndexPaciente') or Auth::user()->can('IndexPaciente'))

                <div class="panel-body">
                    <div class="row">
                        <div class="panel-body">
                            <a href="{{url('cita/create')}}" class="btn btn-success">
                                <i class="fa fa-user"></i> Nueva Cita</a>
                            <table class="table table-bordered" style="margin-top: 1%;">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Medico</th>
                                    <th>Especilidad</th>
                                    <th>Estado</th>
                                </tr>
                                @foreach($citas as $cita)
                                    <tr>
                                        <td>{{$cita->fecha}}</td>
                                        <td>{{$cita->medicox->nombre . " ". $cita->medicox->apellido}}</td>
                                        <td>{{$cita->especialidad->nombre}}</td>
                                        <td>{{$cita->status}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::user()->roles[0]->hasPermissionTo('IndexMedico') or Auth::user()->can('IndexMedico'))

                    <div class="panel-body">
                        <div class="row">
                            <div class="panel-body">
                                <table class="table table-bordered" style="margin-top: 1%;">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Paciente</th>
                                        <th>Estado</th>
                                        <th>Informe</th>
                                        <th colspan="3" width="10%">Acciones</th>

                                    </tr>
                                    @foreach($cites as $cite)
                                        <tr>
                                            <td>{{$cite->fecha}}</td>
                                            <td>{{$cite->paciente->nombre." ".$cite->paciente->apellido}}</td>
                                            <td>{{$cite->status}}</td>
                                            <td>{{$cite->observaciones}}</td>
                                            <td>
                                                <a href="{{ url('/historia/'.$cite->paciente->id.'/historiapaciente')}}" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('/recipe/'.$cite->id.'/create')}}" class="btn btn-primary">
                                                   crear
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-warning">
                                                    <i class="fa fa-id-card"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                @if(Auth::user()->roles[0]->hasPermissionTo('IndexFarmaceuta') or Auth::user()->can('IndexFarmaceuta'))

                    <div class="panel-body">
                        <div class="row">
                            <div class="panel-body">

                                <table class="table table-bordered" style="margin-top: 1%;">
                                    <tr>
                                        <th>Doctor</th>
                                        <th>Paciente</th>
                                        <th>Medicina 1</th>
                                        <th>Medicina 2</th>
                                        <th>Medicina 3</th>
                                        <th colspan="3" width="10%">Acciones</th>
                                    </tr>
                                    @foreach($recipes as $recipe)
                                        <tr>
                                            <td>{{$recipe->medico_id->nombre." ".$recipe->medico_id->apellido}}</td>
                                            <td>{{$recipe->usuario_id->nombre." ".$recipe->usuario_id->apellido}}</td>
                                            <td>{{$recipe->medicina_1}}</td>
                                            <td>{{$recipe->medicina_2}}</td>
                                            <td>{{$recipe->medicina_3}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
