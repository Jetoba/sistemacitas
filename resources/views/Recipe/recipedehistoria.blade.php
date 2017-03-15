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
                    @foreach($recipes as $recipe)
                    <div class="panel-heading">
                        <span>
                            {{"Recipe e indicaciones del Historial emitido el ".$recipe->updated_at}}
                        </span>

                        <div class="panel-body">
                            <table class="table table-bordered">


                                    <tr>
                                        <th>Medicinas</th>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            @foreach($recipe->medicina as $medicina )
                                                {{$medicina->nombre .", "}}
                                            @endforeach
                                        </td>
                                    </tr>

                                        <td><strong>Indicaciones</strong></td>
                                    </tr>
                                    <tr>
                                        <td>{{$recipe->observaciones}}</td>
                                    <tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection