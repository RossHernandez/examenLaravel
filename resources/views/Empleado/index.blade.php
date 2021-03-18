@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Lista de Empleados</h3></div>
                    <div class="pull-right">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p> {{ $message }} !!
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>

                                </p>
                            </div>

                        @endif
                        <div class="btn-group">
                            <a href="{{ route('empleado.create') }}" class="btn btn-info" >Añadir Empleado</a>
                        </div>

                    </div>


                <!--Contenido de la tabla-->
                    <div class="table-container">
                        <table id="mytable" class="table table-bordered table-striped">
                            <thead>
                                <th class="text-center">Código</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Salario (Dolar)</th>
                                <th class="text-center">Salario (Pesos)</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Estatus</th>
                                <th class="text-center">Acciones</th>
                            </thead>
                            <tbody>
                            @if($empleados->count())
                                @foreach($empleados as $empleado)
                                    <tr>
                                        <td class="text-center">{{$empleado->codigo}}</td>
                                        <td class="text-center">{{$empleado->nombre}}</td>
                                        <td class="text-center">${{$empleado->sueldo_dolar}}</td>
                                        <td class="text-center">${{$empleado->sueldo_pesos}}</td>
                                        <td class="text-center">{{$empleado->correo}}</td>
                                        <td id="estado-{{$empleado->id}}" class="text-center">@if($empleado->activo == 1) Activo @else Inactivo @endif</td>
                                        <td class="text-center">
                                            <a class="btn btn-default btn-xs" href="{{action('EmpleadoController@show', $empleado->id)}}" >
                                                <span class="fa fa-eye"></span>
                                            </a>

                                                <a id="btnInactivo-{{$empleado->id}}" class="btn btn-default btn-xs btnInact" data-id="{{$empleado->id}}" data-estado="0" style="color:red;display: @if($empleado->activo == 0) none; @endif ">
                                                    <span class="fa fa-stop-circle"></span>
                                                </a>

                                            <a id="btnActivo-{{$empleado->id}}" class="btn btn-default btn-xs btnActiv" data-id="{{$empleado->id}}" data-estado="1" style="color: green; display:  @if($empleado->activo == 1) none; @endif">
                                                <span class="fa fa-play-circle"></span>
                                            </a>
                                            <a class="btn btn-primary btn-xs" href="{{action('EmpleadoController@edit', $empleado->id)}}">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                             <form action="{{action('EmpleadoController@destroy', $empleado->id)}}"
                                                   class="alertEliminar"
                                                   method="post">
                                                   {{csrf_field()}}
                                                   <input name="_method" type="hidden" value="DELETE">
                                                   <button class="btn btn-danger btn-xs" type="submit">
                                                       <span class="fa fa-trash"></span>
                                                   </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">No existen registros !!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $('.alertEliminar').submit(function (event){
            event.preventDefault();

            Swal.fire({
                title: '¿Seguro que desea eliminar?',
                text: "Atención, No podrá revertir los cambios",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'

            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('.btnActiv, .btnInact').on('click',function (){
               let idempleado = $(this).attr('data-id');
               let estado = $(this).attr('data-estado');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('empleado.cambiar_estado') }}",
                    data: {
                        "estado": estado,
                        "idempleado": idempleado
                    },
                    dataType: 'JSON',
                    beforeSend: function () {
                    },
                    success: function (data) {
                       // window.location.reload();
                      //  $("#btnInact").html(response);
                        if(estado=="0"){
                            $("#estado-"+idempleado).html('Inactivo');
                            $("#btnActivo-"+idempleado).show();
                            $("#btnInactivo-"+idempleado).hide();
                        }else{
                            $("#estado-"+idempleado).html('Activo');
                            $("#btnActivo-"+idempleado).hide();
                            $("#btnInactivo-"+idempleado).show();
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });

            });

    });

</script>
@endsection