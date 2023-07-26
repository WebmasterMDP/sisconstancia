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
                                    <span class="fas fa-plus-square">Agregar</span>
                                </a>
                                <br>
                                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                    <thead class="text-center text-nowrap bg-dark ">
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>USERNAME</th>
                                            <!-- <th>DOC. NAC. DE IDENTIDAD</th> -->
                                            <th>CORREO</th>
                                            <th>ROL</th>
                                            <th>ESTADO</th>
                                            <!-- <th>EDITAR</th> -->
                                            <th>ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dataUsers as $dataUser)
                                        <tr>
                                            <td>{{ $dataUser->id }}</td>
                                            <td>{{ $dataUser->name }}</td>
                                            <td>{{ $dataUser->username }}</td>
                                            <!-- <td>{{ $dataUser->numdoc }}</td> -->
                                            <td>{{ $dataUser->email }}</td>
                                            <td>{{ $dataUser->rol }}</td>
                                            @if($dataUser->estado == 1)
                                                <td><span class="badge bg-success">Activo</span></td>
                                            @else
                                                <td><span class="badge bg-danger">Anulado</span></td>
                                            @endif
                                            <!-- <td>
                                                <form class="" id="editar" method="get" action="{{ url('/userEdit/'.$dataUser->id) }}">
                                                    @csrf
                                                    <button class="btn btn-warning" title="Editar" onclick="userEdit()" type="submit">
                                                    <i class="fas fa-edit"></i>
                                                    </button>
                                                </form>
                                            </td> -->
                                            <td>
                                                <form class="formDelete" id="delete" method="post" onclick="userDelete()" action="{{ url('/userDelete/'.$dataUser->id) }}">
                                                    @csrf
                                                    <button class="btn btn-danger delete" id="delete" title="Borrar"  type="submit">
                                                    <i class="fas fa-trash"></i>
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
                                            <option>usuario</option>
                                            <option>admin</option>
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
function userDelete() {
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
        'Eliminado!',
        'El usuario se eliminó.',
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

@if(session('user') == 'fail')
    <script>
        Swal.fire({
            icon: 'error',
            title:'Oops...',
            text: 'Fallo el proceso',
        })  
    </script>
@endif

@if(session('user') == 'miss')
    <script>
        Swal.fire({
            icon: 'warning',
            title:'Oops...',
            text: 'Ingrese datos solicitados',
        })
    </script>
@endif

@stop