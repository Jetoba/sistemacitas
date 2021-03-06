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
                            <div class="form-group{{ $errors->has('paciente') ? ' has-error' : '' }}">
                                <label for="paciente" class="col-md-4 control-label">Paciente</label>

                                <div class="col-md-6">
                                    <select name="paciente" id="paciente" class="form-control" >
                                            <option value="{{$cita->paciente->id}}"  autofocus>{{$cita->paciente->nombre." ".$cita->paciente->apellido}}</option>
                                    </select>
                                    @if ($errors->has('paciente'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('paciente') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--MEDICO NOMBRE--}}
                            <div class="form-group{{ $errors->has('medico') ? ' has-error' : '' }}">
                                <label for="medico" class="col-md-4 control-label">Doctor</label>

                                <div class="col-md-6">
                                    <select name="medico" id="medico" class="form-control" >
                                        @foreach($medicos as $medico)
                                            <option value="{{$medico->id}}">{{$medico->nombre." ".$medico->apellido ." (".$medico->especialidad[0]->nombre.")"}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('medico'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medico') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--especialidad--}}
                            <div class="form-group{{ $errors->has('especialidades') ? ' has-error' : '' }}">
                                <label for="especialidades" class="col-md-4 control-label">Especialidad</label>

                                <div class="col-md-6">
                                    <input id="especialidades" type="text" class="form-control" name="nombre"
                                           value="{{ $cita->especialidad->nombre}}" readonly autofocus>
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
                                    <input type="date" name="fecha" id="datepicker" size="12" value="{{ $cita->fecha or old('fecha') }}" />
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
                                   <select name="status" id="status" class="form-control">
                                        <option value="pendiente" @if($cita->status=='pendiente') selected @endif>Pendiente</option>
                                        <option value="Asignada" @if($cita->status=='Asignada') selected @endif>Asignada</option>
                                       <option value="Viendose" @if($cita->status=='Viendose') selected @endif>Viendose</option>
                                        <option value="Vista" @if($cita->status=='Vista') selected @endif>Vista</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if(Auth::user()->roles[0]->hasPermissionTo('EditarCita') or Auth::user()->can('EditarCita'))
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                            @endif
                        </form>
                    </div>


            </div>
        </div>
    </div>
    </div>
    </div>
@endsection