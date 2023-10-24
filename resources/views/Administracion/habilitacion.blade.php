@extends('adminlte::page')

@section('title', 'habilitacion')

@section('content_header')

@stop

@section('content')
<br>
<x-adminlte-card title="LOCAL" class="m-2" theme="dark" icon="fas fa-id-card">
    <div class="col-12">                                         
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger">
                                        <strong>{{ session('error') }}</strong>
                                    </div>
                                @endif
                                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                    <thead class="text-center text-nowrap bg-dark">
                                        <tr>
                                            <th>N°</th>
                                            <th>CODIGO TRAMITE</th>
                                            <th style="width: 10%">NOMBRE</th>
                                            <th>DNI</th>
                                            <th>ESTADO</th>
                                            <th>PDF</th>
                                            <th>EDITAR</th>
                                            <th>ANULAR</th>
                                            <th>FECHA DE INGRESO</th>
                                            <th>FECHA DE MODIFICACION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datos as $dato)
                                        <tr class="text-nowrap align-middle">
                                            <td>{{ $dato->id }}</td>
                                            <td>{{ $dato->codConstancia }}</td>
                                            <td>{{ $dato->nombreCompleto }}</td>
                                            <td>{{ $dato->numdoc }}</td>
                                            

                                            @if ($dato->estado == 1)
                                            <td><span class="badge bg-success">Activo</span></td>
                                            @else
                                            <td><span class="badge bg-danger">Anulado</span></td>
                                            @endif
                                            @if ( $dato->estado == 1 && $dato->print == 1)
                                                <td>
                                                    <button   button href="#" class="btn btn-secondary" data-toggle="tooltip"  data-placement="top" title="Habilitar Documento">
                                                        <span class="fas fa-check-circle"></span>
                                                    </button> 
                                                </td>
                                                <td>
                                                    <a href="#" data-href="{{ url('unlockPrint/'.$dato->id) }}" data-toggle="modal" data-target="#modalunlockPrint" class="btn btn-info" data-placement="top" title="Habilitar Impresion">
                                                        <span class="fas fa-print"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#" data-href="{{ url('disable/'.$dato->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete" data-placement="top" title="Anular Documento">
                                                        <span class="fas fa-ban"></span>
                                                    </a>
                                                </td>
                                            @elseif ( $dato->estado == 1 && $dato->print == 0 )
                                                <td>
                                                    <button href="#" class="btn btn-secondary" data-toggle="tooltip"  data-placement="top" title="Habilitar Documento">
                                                        <span class="fas fa-check-circle"></span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button href="#" class="btn btn-secondary" data-toggle="tooltip"  data-placement="top" title="Habilitar Impresion">
                                                        <span class="fas fa-print"></span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <a href="#" data-href="{{ url('disable/'.$dato->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete" data-placement="top" title="Anular Documento">
                                                        <span class="fas fa-ban"></span>
                                                    </a>
                                                </td>
                                            @elseif ( $dato->estado == 0 && $dato->print == 0)
                                                <td>
                                                    <a href="#" data-href="{{ url('enable/'.$dato->id) }}" data-toggle="modal" data-target="#modalDesanular" class="btn btn-success" data-placement="top" title="Habilitar Documento">
                                                        <span class="fas fa-check-circle"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button href="#" class="btn btn-secondary" data-toggle="tooltip"  data-placement="top" title="Habilitar Impresion">
                                                        <span class="fas fa-print"></span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button href="#" class="btn btn-secondary" data-toggle="tooltip"  data-placement="top" title="Anular Documento">
                                                        <span class="fas fa-ban"></span>
                                                    </button>
                                                </td>
                                            @elseif ( $dato->estado == 0 && $dato->print == 1 )
                                                <td>
                                                    <a href="#" data-href="{{ url('enable/'.$dato->id) }}" data-toggle="modal" data-target="#modalDesanular" class="btn btn-success" data-placement="top" title="Habilitar Documento">
                                                        <span class="fas fa-check-circle"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#" data-href="{{ url('unlockPrint/'.$dato->id) }}" class="btn btn-info" data-toggle="modal" data-target="#modalunlockPrint" data-placement="top" title="Habilitar Impresion">
                                                        <span class="fas fa-print"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button href="#" class="btn btn-secondary" data-toggle="tooltip"  data-placement="top" title="Anular Documento">
                                                        <span class="fas fa-ban"></span>
                                                    </button>
                                                </td>
                                            @endif
                                            <td>{{ $dato->created_at }}</td>
                                            <td>{{ $dato->updated_at }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modalDesanular" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¿Desea activar este registro?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deanulaRegistro" name="deanulaRegistro" action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Ingrese el motivo por el que desea habilitar el registro</p>
                        <input type="text" class="form-control" id="razon" name="razon" required placeholder="Ingrese motivo">
                        <input type="hidden" value="{{$dato->estado}}" name=estado>
                        <input type="hidden" value="{{$dato->print}}" name=print>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-light" data-dismiss="modal">No</a>
                        <a class="btn btn-success btn-ok">Si</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="modalunlockPrint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¿Desea habilitar la impresión?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="habilitaPrint" name="habilitaPrint" action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Ingrese el motivo por el que desea habilitar la impresion</p>
                        <input type="text" class="form-control" id="razon" name="razon" required placeholder="Ingrese motivo">
                        <input type="hidden" value="{{$dato->estado}}" name=estado>
                        <input type="hidden" value="{{$dato->print}}" name=print>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-light" data-dismiss="modal">No</a>
                        <a class="btn btn-info btn-ok">Si</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¿Desea anular este registro?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="anulaRegistro" name="anulaRegistro" action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Ingrese el motivo por el que desea anular el registro</p>
                        <input type="text" class="form-control" id="razon" name="razon" required placeholder="Ingrese motivo">
                        <input type="hidden" value="{{$dato->estado}}" name=estado>
                        <input type="hidden" value="{{$dato->print}}" name=print>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-light" data-dismiss="modal">No</a>
                        <a class="btn btn-danger btn-ok">Si</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-adminlte-card>

@stop

@section('css')
@stop

@section('js')

@if(session('habAdmin') == 'enable')
    <script>
        Swal.fire(
        'Exito!',
        'Se habilito el documento',
        'success'
        )
    </script>
@endif


@if(session('habAdmin') == 'unlockPrint')
    <script>
        Swal.fire(
        'Exito!',
        'Se habilito la impresión',
        'info'
        )
    </script>
@endif

@if(session('habAdmin') == 'disable')
    <script>
        Swal.fire(
        'Exito!',
        'Se deshabilito el documento',
        'success'
        )
    </script>
@endif

@if(session('error') == 'fail')
    <script>
        Swal.fire({
            icon: 'error',
            title:'Ups...',
            text: 'Algo ocurrio mal!',
            footer: '<a href="https://munipachacamac.com/">Oficina de Gobierno Digital</a>'
        })  
    </script>
@endif

@if(session('reason') == 'miss')
    <script>
        Swal.fire(
            'No ingreso motivo!',
            'No procedio la solicitud',
            'warning'
        )
    </script>
@endif

<script>
    $('#modalDesanular').on('show.bs.modal', function(e) {
        deanulaRegistro.setAttribute('action', $(e.relatedTarget).data('href'));        
           
        $('.btn-ok').on('click', function(e) {
            deanulaRegistro.submit();

        });
    });
   
    $('#modalDesanular').on('hide.bs.modal', function(e) {
        deanulaRegistro.setAttribute('action', '');
    });


    $('#modalunlockPrint').on('show.bs.modal', function(e) {
        habilitaPrint.setAttribute('action', $(e.relatedTarget).data('href'));        
           
        $('.btn-ok').on('click', function(e) {
            habilitaPrint.submit();
        });
    });
   
    $('#modalunlockPrint').on('hide.bs.modal', function(e) {
        habilitaPrint.setAttribute('action', '');
    });

    $('#modalDelete').on('show.bs.modal', function(e) {
        anulaRegistro.setAttribute('action', $(e.relatedTarget).data('href'));        
           
        $('.btn-ok').on('click', function(e) {
            anulaRegistro.submit();
        });
    });
   
    $('#modalDelete').on('hide.bs.modal', function(e) {
        anulaRegistro.setAttribute('action', '');
    });
    
</script>
@stop