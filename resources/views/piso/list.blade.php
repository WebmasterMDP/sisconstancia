@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<br>
<x-adminlte-card title="LISTA DE PISOS" class="m-2" theme="dark" icon="fas fa-id-card">
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
                                            <th>COD PISO</th>
                                            <th>ANTIGUEDAD</th>
                                            <th>MURO Y COLUMNA</th>
                                            <th>TECHOS</th>
                                            <th>PISO</th>
                                            <th>PUERTAS Y VENTANAS</th>
                                            <th>REVESTIMIENTO</th>
                                            <th>BAÑO</th>
                                            <th>INSTALACIONES ELECT. Y SANT.</th>
                                            <th>ÁREA CONSTRUIDA</th>
                                            <th>MODIFICAR</th>
                                            <th>ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(is_array($datos) || is_object($datos))
                                        @foreach ($datos as $dato)
                                        <tr>
                                            <td>{{ $dato->id }}</td>
                                            <td>{{ $dato->expediente_conformidad }}</td>
                                            <td>{{ $dato->id_piso }}</td>
                                            <td>{{ $dato->antiguedad }}</td>
                                            <td>{{ $dato->muro_columna }}</td>
                                            <td>{{ $dato->techos }}</td>
                                            <td>{{ $dato->piso }}</td>
                                            <td>{{ $dato->puerta_ventana }}</td>
                                            <td>{{ $dato->revestimiento }}</td>
                                            <td>{{ $dato->bano }}</td>
                                            <td>{{ $dato->inst_elect }}</td>
                                            <td>{{ $dato->area_construida }}</td>
                                            <!-- @if($dato->estado == 1)
                                                <td><span class="badge badge-success">Activo</span></td>
                                            @else
                                                <td><span class="badge badge-danger">Inactivo</span></td>
                                            @endif -->
                                            <td>
                                                <a href="{{ route('piso.edit', $dato->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('piso.destroy', $dato->id) }}" method="POST">
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