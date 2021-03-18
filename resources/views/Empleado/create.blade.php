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
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nuevo Empleado</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="POST" action="{{ route('empleado.store') }}"  role="form">
                                {{ csrf_field() }}
                                <div class="row">
                                    <?php
                                    $caracteres = "AB1234567890";
                                    $desordenada = str_shuffle($caracteres);
                                    $CH = substr($desordenada, 1, 4);
                                    ?>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Código de empleado</span>
                                            <input type="text" name="codigo" id="codigo" class="form-control input-sm" value="<?php echo $CH ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Nombre</span>
                                            <input type="text" name="nombre" id="nombre" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Sueldo en dolar</span>
                                            <input type="text" name="sueldo_dolar" id="usd" class="form-control input-sm" placeholder="0,00"
                                                   oninput="camPesos(this.value)" onchange="camPesos(this.value)" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Sueldo en pesos</span>
                                            <input type="text" name="sueldo_pesos" id="mxn" class="form-control input-sm" placeholder="0,00"
                                                   oninput="cambDolar(this.value)" onchange="cambDolar(this.value)" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Correo electrónico</span>
                                            <input type="text" name="correo" id="correo" class="form-control input-sm"
                                                   pattern="[^@\s]+@[^@\s]+" title="Email Inválido">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Dirección</span>
                                            <input type="text" name="direccion" id="direccion" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Ciudad</span>
                                            <input type="text" name="ciudad" id="ciudad" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Estado</span>
                                            <input type="text" name="estado" id="estado" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <span>Telefono</span>
                                            <input type="tel" name="telefono" id="telefono" class="form-control input-sm" pattern="[0-9]{10}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-9 col-sm-9 col-md-9">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input name="activo" value="1" id="activo" type="radio"> Activo
                                                <input checked="checked" name="activo" value="0" id="activo" type="radio"> Inactivo
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <input type="submit"  value="Guardar" class="btn btn-success">
                                        <a href="{{ route('empleado.index') }}" class="btn btn-info">Atrás</a>
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
              var valorM = {!! $valor_actual !!};
              var min = 1.00;
              var max = 1000000.00;

              function cambDolar(valNum) {
                  document.getElementById("usd").value=valNum / valorM;
              }

              function camPesos(valNum) {
                  document.getElementById("mxn").value=valNum * valorM;

                 // if(dolar.value > min && dolar.value < max){
                 //     $('.div').removeClass('has-error has-feedback');
                 // }else{
                  //    $('.div').addClass('has-error has-feedback');
                  //}

              }
          </script>
@endsection