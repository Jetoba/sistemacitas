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
                    <div class="panel-heading">Permisos</div>
                    <div class="panel-body">

                        Listado de Permisos
                        @if(Auth::user()->roles[0]->hasPermissionTo('CrearEspecialidad') or Auth::user()->can('CrearEspecialidad'))
                        <a href="{{ url('/permisos/create') }}" class="btn btn-success">
                            <i class="fa fa-user"></i> Permiso Nuevo
                        </a>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th width="10%" colspan="2">Acciones</th>
                            </tr>
                            @foreach($permisos as $permiso)
                                <tr>
                                    <td>{{ $permiso->name }}</td>
                                    @if(Auth::user()->roles[0]->hasPermissionTo('EditarPermiso') or Auth::user()->can('EditarPermiso'))
                                    <td>
                                        <a href="{{ url('/permisos/'.$permiso->id.'/edit') }}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    @endif
                                        @if(Auth::user()->roles[0]->hasPermissionTo('EliminarPermiso') or Auth::user()->can('EliminarPermiso'))
                                    <td>
                                        <button class="btn btn-danger"
                                                data-action="{{ url('/permisos/'.$permiso->id) }}"
                                                data-name="{{ $permiso->name}}"
                                                data-toggle="modal" data-target="#confirm-delete">
                                            <i class="fa fa-trash fa-1x"></i>
                                        </button>
                                    </td>
                                            @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-center">
                                    {{ $permisos->links() }}
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
