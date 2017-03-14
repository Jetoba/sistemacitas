@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicinas de Recipe</div>

                    @foreach($recipe->medicina as $medicina )
                    <input id="medicina" type="text" class="form-control"
                           name="medicina" value="{{$medicina->nombre }}" readonly required autofocus>
                    @endforeach

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