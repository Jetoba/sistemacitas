@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Asignar Medicinas</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/recipe/'.$recipe->id.'/asignarmedicina') }}">

                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('recipe') ? ' has-error' : '' }}">
                                <label for="recipe" class="col-md-4 control-label">Recipe</label>

                                <div class="col-md-6">
                                    <input type="text" name="name"  type="text" id="name" class="form-control"
                                           value="{{$recipe->id }}" autofocus readonly>


                                    @if ($errors->has('permisos'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('recipe') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('paciente') ? ' has-error' : '' }}">
                                <label for="paciente" class="col-md-4 control-label">Paciente</label>

                                <div class="col-md-6">
                                    <input type="text" name="paciente"  type="text" id="paciente" class="form-control"
                                           value="{{$recipe->historia->paciente->nombre . " " . $recipe->historia->paciente->apellido }}" autofocus readonly >


                                    @if ($errors->has('paciente'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('paciente') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('medicinas') ? ' has-error' : '' }}">
                                <label for="medicinas" class="col-md-4 control-label">Medicinas</label>

                                <div class="col-md-6">

                                    @foreach($medicinas as $medicina)
                                    <label class="checkbox-inline">
                                        <input class="i-check" type="checkbox" id="medicinas"
                                               name="medicinas[]"
                                               value="{{$medicina->id}}">
                                        {{$medicina->nombre}}
                                    </label><br>
                                    @endforeach

                                    @if ($errors->has('medicinas'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medicinas') }}</strong>
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