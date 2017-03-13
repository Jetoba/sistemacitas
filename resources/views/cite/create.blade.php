@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar Cita</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/cita') }}">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}


                            {{--Paciente Id usuario--}}
                            <div class="form-group{{ $errors->has('paciente_id') ? ' has-error' : '' }}">
                                <label for="paciente_id" class="col-md-4 control-label">Id Paciente</label>

                                <div class="col-md-6">
                                    <input id="paciente_id" type="text" class="form-control" name="paciente_id" value="{{Auth::user()->id}}" readonly>
                                    @if ($errors->has('paciente_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('paciente_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--Especialidad_ID--}}
                            <div class="form-group{{$errors->has('especialidades') ? 'has-error' : ''}}">
                                <label for="especialidades" class="col-md-4 control-label">Especialidad</label>
                                <div class="col-md-6">
                                    <select name="especialidades" id="especialidades" class="form-control" >
                                        @foreach($especialidades as $especialidad)
                                            <option value="{{$especialidad->id}}">{{$especialidad->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('especialidades'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('especialidades')}}</strong>
                                    @endif
                                </div>
                            </div>
                            {{--obersavaciones_text--}}
                            <div class="form-group{{$errors->has('observaciones') ? 'has-error' : ''}}">
                                <label for="informe" class=" col-md-4 control-label">Motivo</label>
                                <div class="col-md-6">
                                    <textarea name="observaciones" id="observaciones" cols="10" rows="2"
                                              class="form-control">{{$cita->observaciones or  old('observaciones')}}</textarea>

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
@endsection
