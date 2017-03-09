@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Usuario</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/users') }}">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label for="nombre" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                <label for="apellido" class="col-md-4 control-label">Apellido</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autofocus>

                                    @if ($errors->has('apellido'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                <label for="apellido" class="col-md-4 control-label">Cedula</label>

                                <div class="col-md-6">
                                    <input id="cedula" type="text" class="form-control" name="cedula" value="{{ old('cedula') }}"  autofocus>

                                    @if ($errors->has('cedula'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="telefono" class="col-md-4 control-label">Telefono</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}"  autofocus>

                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                                <label for="apellido" class="col-md-4 control-label">Celular</label>

                                <div class="col-md-6">
                                    <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}"  autofocus>

                                    @if ($errors->has('celular'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email Acces</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}" required autofocus>

                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 control-label">Role</label>
                                <div class="col-md-6">
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->name}}" >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('especialidad') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 control-label">Especialidad</label>
                                <div class="col-md-6">
                                    <select name="especialidad" id="especialidad" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($especialidades as $especialidad)
                                            <option value="{{$especialidad->nombre}}" >{{$especialidad->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('especialidad'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('especialidad') }}</strong>
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
