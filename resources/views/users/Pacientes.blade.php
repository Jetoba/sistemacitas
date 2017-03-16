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
                    <div class="panel-heading"> Listado de Pacientes</div>
                    <div class="panel-body">
                    <div class="col-lg-6">
                        <form action="{{ url('/Pacientes') }}" method="get">
                            <div class="input-group">

                                <input type="text" name="buscar" id="buscar" class="form-control"
                                       placeholder="Inserte nombre, apellido o cedula ..."
                                       value="">
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Edad</th>
                                <th width="5%" colspan="3"></th>
                            </tr>
                            @foreach($pacientes as $paciente)
                                <tr>
                                    <td>{{ $paciente->nombre }}</td>
                                    <td>{{ $paciente->apellido }}</td>
                                    <td>{{ $paciente->cedula }}</td>
                                    <td>{{ $paciente->edad }}
                                    @if(Auth::user()->roles[0]->hasPermissionTo('PacientesHistoria') or Auth::user()->can('PacientesHistoria'))
                                    <td>
                                        <a href="{{ url('/historia/'.$paciente->id.'/historiaglobal')}}" class="btn btn-primary">
                                            Historial
                                        </a>
                                    </td>
                                        @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" class="text-center">
                                    {{$pacientes->appends(['buscar'=>$buscar])->links() }}
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection