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
                            @if(Auth::user()->roles[0]->hasPermissionTo('ModuloCitasdeMedico') or Auth::user()->can('ModuloCitasdeMedico'))
                            <i class="fa fa-user"></i> Medicos</a>
                        @endif
                        <table class="table table-bordered" style=" margin-top: 1%;">
                            <tr>
                                <th>Fecha</th>
                                <th>Medico</th>
                                <th>Especilidad</th>
                                <th>Paciente</th>
                                <th>Estado</th>
                                <th colspan="3" width="10%">Acciones</th>
                            </tr>
                            @foreach($citas as $cita)
                                <tr>
                                    <td>{{$cita->fecha}}</td>
                                    <td>{{$cita->medicox->nombre . " " . $cita->medicox->apellido}}</td>
                                    <td>{{$cita->especialidad->nombre}}</td>
                                    <td>{{$cita->paciente->nombre . " ". $cita->paciente->apellido}}</td>
                                    <td>{{$cita->status}}</td>
                                    @if(Auth::user()->roles[0]->hasPermissionTo('EditarCita') or Auth::user()->can('EditarCita'))
                                    <td>

                                        <a href="{{url('/cita/'.$cita->id.'/edit')}}" class="btn btn-primary">
                                           Asignar
                                        </a>
                                    </td>
                                    @endif
                                    @if(Auth::user()->roles[0]->hasPermissionTo('EliminarCita') or Auth::user()->can('EliminarCita'))
                                    <td>
                                        <button class="btn btn-danger"
                                               data-action="{{ url('/cita/'.$cita->id) }}"
                                                data-name="{{" Paciente ". $cita->paciente->nombre ." " . $cita->paciente->apellido ." Doctor " . $cita->medicox->nombre }}"
                                                data-toggle="modal" data-target="#confirm-delete">
                                            <i class="fa fa-trash fa-1x"></i>
                                        </button>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" class="text-center">
                                    {{ $citas->links() }}
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
