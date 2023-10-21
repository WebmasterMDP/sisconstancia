@extends('adminlte::page')

@section('title', 'Administracion')

@section('content_header')
    <h1>Modulo Ubicaciones</h1>
@stop

@section('content')
<br>
<x-adminlte-card title="LISTA DE UBICACIONES" class="m-2" theme="gray" icon="fas fa-id-card">
    <div class="col-12">                                         
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="#" data-href="" class="btn btn-info" data-toggle="modal" data-target="#addUbicacion" data-placement="top" title="Agregar Ubicacion">
                                    <span class="fas fa-plus-square"></span>
                                </a>
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
                                    <thead class="text-center px-4 py-4 text-nowrap bg-gray">
                                        <tr>
                                            <th>N°</th>
                                            <th style="width: 50%">NOMBRE</th>
                                            <th>ZONA</th>
                                            <th>OBSERVACIÓN</th>
                                            <th>USUARIO</th>
                                            <th>EDITAR</th>
                                            <th>ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(is_array($datos) || is_object($datos))
                                            @foreach ($datos as $dato)
                                            <tr>
                                                <td>{{ $dato->id }}</td>
                                                <td>{{ $dato->nombreUbicacion }}</td>
                                                <td class="text-center">{{ $dato->zona }}</td>
                                                <td class="text-center">{{ $dato->observacion }}</td>
                                                <td class="text-center">{{ $dato->usuario }}</td>
                                                <td class="text-center">
                                                    <buttom name="edit" id="edit" data-href="" class="btn btn-warning" data-toggle="modal" data-target="#editUbicacion{{ $dato->id }}" data-placement="top" title="Editar Ubicación">
                                                        <i class="fas fa-edit"></i>
                                                    </buttom>
                                                </td>
                                                @include('Administracion.ubicacion.modalEditar')
                                                <td class="text-center">
                                                    <form action="{{ route('ubicacion.destroy', $dato->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-md">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="18" class="text-center bg-dark">No hay datos para mostrar</td>
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
@include('Administracion.ubicacion.modalCreate')
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