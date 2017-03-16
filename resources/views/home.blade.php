@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('mensaje'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <strong>Info:</strong> {{ session('mensaje') }}.
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sus Citas</div>
                    @if(Auth::user()->roles[0]->hasPermissionTo('ModuloPaciente') or Auth::user()->can('ModuloPaciente'))
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
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                {{ $citas->links()}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(Auth::user()->roles[0]->hasPermissionTo('ModuloMedico') or Auth::user()->can('ModuloMedico'))
                        <div class="panel-body">
                            <div class="row">
                                <div class="panel-body">
                                    <table class="table table-bordered" style="margin-top: 1%;">
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Paciente</th>
                                            <th>Informe</th>
                                            <th colspan="4" width="10%">Acciones</th>
                                        </tr>
                                        @foreach($cites as $cite)
                                            <tr>
                                                <td>{{$cite->fecha}}</td>
                                                <td>{{$cite->paciente->nombre." ".$cite->paciente->apellido}}</td>
                                                <td>{{$cite->observaciones}}</td>
                                                @if(Auth::user()->roles[0]->hasPermissionTo('HistoriaLocal') or Auth::user()->can('HistoriaLocal'))
                                                <td>
                                                    <a href="{{ url('/historia/'.$cite->paciente_id.'/historiapaciente')}}"
                                                       class="btn btn-primary">
                                                       Historia
                                                    </a>
                                                </td>
                                                @endif
                                                @if(Auth::user()->roles[0]->hasPermissionTo('CrearHistoria') or Auth::user()->can('CrearHistoria'))
                                                <td>
                                                    <a href="{{ url('/historia/'.$cite->id.'/create')}}"
                                                       class="btn btn-primary">
                                                        Crear Historia
                                                    </a>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                {{ $cites->links()}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(Auth::user()->roles[0]->hasPermissionTo('ModuloFarmaceuta') or Auth::user()->can('ModuloFarmaceuta'))
                        <div class="panel-body">
                            <div class="row">
                                <div class="panel-body">
                                    @if(Auth::user()->roles[0]->hasPermissionTo('HistorialDespacho') or Auth::user()->can('HistorialDespacho'))
                                    <a href="{{ url('/recipes/all')}}" class="btn btn-success">
                                        <span>Historial De recipes</span>
                                    </a>
                                    @endif
                                    <table class="table table-bordered" style="margin-top: 1%;">
                                        <tr>
                                            <th>Doctor</th>
                                            <th>Paciente</th>
                                            <th colspan="3" width="10%">Acciones</th>
                                        </tr>
                                        @foreach($recipes as $recipe)
                                            <tr>
                                                <td>{{$recipe->historia->medico->nombre." ".$recipe->historia->medico->apellido}}</td>
                                                <td>{{$recipe->historia->paciente->nombre." ".$recipe->historia->paciente->apellido}}</td>
                                                @if(Auth::user()->roles[0]->hasPermissionTo('DespachoMedicina') or Auth::user()->can('DespachoMedicina'))

                                                <td>
                                                    <a href="{{ url('/recipe/'.$recipe->id.'/medicinas')}}"
                                                       class="btn btn-primary">
                                                        H
                                                    </a>
                                                </td>
                                                    @endif
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                {{ $recipes->links()}}
                                            </td>
                                        </tr>
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
