@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Cita</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/cita/'.$cita->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            {{--NOMBRE PACIENTE--}}
                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label for="nombre" class="col-md-4 control-label">Paciente</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre"
                                           value="{{ $cita->usuario_id->nombre or old('nombre') }}" readonly autofocus>

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--MEDICO NOMBRE--}}
                            <div class="form-group{{ $errors->has('medico_id') ? ' has-error' : '' }}">
                                <label for="medico_io" class="col-md-4 control-label">Doctor</label>

                                <div class="col-md-6">
                                    <select name="paciente" id="paciente" class="form-control" >
                                        @foreach($medicos as $medico)
                                            <option value="{{$medico->id}}" @if($medico->id == $cita->medico_id)selected @endif>{{$medico->nombre." ".$medico->apellido}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('medico_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medico_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--especialidad--}}
                            <div class="form-group{{ $errors->has('especialidades') ? ' has-error' : '' }}">
                                <label for="especialidades" class="col-md-4 control-label">Especialidad</label>

                                <div class="col-md-6">
                                    <input id="especialidades" type="text" class="form-control" name="nombre"
                                           value="{{ $cita->especialidad_id->nombre or old('especialidades') }}" readonly autofocus>
                                    @if ($errors->has('especialidades'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('especialidades') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--fecha--}}
                            <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                <label for="fecha" class="col-md-4 control-label">Fecha</label>

                                <div class="col-md-6">
                                    <input id="fecha" type="text" class="form-control" name="fecha"
                                           value="{{ $cita->fecha or old('fecha') }}" readonly autofocus>
                                    @if ($errors->has('fecha'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--hora--}}
                            <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                <label for="fecha" class="col-md-4 control-label">Hora</label>

                                <div class="col-md-6">
                                    <input id="fecha" type="text" class="form-control" name="fecha"
                                           value="{{ $cita->fecha or old('fecha') }}" readonly autofocus>
                                    @if ($errors->has('fecha'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--status--}}
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">Estado</label>

                                <div class="col-md-6">
                                    <select <select name="status" id="status" class="form-control" >
                                        <option value="pendiente">pendiente</option>
                                        <option value="Asignada">Asignada</option>
                                        <option value="vista">Vista</option>
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
    </div>
@endsection