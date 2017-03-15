@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="panel-heading">Medicinas de Recipe</div>
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/recipe/'.$recipe->id)}}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            {{--farmaceuta--}}
                            <div class="form-group{{ $errors->has('farmaceuta') ? ' has-error' : '' }}">
                                <label for="farmaceuta" class="col-md-4 control-label">Farmaceuta</label>

                                <div class="col-md-6">
                                    <select name="farmaceuta" id="farmaceuta" class="form-control" >
                                        <option value="{{$farmaceuta->id}}">{{$farmaceuta->nombre ." ". $farmaceuta->apellido}}</option>
                                    </select>
                                    @if ($errors->has('farmaceuta'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('farmaceuta') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @foreach($recipe->medicina as $medicina )

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input id="medicinas" type="text" class="form-control" name="medicinas" value="{{$medicina->nombre}}" readonly>
                                </div>
                            </div>
                            @endforeach

                            {{--ESTADO--}}
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">Estado</label>

                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-control" >
                                        <option value="Asignado">Asignado</option>
                                        <option value="Despachado">Despachado</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
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
@endsection