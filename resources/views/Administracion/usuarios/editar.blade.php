@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!-- <h1>Editar Usuario</h1> -->
@stop

@section('content')
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">EDITAR USUARIO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ url('/user/update'.$user->id) }}" method="POST" autocomplete="off">
    @csrf
        <div class="modal-body">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- Nombre y Apellido --}}
                                <label for="">NOMBRES Y APELLIDOS <strong style="color:red">*</strong></label>
                                <x-adminlte-input type="text" required value="{{ $user->name }}" name="name" id="name" placeholder="Ingrese nombre" label-class="text-lightblue">
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
                                <label for="">DOC. NAC. IDENTIDAD <strong style="color:red">*</strong> </label>                                       
                                <x-adminlte-input type="text" required value="{{ $user->numdoc }}" name="numdoc" id="numdoc" placeholder="Ingrese dni" label-class="text-lightblue">
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
                                <label for="">CORREO <strong style="color:red">*</strong> </label>                                       
                                <x-adminlte-input type="text" required value="{{ $user->email }}" name="email" id="email" placeholder="Ingrese Giro" label-class="text-lightblue">
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
                                {{-- ROL --}}
                                <label for="">ROL <strong style="color:red">*</strong></label>  
                                <x-adminlte-select type="text" required name="rol" id="rol" label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-id-card text-dark"></i>
                                        </div>
                                    </x-slot>
                                    @if($user->rol == 'stuser'|| $user->rol == 'user')
                                        <option value="user" >Usuario</option>
                                        <option value="admin" >Admin</option>
                                    @else
                                        <option value="admin" >Admin</option>
                                        <option value="user" >Usuario</option>
                                    @endif
                                    
                                </x-adminlte-select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- ESTADO --}}
                                <label for="">ESTADO <strong style="color:red">*</strong></label>  
                                <x-adminlte-select type="text" required name="estado" id="estado" label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-id-card text-dark"></i>
                                        </div>
                                    </x-slot>
                                    @if($user->estado == 1 )
                                        <option value="1">Habilitado</option>
                                        <option value="2">Deshabilitado</option>
                                    @else
                                        <option value="2">Deshabilitado</option>
                                        <option value="1">Habilitado</option>
                                    @endif
                                    
                                </x-adminlte-select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" onclick="javascript:window.history.back();" >Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
</div>
@stop

@section('css')
@stop

@section('js')
@if(session('user') == 'error')
    <script>
        Swal.fire({
            icon: 'error',
            title:'Oops...',
            text: 'Fallo el proceso',
        })  
    </script>
@endif
@stop