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
                            Recipes de la Cita
                        </span>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th>Estado</th>
                                <th width="10%" colspan="2">Acciones</th>

                            </tr>


                            @foreach($recipes as $recipe)
                                <tr>
                                    <td>{{$recipe->created_at}}</td>
                                    <td>{{$recipe->cita->medicox->nombre." ".$recipe->cita->medicox->apellido}}</td>
                                    <td>{{$recipe->cita->paciente->nombre." ".$recipe->cita->paciente->apellido}}</td>
                                    <td>{{$recipe->status}}</td>
                                    <td>
                                        <a href= "{{ url('/recipe/'.$recipe->id.'/asignar')}}" class="btn btn-primary">
                                            Medicinas
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            {{-- <th colspan="4" class="text-center">{{$usuarios->links()}}</th>--}}
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection