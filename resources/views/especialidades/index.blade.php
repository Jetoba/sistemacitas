@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('mensaje'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Info:</strong> {{ session('mensaje') }}.
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"Especialidades</div>

                    <div class="panel-body">
                        Listado de Especialidades
                        @if(Auth::user()->roles[0]->hasPermissionTo('ModuloEspecialidades') or Auth::user()->can('ModuloEspecialidades'))
                        <a href="{{ url('/especialidades/create') }}" class="btn btn-success">
                            <i class="fa fa-user"></i> Agregar Especialidad
                        </a>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th width="10%" colspan="2">Acciones</th>
                            </tr>
                            @foreach($especialidades as $especialidad)
                                <tr>
                                    <td>{{ $especialidad->nombre }}</td>
                                    @if(Auth::user()->roles[0]->hasPermissionTo('EditarEspecialidades') or Auth::user()->can('EditarEspecialidades'))
                                    <td>
                                        <a href="{{ url('especialidades/'.$especialidad->id.'/edit') }}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    @endif
                                    @if(Auth::user()->roles[0]->hasPermissionTo('EliminarEspecialidades') or Auth::user()->can('EliminarEspecialidades'))
                                    <td>
                                        <button class="btn btn-danger"
                                                data-action="{{ url('/especialidades/'.$especialidad->id) }}"
                                                data-name="{{ $especialidad->nombre }}"
                                                data-toggle="modal" data-target="#confirm-delete">
                                            <i class="fa fa-trash fa-1x"></i>
                                        </button>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6" class="text-center">
                                    {{ $especialidades->links() }}
                                </td>
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
