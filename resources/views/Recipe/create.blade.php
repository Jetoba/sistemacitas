@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Recipe</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/recipes') }}">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{url('/recipes')}}">
                                    {{ method_field('POST') }}
                                    {{ csrf_field() }}


                                    <div class="form-group{{ $errors->has('cita_id') ? ' has-error' : '' }}">
                                        <label for="cita_id" class="col-md-4 control-label">Cita No</label>

                                        <div class="col-md-6">
                                            <input id="cita_id" type="text" class="form-control" name="cita_id" value="{{$cita->id}}" readonly>
                                            @if ($errors->has('cita_id'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('cita_id') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{$errors->has('observaciones') ? 'has-error' : ''}}">
                                        <label for="observaciones" class=" col-md-4 control-label">Observaciones</label>
                                        <div class="col-md-6">
                                    <textarea name="observaciones" id="observaciones" cols="10" rows="2"
                                              class="form-control"></textarea>

                                            @if($errors->has('observaciones'))
                                                <span class="help-block"></span>
                                                <strong>{{$errors->first('observaciones')}}</strong>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection