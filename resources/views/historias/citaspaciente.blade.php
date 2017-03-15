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
                    <div class="panel-heading">
                        <span>
                            Historial medico del paciente
                        </span>
                        <strong>{{$paciente->nombre." ".$paciente->apellido}}</strong></div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Especialidad</th>
                                <th>Medico</th>
                                <th>Informe</th>
                                <th colspan="3" width="10%">Acciones</th>
                            </tr>
                            @foreach($historia as $historia)
                                <tr>
                                    <td>{{ $historia->created_at }}</td>
                                    <td>{{ $historia->especialidad->nombre }}</td>
                                    <td>{{ $historia->medico->nombre . " " . $historia->medico->apellido   }}
                                    <td>{{ $historia->informe}}</td>
                                    <td>
                                        <a href="{{ url('/recipe/'.$historia->id.'/create')}}"
                                           class="btn btn-warning">
                                            CR
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/recipe/'.$historia->id.'/recipeshistoria')}}"
                                           class="btn btn-warning">
                                            HR
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/historia/'.$historia->cita->paciente->id.'/historiaglobal')}}"
                                           class="btn btn-primary">
                                            H
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection