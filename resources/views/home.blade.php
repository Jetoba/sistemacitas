@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenidos</div>
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
                                <a href="{{url('cita/create')}}" class="btn btn-success">
                                    <i class="fa "></i> Asignar Recipe</a>
                                <table class="table table-bordered" style="margin-top: 1%;">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Paciente</th>
                                        <th>Estado</th>
                                        <th>Informe</th>
                                    </tr>
                                    @foreach($cites as $cite)
                                        <tr>
                                            <td>{{$cite->fecha}}</td>
                                            <td>{{$cite->hora}}</td>
                                            <td>{{$cite->usuario_id->nombre." ".$cite->usuario_id->apellido}}</td>
                                            <td>{{$cite->status('Asignada')}}</td>
                                            <td>{{$cite->historia_id->informe}}</td>
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
