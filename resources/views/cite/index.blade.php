@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('mensaje'))
            <div class="row">
                <div class="col md-12">
                    <div class="alert alert-info alert-dismissible" role="info">
                        <button type="button" class="close" data-dismiss="info" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Aviso:</strong> {{session ('mensaje')}}.
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" >Listado de Citas</div>
                    <div class="panel-body">
                        <a href="{{url('/medicos')}}" class="btn btn-success">
                            <i class="fa fa-user"></i> Medico y sus citas</a>
                        <table class="table table-bordered" style="margin-top: 1%;">
                            <tr>
                                <th>Fecha</th>
                                <th>Medico</th>
                                <th>Especilidad</th>
                                <th>Paciente</th>
                                <th>Estado</th>
                                <th colspan="3" width="10%">Acciones</th>
                            </tr>
                            @foreach($cita as $cita)
                                <tr>
                                    <td>{{$cita->fecha}}</td>
                                    <td>{{$cita->medicox->nombre}}</td>
                                    <td>{{$cita->especialidad->nombre}}</td>
                                    <td>{{$cita->paciente->nombre}}</td>
                                    <td>{{$cita->status}}</td>
                                    <td>
                                        <a href="{{url('/cita/'.$cita->id.'/edit')}}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <th colspan="4" class="text-center">{{$citas->links()}}</th>--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
