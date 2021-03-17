@extends('layouts.app')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Editar empleado</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="POST" action="{{ route('empleado.update', $empleado->id) }}" role="form">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Código</span>
                                            <input type="text" name="codigo" id="codigo" class="form-control input-sm" value="{{$empleado->codigo}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Nombre</span>
                                            <input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$empleado->nombre}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Sueldo en dolar</span>
                                            <input type="text" name="sueldo_dolar" id="usd" class="form-control input-sm" placeholder="0,00" value="{{$empleado->sueldo_dolar}}"
                                                   oninput="dolaresVes(this.value)" onchange="dolaresVes(this.value)" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Sueldo en pesos</span>
                                            <input type="text" name="sueldo_pesos" id="mxn" class="form-control input-sm" placeholder="0,00"
                                                   value="{{$empleado->sueldo_pesos}}" oninput="vesDolares(this.value)" onchange="vesDolares(this.value)" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Correo electrónico</span>
                                            <input type="text" name="correo" id="correo" class="form-control input-sm" value="{{$empleado->correo}}"
                                                   pattern="[^@\s]+@[^@\s]+" title="Email Inválido">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Dirección</span>
                                            <input type="text" name="direccion" id="direccion" class="form-control input-sm" value="{{$empleado->direccion}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Ciudad</span>
                                            <input type="text" name="ciudad" id="ciudad" class="form-control input-sm" value="{{$empleado->ciudad}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Estado</span>
                                            <input type="text" name="estado" id="estado" class="form-control input-sm" value="{{$empleado->estado}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Telefono</span>
                                            <input type="text" name="telefono" id="telefono" class="form-control input-sm" value="{{$empleado->telefono}}">
                                        </div>
                                    </div>
                                    <!--
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="activo" id="activo" class="form-control input-sm" value="{{$empleado->activo}}">
                                            <input checked="{{$empleado->activo}}" name="activo" value="1" id="activo" type="radio"> Activo
                                            <input checked="{{$empleado->activo}}" name="activo" value="0" id="activo" type="radio"> Inactivo
                                        </div>
                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-xs-9 col-sm-9 col-md-9"></div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <input type="submit"  value="Actualizar" class="btn btn-success">
                                        <a href="{{ route('empleado.index') }}" class="btn btn-info" >Atrás</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
@endsection
        @section('js')
            <script type="text/javascript">
                var dolar = document.getElementById("usd");
                var tasa = {!! $valor_actual !!};
                var min = 100.00;
                var max = 100000.00;

                function vesDolares(valNum) {
                    document.getElementById("usd").value=valNum / tasa;
                }

                function dolaresVes(valNum) {
                    document.getElementById("mxn").value=valNum * tasa;

                    if(dolar.value > min && dolar.value < max){
                        $('.div').removeClass('has-error has-feedback');
                    }else{
                        $('.div').addClass('has-error has-feedback');
                    }

                }
            </script>
@endsection