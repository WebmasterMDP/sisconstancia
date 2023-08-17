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
                                            <th>TITULAR</th>
                                            <th>DNI</th>
                                            <th>N° EXPEDIENTE</th>
                                            <th>FECHA DE EMISIÓN</th>
                                            <th>DIRECCIÓN</th>
                                            <th>FECHA DE VENCIMIENTO</th>
                                            <th>N° PARTIDA</th>
                                            <th>N° INFORME</th>
                                            <th>ESTADO</th>
                                            <th>PDF</th>
                                            <th>EDITAR</th>
                                            <th>ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(is_array($datos) || is_object($datos))
                                            @foreach ($datos as $dato)
                                            <tr>
                                                <td>{{ $dato->id }}</td>
                                                <td>{{ $dato->titular }}</td>
                                                <td>{{ $dato->numdoc }}</td>
                                                <td>{{ $dato->expediente }}</td>
                                                <td>{{ $dato->fecha_emision }}</td>
                                                <td>{{ $dato->direccion }}</td>
                                                <td>{{ $dato->fecha_vencimiento }}</td>
                                                <td>{{ $dato->partida }}</td>
                                                <td>{{ $dato->num_informe }}</td>
                                                @if ($dato->estado == 1)
                                                    <td><span class="badge badge-success">Activo</span></td>
                                                @else
                                                    <td><span class="badge badge-danger">Inactivo</span></td>
                                                @endif
                                                <td>
                                                    <a href="{{ url('pu/fpdf/'.$dato->id) }}" data-href="" class="btn btn-info btn-print" data-placement="top"  title="Imprimir">
                                                        <span class="fas fa-print"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('parametro.edit', $dato->id) }}" data-href="" class="btn btn-warning btn-print" data-placement="top"  title="Editar">
                                                        <span class="fas fa-edit"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('parametro.destroy', $dato->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-print" data-placement="top"  title="Eliminar">
                                                            <span class="fas fa-trash"></span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="13" class="text-center">No hay datos para mostrar</td>
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
@stop