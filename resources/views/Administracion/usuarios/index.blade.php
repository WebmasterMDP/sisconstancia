@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
@stop

@section('content')
<br>
<x-adminlte-card title="USUARIOS" class="m-2" theme="dark" icon="fas fa-id-card">
    <div class="col-12">                                         
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="#" data-href="" class="btn btn-info" data-toggle="modal" data-target="#addUser" data-placement="top" title="Agregar Usuario">
                                    <span class="fas fa-plus-square"></span>
                                </a>
                                <br>
                                <table id="example2" class="table table-hover align-middle dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                    <thead class="text-center px-4 py-4 text-nowrap bg-gray">
                                        <tr >
                                            <th>ID</th>
                                            <th style="width: 20%">NOMBRE</th>
                                            <th style="width: 10%">USERNAME</th>
                                            <!-- <th>DOC. NAC. DE IDENTIDAD</th> -->
                                            <th style="width: 15%">CORREO</th>
                                            <th>ROL</th>
                                            <th>ESTADO</th>
                                            <th>EDITAR</th>
                                            <th>ELIMINAR</th>
                                            <th>RESTABLECER CONTRASEÑA</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach($dataUsers as $dataUser)
                                        <tr class="text-center">
                                            <td>{{ $dataUser->id }}</td>
                                            <td class="text-left">{{ $dataUser->name }}</td>
                                            <td>{{ $dataUser->username }}</td>
                                            <!-- <td>{{ $dataUser->numdoc }}</td> -->
                                            <td class="text-left">{{ $dataUser->email }}</td>
                                            @if($dataUser->rol == 'stuser'|| $dataUser->rol == 'user')
                                                <td><span class="badge bg-secondary">Usuario</span></td>
                                            @else
                                                <td><span class="badge bg-info">Admin</span></td>
                                            @endif

                                            @if($dataUser->estado == 1)
                                                <td><span class="badge bg-success">Habilitado</span></td>
                                            @else
                                                <td><span class="badge bg-danger">Deshabilitado</span></td>
                                            @endif
                                            <td>
                                                <buttom name="edit" id="edit" data-href="" class="btn btn-warning" data-toggle="modal" data-target="#editUser{{ $dataUser->id }}" data-placement="top" title="Editar Usuario">
                                                    <i class="fas fa-edit"></i>
                                                </buttom>
                                            </td>
                                            @include('Administracion.usuarios.modalEditar')

                                            <td>
                                                <form class="formDelete" method="post" action="{{ url('/user/delete/'.$dataUser->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" title="Borrar" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form class="" method="post" action="{{ url('/resetpass/'.$dataUser->id) }}">
                                                    @csrf
                                                    <button class="btn btn-info" title="Restablecer" type="submit">
                                                    <i class="fas fa-key"></i>
                                                    </button>
                                                </form>
                                            </td>
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
</x-adminlte-card>

@include('Administracion.usuarios.modalCreate')

@stop

@section('css')
@stop

@section('js')

<script>
$('.formDelete').submit(function(e){
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

@if(session('user') == 'ok')
    <script>
        Swal.fire(
        'Exito!',
        'Usuario creado correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'update')
    <script>
        Swal.fire(
        'Actualizado!',
        'El usuario se actualizo correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'error')
    <script>
        Swal.fire({
            icon: 'error',
            title:'Oops...',
            text: 'Fallo el proceso',
        })  
    </script>
@endif

@if(session('user') == 'delete')
    <script>
        Swal.fire(
        'Eliminado!',
        'El usuario se elimino correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'empty')
    <script>
        Swal.fire({
            icon: 'warning',
            title:'Oops...',
            text: 'Ingrese datos solicitados',
        })
    </script>
@endif

@if(session('user') == 'reset')
    <script>
        Swal.fire(
        'Restablecido!',
        'La contraseña se restablecio correctamente.',
        'success'
        )
    </script>
@endif

@stop