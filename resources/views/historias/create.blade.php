@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Agregar Historial </div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{url('/historias')}}">
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

                            <div class="form-group{{ $errors->has('especialidad') ? ' has-error' : '' }}">
                                <label for="especialidad" class="col-md-4 control-label">Especialidad</label>

                                <div class="col-md-6">
                                    <select name="especialidad" id="especialidad" class="form-control" >
                                        <option value="{{$cita->especialidad->id}}" autofocus>{{$cita->especialidad->nombre}}</option>
                                    </select>
                                    @if ($errors->has('especialidad'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('especialidad') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('medico') ? ' has-error' : '' }}">
                                <label for="medico" class="col-md-4 control-label">Medico</label>

                                <div class="col-md-6">
                                    <select name="medico" id="medico" class="form-control" >
                                        <option value="{{$cita->medicox->id}}" autofocus>{{$cita->medicox->nombre." ".$cita->medicox->apellido}}</option>
                                    </select>
                                    @if ($errors->has('medico'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medico') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('informe') ? 'has-error' : ''}}">
                                <label for="informe" class=" col-md-4 control-label">Informe</label>
                                <div class="col-md-6">
                                    <textarea name="informe" id="informe" cols="10" rows="2"
                                              class="form-control"></textarea>

                                    @if($errors->has('informe'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('informe')}}</strong>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                @if(Auth::user()->roles[0]->hasPermissionTo('CrearHistoria') or Auth::user()->can('CrearHistoria'))
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                                    @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
