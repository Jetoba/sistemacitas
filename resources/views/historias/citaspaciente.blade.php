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

                                <th>Especialidad</th>
                                <th>Medico</th>
                                <th>Informe</th>
                                <th colspan="3" width="10%">Acciones</th>
                            </tr>
                            @foreach($historia as $historia)
                                <tr>
                                    <td>{{ $historia->especialidad->nombre }}</td>
                                    <td>{{ $historia->medico->nombre . " " . $historia->medico->apellido   }}
                                    <td>{{ $historia->informe}}</td>
                                    @if(Auth::user()->roles[0]->hasPermissionTo('CrearRecipe') or Auth::user()->can('CrearRecipe'))
                                    <td>
                                        <a href="{{ url('/recipe/'.$historia->id.'/create')}}"
                                           class="btn btn-warning">
                                            Crear Recipe
                                        </a>
                                    </td>
                                    @endif
                                    @if(Auth::user()->roles[0]->hasPermissionTo('RecipeLocal') or Auth::user()->can('RecipeLocal'))
                                    <td>
                                        <a href="{{ url('/recipe/'.$historia->id.'/recipeshistoria')}}"
                                           class="btn btn-warning">
                                            Recipe
                                        </a>
                                    </td>
                                    @endif
                                        @if(Auth::user()->roles[0]->hasPermissionTo('HistorialGlobal') or Auth::user()->can('HistorialGlobal'))
                                    <td>
                                        <a href="{{ url('/historia/'.$historia->cita->paciente->id.'/historiaglobal')}}"
                                           class="btn btn-primary">
                                            Historia
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection