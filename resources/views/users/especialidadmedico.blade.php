@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Asignar Especializacion</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/medico/'.$user->id.'/especializacion') }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label for="nombre" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre"
                                           value="{{ "Dr ".$user->nombre ." ". $user->apellido }}" readonly required
                                           autofocus>

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('especialidades') ? ' has-error' : '' }}">
                                <label for="especialidades" class="col-md-4 control-label">Especialidades</label>

                                <div class="col-md-6">
                                    <?php $checked = ""; ?>
                                    @foreach($especialidades as $especialidad)
                                        @for($i=0;$i < $user->especialidad->count(); $i++)
                                            @if($user->especialidad[$i]->id==$especialidad->id)
                                                <?php $checked = "checked"; ?>
                                                @break;
                                            @else
                                                <?php $checked = ""; ?>
                                                @break;
                                            @endif
                                        @endfor

                                        <label class="checkbox-inline">
                                            <input class="i-check" type="checkbox" id="especialidades"
                                                   name="especialidades[]"
                                                   value="{{$especialidad->id}}" {{ $checked }}>
                                            {{$especialidad->nombre}}
                                        </label><br>
                                    @endforeach
                                    @if ($errors->has('especialidades'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('especialidades') }}</strong>
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