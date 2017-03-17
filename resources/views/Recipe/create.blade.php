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
                            <div class="form-group{{ $errors->has('cita_id') ? ' has-error' : '' }}">
                                <label for="historia_id" class="col-md-4 control-label">Historia No</label>

                                <div class="col-md-6">
                                    <input id="historia_id" type="text" class="form-control" name="historia_id"
                                           value="{{$historia->id}}" readonly>
                                    @if ($errors->has('historia_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('historia_id') }}</strong>
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
                                @if(Auth::user()->roles[0]->hasPermissionTo('CrearRecipe') or Auth::user()->can('CrearRecipe'))
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
    </div>
@endsection