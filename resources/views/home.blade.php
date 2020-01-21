@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">BIENVENIDO</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Si desea consultar infracciones ingrese el número de Licencia o placa del vehículo
                </div>
                <div class="form-group">
                    <div class="form-group col-md-6">
                        <select  class="form-control form-control-sm" name="enterprise_id" id="enterprise_id">
                                <option value="PLACA">NÚMERO DE LICENCIA</option>           
                                <option value="PLACA">NÚMERO DE PLACA</option>              
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="route_destination" class="form-control form-control-sm" id="inputZip" value="{{ old('route_destination') }}" > 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
