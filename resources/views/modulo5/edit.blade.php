@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>TRABAJOS EN LA VÍA PÚBLICA</h1>
@stop

@section('content')
<br>
<x-adminlte-card title="EDITAR REGISTRO DE AUTORIZACIÓN" class="m-2" theme="dark" icon="fas fa-id-card">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    Campos obligatorios ('<strong style="color:red">*</strong>') 
                </div>
                <div class="col-12">
                    <form action="{{ route('via.pub.update', $data->id)}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="card-body">                                
                            <div class="row "> 
                                <x-adminlte-card title="INFORMACION DEL SOLICITANTE" class="" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                                       
                                        <div class="row ">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">NOMBRES Y APELLIDOS <strong style="color:red">*</strong> </label>                                   
                                                        <x-adminlte-input type="text" name="name" id="name" value="{{ $data->nombre_completo }}" required placeholder="Ingrese nombres y apellidos" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- DNI --}}
                                                        <label for="">DNI <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="numDoc" id="numDoc" value="{{ $data->numdoc }}" required  placeholder="Ingrese dni" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- EXPEDIENTE --}}
                                                        <label for="">EXPEDIENTE <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="expediente" id="expediente" value="{{ $data->num_expediente }}" required  placeholder="Ingrese n° de expediente" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $today = new DateTime(); ?>
                                            <?php /* echo $today->format('Y-m-d'); */ ?>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- FECHA DE EXPEDIENTE --}} 
                                                        <label for="">FECHA DE EXPEDIENTE <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="date" name="fechaExpediente" id="fechaExpediente" value="{{ $data->fecha_expediente }}" required label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-calendar text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- N° INFORME --}}
                                                        <label for="">N° INFORME <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="numInforme" id="numInforme" required value="{{ $data->num_informe }}" placeholder="Ingrese n° de expediente" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- COMPROBANTE --}}
                                                        <label for="">COMPROBANTE <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="comprobante" id="comprobante" required value="{{ $data->comprobante }}" placeholder="Ingrese n° de expediente" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>       
                                    </div>               
                                </x-adminlte-card>
                                <x-adminlte-card title="INFORMACION DEL PREDIO" class="" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                    
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- CONCEPTO DE SERVICIO --}} 
                                                        <label for="">CONCEPTO DE SERVICIO <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="text" name="conceptoServicio" id="conceptoServicio" value="{{ $data->concepto_servicio }}" required placeholder="Ingresar servicio" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-calendar text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- UBICACIÓN --}}
                                                        <label for="">UBICACIÓN <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="ubicacion" id="ubicacion" required value="{{ $data->ubicacion }}" placeholder="Ingrese ubicación" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- FECHA DE INSTALACIÓN --}} 
                                                        <label for="">FECHA DE INSTALACIÓN <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="date" name="fechaInstalacion" id="fechaInstalacion" value="{{ $data->fecha_instalacion }}" required label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- OTROGADO POR --}}
                                                        <label for="">OTROGADO POR <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="proveedorServicio" id="proveedorServicio" value="{{ $data->proveedor_servicio }}" required placeholder="Ingresar dirección" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>       
                                    </div>
                                </x-adminlte-card>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary" name="btnRegistrar" id="btnRegistrar" type="submit">
                                        <i class="fas fa-check-double"></i>
                                        Actualizar
                                    </button>                                                                       
                                </div>                                       
                            </div>
                        </div>
                    </form>
                    <!-- /.form -->          
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section> 
</x-adminlte-card>
@stop

@section('css')
@stop

@section('js')
@stop