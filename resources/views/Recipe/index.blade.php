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
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicinas despachadas</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="panel-body">
                                <table class="table table-bordered" style="margin-top: 1%;">
                                    <tr>
                                        <th width="10%" >Medicinas</th>
                                        <th>Despachado el</th>
                                        <th>Por</th>
                                        <th> Al Paciente</th>
                                        <th>Cedula</th>
                                    </tr>
                                    @foreach($recipes as $recipe)
                                        <tr>
                                            <td>
                                                <button class="btn btn-danger"
                                                        data-action=""
                                                        data-name="{{$recipe->id}}"
                                                        data-toggle="modal" data-target="#confirm-delete">
                                                    <i class="">Medicinas</i>
                                                </button>
                                            </td>
                                            <td>{{$recipe->updated_at}}</td>
                                            <td>{{$recipe->farmaceuta->nombre." ".$recipe->farmaceuta->apellido}}</td>
                                            <td>{{$recipe->cita->paciente->nombre." ".$recipe->cita->paciente->apellido}}</td>
                                            <td>{{$recipe->cita->paciente->cedula}}</td>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            {{ $recipes->links() }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection