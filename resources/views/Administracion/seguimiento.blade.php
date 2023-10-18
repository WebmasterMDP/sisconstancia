@extends('adminlte::page')

@section('title', 'Modificaciones')

@section('content_header')
@stop

@section('content')

<br>
<x-adminlte-card title="MODIFICACIONES" class="m-2" theme="dark" icon="fas fa-id-card">
    <div class="col-12">                                         
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <br>
                                <table id="example2" class="text-center table align-middle dataTable dtr-inline collapsed" aria-describedby="example1">
                                    <thead class="text-center text-nowrap bg-gray ">
                                        <tr>
                                            <th>ID</th>
                                            <th>N° TRAMITE</th>
                                            <th>TIPO DE TRAMITE</th>
                                            <th>ASUNTO</th>
                                            <th>FECHA</th>
                                            <th>HORA</th>
                                            <th>ESTADO</th>
                                            <th>PRINT</th>
                                            <th>USUARIO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(is_array($datos) || is_object($datos))
                                        @foreach($datos as $dato)
                                        <tr>
                                            <td>{{ $dato->id }}</td>
                                            <td>{{ $dato->id_tramite }}</td>
                                            <td>{{ $dato->tipo_tramite }}</td>
                                            <td>{{ $dato->observacion }}</td>
                                            <td>{{ $dato->fecha }}</td>
                                            <td>{{ $dato->hora }}</td>
                                            @if( $dato->estado == 1)
                                            <td><span class="badge bg-success">Activo</span></td>
                                            @else
                                            <td><span class="badge bg-danger">Anulado</span></td>
                                            @endif
                                            @if( $dato->print == 1)
                                            <td><span class="badge bg-secondary">Impreso</span></td>
                                            @else
                                            <td><span class="badge bg-info">No Impreso</span></td>
                                            @endif
                                            <td>{{ $dato->user }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">No hay datos para mostrar</td>
                                        </tr>
                                    @endif
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