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
                                            <th>EXPEDIENTE</th>
                                            <th>FECHA EXPEDIENTE</th>
                                            <th>PROPIETARIO</th>
                                            <th>RESOLUCION</th>
                                            <th>TIPO DE EDIFICACION</th>
                                            <th>UBICACIÓN</th>
                                            <th>N° LICENCIA</th>
                                            <th>ÁREA CONSTRUIDA</th>
                                            <th>ÁREA TERRENO</th>
                                            <th>VALOR DE OBRA</th>
                                            <th>OTROS</th>
                                            <th>ZONIFICACION</th>
                                            <th>AREA E:U</th>
                                            <th>ALTURA DE EDIFICACIÓN</th>
                                            <th>RETIRO</th>
                                            <th>ÁREA LIBRE</th>
                                            <th>DENSIDAD</th>
                                            <th>ESTABLECIMIENTO</th>
                                            <th>ZONIFICACION</th>
                                            <th>AREA E:U</th>
                                            <th>ALTURA DE EDIFICACIÓN</th>
                                            <th>RETIRO</th>
                                            <th>ÁREA LIBRE</th>
                                            <th>DENSIDAD</th>
                                            <th>ESTABLECIMIENTO</th>
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
                                            <td>{{ $dato->tipo_edificacion }}</td>
                                            <td>{{ $dato->expediente }}</td>
                                            <td>{{ $dato->fecha_expediente }}</td>
                                            <td>{{ $dato->propietario }}</td>
                                            <td>{{ $dato->num_resolucion }}</td>
                                            <td>{{ $dato->num_licencia }}</td>
                                            <td>{{ $dato->ubicacion }}</td>
                                            <td>{{ $dato->area_construida }}</td>
                                            <td>{{ $dato->area_terreno }}</td>
                                            <td>{{ $dato->valor_obra }}</td>
                                            <td>{{ $dato->otros }}</td>
                                            <td>{{ $dato->zonificacion_normativa }}</td>
                                            <td>{{ $dato->area_eu_normativa }}</td>
                                            <td>{{ $dato->altura_edif_normativa }}</td>
                                            <td>{{ $dato->retiro_normativa }}</td>
                                            <td>{{ $dato->area_libre_normativa }}</td>
                                            <td>{{ $dato->densidad_normativa }}</td>
                                            <td>{{ $dato->estacionamiento_normativa }}</td>
                                            <td>{{ $dato->zonificacion_proyecto }}</td>
                                            <td>{{ $dato->area_eu_proyecto }}</td>
                                            <td>{{ $dato->altura_edif_proyecto }}</td>
                                            <td>{{ $dato->retiro_proyecto }}</td>
                                            <td>{{ $dato->area_libre_proyecto }}</td>
                                            <td>{{ $dato->densidad_proyecto }}</td>
                                            <td>{{ $dato->estacionamiento_proyecto }}</td>
                                            @if($dato->estado == 1)
                                                <td><span class="badge badge-success">Activo</span></td>
                                            @else
                                                <td><span class="badge badge-danger">Inactivo</span></td>
                                            @endif
                                            <td>
                                                <a href="{{ url('co/fpdf/'.$dato->id) }}" data-href="" class="btn btn-info btn-print" data-placement="top"  title="Imprimir">
                                                    <span class="fas fa-print"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('conformidad.edit', $dato->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('conformidad.destroy', $dato->id) }}" method="POST">
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
                                            <td colspan="26" class="text-center">No hay datos para mostrar</td>
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