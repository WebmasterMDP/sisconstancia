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
                                <a href="#" data-href="" class="btn btn-success" data-toggle="modal" data-target="#addUser" data-placement="top" title="Agregar Usuario">
                                    <span class="fas fa-plus-square"></span>
                                </a>
                                <br>
                                <table id="example2" class="text-center table align-middle dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                    <thead class="bg-gray">
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
                                                <form class="" id="editar" method="" action="{{ url('/user/edit/'.$dataUser->id) }}">
                                                    @csrf
                                                    <button class="btn btn-warning" title="Editar" type="submit">
                                                    <i class="fas fa-edit"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form class="formDelete" id="delete" method="post" onclick="userdelete()" action="{{ url('/user/delete/'.$dataUser->id) }}">
                                                    @csrf
                                                    <button class="btn btn-danger delete" id="delete" title="Borrar"  type="submit">
                                                    <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form class="" method="post" action="{{ url('/resetpass/'.$dataUser->id) }}">
                                                    @csrf
                                                    <button class="btn btn-info" id="delete" title="Restablecer"  type="submit">
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

<div class="modal fade show" id="addUser" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">REGISTRAR USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ url('usuario/create') }}" method="POST" autocomplete="off">
            @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- DNI --}}
                                        <label for="">Doc. Nac. Identidad</label>                                       
                                        <x-adminlte-input type="text" required name="numdoc" id="numdoc" placeholder="Ingrese dni" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- Nombre y Apellido --}}
                                        <label for="">Nombre y Apellido</label>
                                        <x-adminlte-input type="text" required name="name" id="name" placeholder="Ingrese nombre" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- Correo --}}
                                        <label for="">Correo</label>                                       
                                        <x-adminlte-input type="text" required name="email" id="email" placeholder="Ingrese Giro" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- ROL --}}
                                        <label for="">ROL <strong style="color:red">*</strong></label>  
                                        <x-adminlte-select type="text" required name="rol" id="rol" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-card text-dark"></i>
                                                </div>
                                            </x-slot>
                                            <option value="user">usuario</option>
                                            <option value="admin">admin</option>
                                        </x-adminlte-select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')

<script>
function userdelete() {
    event.preventDefault();
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success m-2',
        cancelButton: 'btn btn-danger m-2'
    },
    buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
    title: '¿Estas seguro?',
    text: "Se eliminará definitavemnte",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, eliminar',
    cancelButtonText: 'No, cancelar',
    reverseButtons: true
    }).then((result) => {
    if (result.isConfirmed) {
        console.log('hola');
        /* $(this).submit(); */
        document.getElementById("delete").submit();
    } else if (
        result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
        'Cancelado',
        'El usuario sigue activo',
        'error'
        )
    }
    })
}
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