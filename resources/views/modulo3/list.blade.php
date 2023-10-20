@extends('adminlte::page')

@section('title', 'Constancias Posesion')

@section('content_header')
    <h1>MODULO CONSTANCIAS DE POSESIÓN</h1>
@stop

@section('content')
<br>
<x-adminlte-card title="LISTA DE CONSTANCIAS" class="m-2" theme="dark" icon="fas fa-id-card">
    <div class="col-12">                                         
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                            <table id="example2" class="table table-hover align-middle dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                <thead class="text-center px-2 py-2 text-nowrap bg-gray">
                                    <tr>
                                        <th>N°</th>
                                        <th>CODIGO CONSTANCIA</th>
                                        <th style="width: 10%">NOMBRE</th>
                                        <th>DNI</th>
                                        <th>UBICACIÓN</th>
                                        <th>ESTADO</th>
                                        <th>PDF</th>
                                        <th>EDITAR</th>
                                        <th>ELIMINAR</th>
                                        <th>N° INFORME</th>
                                        <th>FECHA DE INFORME</th>
                                        <th>N° EXPEDIENTE</th>
                                        <th>FECHA DE EXPEDIENTE</th>
                                        <th>LOTE</th>
                                        <th>MANZANA</th>
                                        <th>ÁREA DEL PREDIO</th>
                                        <th>PERIODO</th>                     
                                        <th>ACOMPAÑANTE</th>
                                        <th>DNI ACOMPAÑANTE</th>       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(is_array($datos) || is_object($datos))
                                        @foreach ($datos as $dato)
                                        <tr class="text-nowrap">
                                            <td>{{ $dato->id }}</td>
                                            <td class="text-center">{{ $dato->codConstancia }}</td>
                                            <td>{{ $dato->nombreCompleto }}</td>
                                            <td>{{ $dato->numdoc }}</td>
                                            <td>{{ $dato->ubicacion }}</td>

                                            @if ($dato->estado == 1)
                                                <td><span class="badge badge-success">Activo</span></td>
                                            @else
                                                <td><span class="badge badge-danger">Inactivo</span></td>
                                            @endif
                                            <td>
                                                <a href="{{ url('ConstanciaPosesion/'.$dato->_token) }}" data-href="" class="btn btn-info btn-md" data-placement="top"  title="Imprimir">
                                                    <span class="fas fa-print"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('constancia.edit', $dato->id) }}" class="btn btn-warning btn-md" data-placement="top" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form class="registroDelete" method="post" action="{{ url('/modulo3/delete/'.$dato->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" title="Borrar" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $dato->numInforme }}</td>
                                            <td>{{ $dato->fechaInforme }}</td>
                                            <td>{{ $dato->numExpediente }}</td>
                                            <td>{{ $dato->fechaExpediente }}</td>
                                            <td>{{ $dato->lote }}</td>
                                            <td>{{ $dato->manzana }}</td>
                                            <td>{{ $dato->areaPredio }}</td>
                                            <td>{{ $dato->periodo }}</td>
                                            @if ($dato->estadoCivil == 's')
                                                <td><span class="badge badge-secondary">no figura</span></td>
                                                <td><span class="badge badge-secondary">no figura</span></td>
                                            @else
                                                <td>{{ $dato->partner }}</td>
                                                <td>{{ $dato->dniPartner }}</td>
                                            @endif

                                            
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="18" class="text-center">No hay datos para mostrar</td>
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
</x-adminlte-card>
@stop

@section('css')
@stop

@section('js')
<script>
$('.registroDelete').submit(function(e){
    e.preventDefault();
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success m-2',
            cancelButton: 'btn btn-danger m-2'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: '¿Estás seguro?',
        text: 'Se eliminará definitivamente',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'No, cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
            /* console.log('click'); */
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'El usuario sigue activo',
                'error'
            );
        }
    });
});
</script>



@if(session('constancia') == 'create')
    <script>
        Swal.fire(
        'Exito!',
        'Se agrego correctamente',
        'success'
        )
    </script>
@endif

<!-- @if(session('constancia') == 'ok')
    <script>
        Swal.fire(
        'Exito!',
        'Se habilito la impresión',
        'success'
        )
    </script>
@endif -->

@if(session('constancia') == 'disabled')
    <script>
        Swal.fire(
        'Anulado!',
        'La constancia se anulo correctamente.',
        'success'
        )
    </script>
@endif

@stop