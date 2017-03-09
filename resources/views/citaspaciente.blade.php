@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="panel-body">

                                @if(Auth::user()->roles[0]->hasPermissionTo('CitasSecretaria') or Auth::user()->can('CitasSecretaria'))

                                @endif

                                <a href="{{url('cita/create')}}" class="btn btn-success">
                                    <i class="fa fa-user"></i> Nueva Cita</a>

                                <table class="table table-bordered" style="margin-top: 1%;">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Medico</th>
                                        <th>Especilidad</th>
                                        <th>Paciente</th>
                                        <th>Estado</th>

                                    </tr>

                                    @foreach($citas as $cita)
                                        <tr>
                                            <td>{{$cita->fecha}}</td>
                                            <td>{{$cita->user->nombre." ".$cita->user->apellido}}</td>
                                            <td>{{$cita->especial->descripcion}}</td>
                                            <td>{{$cita->doctor->nombre." ".$cita->doctor->apellido}}</td>
                                        </tr>
                                    @endforeach
                                    {{-- <th colspan="4" class="text-center">{{$citas->links()}}</th>--}}
                                </table>


                            </div>
                            @foreach ($citas as $cita)
                                <div class="col-md-4">
                                    <div class="thumbnail">
                                        <div>
                                            <h3>Fecha: {{ $cita->fecha }}</h3>
                                            <h4>Doctor: {{ $cita->medico_id->nombre." ".$cita->medico_id->apellido}}</h4>
                                            <p>Especialidad: {{ $cita->especialidad_id->descripcion }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
