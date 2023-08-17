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
                                            <th>DENOMINACIÓN</th>
                                            <th>EXPEDIENTE</th>
                                            <th>FECHA DE EMISIÓN</th>
                                            <th>ZONIFICACIÓN</th>
                                            <th>N° RESOLUCIÓN</th>
                                            <th>FECHA DE VENCIMIENTO</th>
                                            <th>PROPIETARIO</th>
                                            <th>RESPONSABLE DE OBRA</th>
                                            <th>DEPARTAMENTO</th>
                                            <th>PROVINCIA</th>
                                            <th>DISTRITO</th>
                                            <th>URBA / OTRO</th>
                                            <th>U.C.</th>
                                            <th>LOTE</th>
                                            <th>ÁREA TERRENO BRUTO</th>
                                            <th>ÁREA VÍA METROPOLITANA</th>
                                            <th>ÁREA AFECTA APORTES</th>
                                            <th>PAQUES ZONALES</th>
                                            <th>SERVICIOS PÚBLICOS</th>
                                            <th>ÁREA DE SERVICIOS</th>
                                            <th>ÁREA VENDIBLE</th>
                                            <th>ÁREA CIRCULACIÓN</th>
                                            <th>ESTADO</th>
                                            <th>PDF</th>
                                            <th>EDITAR</th>
                                            <th>ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(is_array($datos) || is_object($datos))
                                        @foreach( $datos as $dato )
                                        <tr>
                                            <td>{{ $dato->id }}</td>
                                            <td>{{ $dato->denominacion }}</td>
                                            <td>{{ $dato->expediente }}</td>
                                            <td>{{ $dato->fecha_emision }}</td>
                                            <td>{{ $dato->zonificacion }}</td>
                                            <td>{{ $dato->num_resolucion }}</td>
                                            <td>{{ $dato->fecha_vencimiento }}</td>
                                            <td>{{ $dato->propietario }}</td>
                                            <td>{{ $dato->responsable_obra }}</td>
                                            <td>{{ $dato->departamento }}</td>
                                            <td>{{ $dato->provincia }}</td>
                                            <td>{{ $dato->distrito }}</td>
                                            <td>{{ $dato->urbanizacion_otro }}</td>
                                            <td>{{ $dato->uc }}</td>
                                            <td>{{ $dato->lote }}</td>
                                            <td>{{ $dato->area_terreno }}</td>
                                            <td>{{ $dato->area_via_metropolitana }}</td>
                                            <td>{{ $dato->area_afecta_aportes }}</td>
                                            <td>{{ $dato->parque_zonales }}</td>
                                            <td>{{ $dato->servicios_publicos }}</td>
                                            <td>{{ $dato->area_servicios }}</td>
                                            <td>{{ $dato->area_vendible }}</td>
                                            <td>{{ $dato->area_circulacion }}</td>
                                            @if($dato->estado == 1)
                                                <td><span class="badge badge-success">Activo</span></td>
                                            @else
                                                <td><span class="badge badge-danger">Inactivo</span></td>
                                            @endif
                                            <td>
                                                <a href="{{ url('hu/fpdf/'.$dato->id) }}" data-href="" class="btn btn-info btn-print" data-placement="top"  title="Imprimir">
                                                    <span class="fas fa-print"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('habilitacion.edit', $dato->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('habilitacion.destroy', $dato->id) }}" method="POST">
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
                                            <td colspan="27" class="text-center">No hay datos para mostrar</td>
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