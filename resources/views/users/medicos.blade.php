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
                    <div class="panel-heading"> Listado de Medicos</div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Especialidad</th>
                                <th width="5%" colspan="3"></th>
                            </tr>
                            @foreach($medicos as $medico)
                                <tr>
                                    <td>{{ $medico->nombre }}</td>
                                    <td>{{ $medico->apellido }}</td>
                                    <td>{{ $medico->cedula }}</td>
                                    <td>{{ @$medico->especialidad[0]->nombre}}</td>
                                    @if(Auth::user()->roles[0]->hasPermissionTo('VerCitasDeMedico') or Auth::user()->can('VerCitasDeMedico'))
                                    <td>
                                        <a href="{{url('/cita/'.$medico->id.'/citamedico')}}" class="btn btn-primary">
                                            Citas
                                        </a>
                                    </td>
                                    @endif
                                    @if(Auth::user()->roles[0]->hasPermissionTo('EspecialidadMedico') or Auth::user()->can('EspecialidadMedico'))
                                    <td>
                                        <a href="{{ url('medico/'.$medico->id.'/asignar') }}" class="btn btn-warning">
                                            Especialidad
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" class="text-center">
                                    {{ $medicos->links() }}
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
    <div class="modal fade" id="confirm-delete" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <p>¿Seguro que desea eliminar este
                        registro?</p>
                    <p class="nombre"></p>
                </div>
                <div class="modal-footer">
                    <form class="form-inline form-delete"
                          role="form"
                          method="POST"
                          action="">
                        {!! method_field('DELETE') !!}
                        {!! csrf_field() !!}
                        <button type="button"
                                class="btn btn-default"
                                data-dismiss="modal">Cancelar
                        </button>

                        <button id="delete-btn"
                                class="btn btn-danger"
                                title="Eliminar">Eliminar
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
