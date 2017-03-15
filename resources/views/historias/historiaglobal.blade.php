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
                                <th width="20%">Fecha</th>
                                <th>Especialidad</th>
                                <th>Medico</th>
                                <th>Informe</th>
                                <th width="10%">Recipe</th>



                            </tr>
                            @foreach($historias as $historia)
                                <tr>
                                    <td>{{ $historia->created_at }}</td>
                                    <td>{{ $historia->especialidad->nombre }}</td>
                                    <td>{{ $historia->medico->nombre . " " . $historia->medico->apellido}}</td>
                                    <td>{{ $historia->informe}}</td>
                                    <td>
                                        <a href= "{{ url('/historia/'.$historia->id.'/recipedehistorial')}}" class="btn btn-primary">
                                            Recipe
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" class="text-center">
                                    {{$historias->links() }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection