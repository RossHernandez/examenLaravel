@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8">

                                    <h3 class="panel-title">Datos de empleado</h3>

                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                  <p style="background:#D5E6FA;text-align:center">Código de empleado: {{$empleado->codigo}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Nombre: {{$empleado->nombre}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Correo electrónico: {{$empleado->correo}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Sueldo en dolar: {{$empleado->sueldo_dolar}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Sueldo en pesos {{$empleado->sueldo_pesos}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Dirección: {{$empleado->direccion}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Estado: {{$empleado->estado}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Ciudad: {{$empleado->ciudad}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Telefono: {{$empleado->telefono}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Registro: @if($empleado->activo == 1) Activo @else Inactivo @endif</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                <p class="panel-title" style="color: black;background: #a0e9b0">Proyección salarial</p> <br>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <p style="background:#f2dede;text-align:center">1er Mes</p>
                                            <label type="text" name="sueldo_dolar" id="usd">Sueldo en dolar: {{$empleado->porcentajeDolar[1]}}</label> <br>
                                            <label type="text" name="sueldo_pesos" id="mxn">Sueldo en pesos: {{$empleado->porcentajePesos[1]}}</label>
                                        </div>
                                    </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <p style="background:#f2dede;text-align:center">2do Mes</p>
                                        <label type="text" name="sueldo_dolar" id="usd">Sueldo en dolar: {{$empleado->porcentajeDolar[2]}}</label> <br>
                                        <label type="text" name="sueldo_pesos" id="mxn">Sueldo en pesos: {{$empleado->porcentajePesos[2]}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <p style="background:#f2dede;text-align:center">3er Mes</p>
                                        <label type="text" name="sueldo_dolar" id="usd">Sueldo en dolar: {{$empleado->porcentajeDolar[3]}}</label> <br>
                                        <label type="text" name="sueldo_pesos" id="mxn">Sueldo en pesos: {{$empleado->porcentajePesos[3]}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <p style="background:#f2dede;text-align:center">4to Mes</p>
                                        <label type="text" name="sueldo_dolar" id="usd">Sueldo en dolar: {{$empleado->porcentajeDolar[4]}}</label> <br>
                                        <label type="text" name="sueldo_pesos" id="mxn">Sueldo en pesos: {{$empleado->porcentajePesos[4]}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <p style="background:#f2dede;text-align:center">5to Mes</p>
                                        <label type="text" name="sueldo_dolar" id="usd">Sueldo en dolar: {{$empleado->porcentajeDolar[5]}}</label> <br>
                                        <label type="text" name="sueldo_pesos" id="mxn">Sueldo en pesos: {{$empleado->porcentajePesos[5]}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <p style="background:#f2dede;text-align:center">6to Mes</p>
                                        <label type="text" name="sueldo_dolar" id="usd">Sueldo en dolar: {{$empleado->porcentajeDolar[6]}}</label> <br>
                                        <label type="text" name="sueldo_pesos" id="mxn">Sueldo en pesos: {{$empleado->porcentajePesos[6]}}</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-10 col-sm-10 col-md-10"></div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <a href="{{ route('empleado.index') }}" class="btn btn-info" >Atrás</a>
                                </div>

                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
            <script type="text/javascript">
            //    let porcentaje = document.getElementById('porcentaje').value;
            </script>
@endsection
