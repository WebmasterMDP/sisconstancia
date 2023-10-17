@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<br>
<x-adminlte-card title="LISTA DE LICENCIAS" class="m-2" theme="dark" icon="fas fa-id-card">
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
                                            <th>NOMBRE</th>
                                            <th>DNI</th>
                                            <th>N° INFORME</th>
                                            <th>N° EXPEDIENTE</th>
                                            <th>FECHA DE EXPEDIENTE</th>
                                            <th>UBICACIÓN</th>
                                            <th>ACOMPAÑANTE</th>
                                            <th>DNI ACOMPAÑANTE</th>
                                            <th>ÁREA DEL PREDIO</th>
                                            <th>PLANO VISADO</th>
                                            <th>N° RESOLUCIÓN</th>
                                            <th>N° ORDENANZA</th>
                                            <th>FECHA DE VALIDEZ</th>
                                            <th>ESTADO</th>
                                            <th>PDF</th>
                                            <th>EDITAR</th>
                                            <th>ELIMINAR</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(is_array($datos) || is_object($datos))
                                            @foreach ($datos as $dato)
                                            <tr>
                                                <td>{{ $dato->id }}</td>
                                                <td>{{ $dato->codConstancia }}</td>
                                                <td>{{ $dato->nombreCompleto }}</td>
                                                <td>{{ $dato->numdoc }}</td>
                                                <td>{{ $dato->numInforme }}</td>
                                                <td>{{ $dato->fechaInforme }}</td>
                                                <td>{{ $dato->numExpediente }}</td>
                                                <td>{{ $dato->fechaExpediente }}</td>
                                                <td>{{ $dato->lote }}</td>
                                                <td>{{ $dato->manzana }}</td>
                                                <td>{{ $dato->ubicacion }}</td>
                                                <td>{{ $dato->areaPredio }}</td>
                                                <td>{{ $dato->periodo }}</td>
                                                @if ($dato->estadoCivil == 's')
                                                    <td><span class="badge badge-secondary">no figura</span></td>
                                                    <td><span class="badge badge-secondary">no figura</span></td>
                                                @else
                                                    <td>{{ $dato->partner }}</td>
                                                    <td>{{ $dato->dniPartner }}</td>
                                                @endif

                                                @if ($dato->estado == 1)
                                                    <td><span class="badge badge-success">Activo</span></td>
                                                @else
                                                    <td><span class="badge badge-danger">Inactivo</span></td>
                                                @endif
                                                <td>
                                                    <a href="{{ url('cp/fpdf/'.$dato->id) }}" data-href="" class="btn btn-info btn-print" data-placement="top"  title="Imprimir">
                                                        <span class="fas fa-print"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('constancia.edit', $dato->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('constancia.destroy', $dato->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
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
    </div>
</x-adminlte-card>
@stop

@section('css')
@stop

@section('js')

@if(session('create') == 'ok')
    <script>
        Swal.fire(
        'Exito!',
        'Se agrego correctamente',
        'success'
        )
    </script>
@endif

@if(session('print') == 'ok')
    <script>
        Swal.fire(
        'Exito!',
        'Se habilito la impresión',
        'success'
        )
    </script>
@endif

@stop