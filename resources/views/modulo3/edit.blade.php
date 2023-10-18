@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CONSTANCIA DE POSESIÓN</h1>
@stop

@section('content')
<br>
<x-adminlte-card title="EDITAR REGISTRO DE CONSTANCIA" class="m-2" theme="dark" icon="fas fa-id-card">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    Campos obligatorios ('<strong style="color:red">*</strong>') 
                </div>
                <div class="col-12">
                    <form action="{{ route('constancia.update', $data->id)}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <x-adminlte-card title="EDITAR DATOS" class="" theme="dark" icon="fas fa-id-card">
                                <div class="col-12">                                       
                                    <div class="row ">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- NOMBRES Y APELLIDOS --}}
                                                    <label for="">NOMBRES Y APELLIDOS <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="name" id="name" required value="{{ $data->nombre_completo }}" placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
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
                                                    <label for="">DNI <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="numdoc" id="numdoc" required value="{{ $data->numdoc }}" placeholder="Ingresar dni" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- N° DE INFORME --}} 
                                                    <label for="">N° DE INFORME <strong style="color:red">*</strong> </label>                                      
                                                    <x-adminlte-input type="text" name="numInforme" id="numInforme" required value="{{ $data->num_informe }}" placeholder="Ingrese informe" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- EXPEDIENTE --}}
                                                    <label for="">EXPEDIENTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="expediente" id="expediente" required value="{{ $data->num_expediente }}" placeholder="Ingresar Expediente" label-class="text-lightblue">
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
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- FECHA DE EXPEDIENTE --}}
                                                    <label for="">FECHA DE EXPEDIENTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="date" name="fechaExpediente" id="fechaExpediente" value="{{ $data->fecha_expediente }}" required label-class="text-lightblue">
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
                                                    {{-- UBICACIÓN --}} 
                                                    <label for="">UBICACIÓN <strong style="color:red">*</strong> </label>                                      
                                                    <x-adminlte-input type="text" name="ubicacion" id="ubicacion" required value="{{ $data->ubicacion }}" placeholder="Ingrese ubicación" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- ACOMPAÑANTE --}}
                                                    <label for="">ACOMPAÑANTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="partner" id="partner" required value="{{ $data->partner }}" placeholder="Ingrese acompañante" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{--  DNI ACOMPAÑANTE --}}
                                                    <label for="">DNI ACOMPAÑANTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="dniPartner" id="dniPartner" required value="{{ $data->dni_partner }}" placeholder="Ingrese dni" label-class="text-lightblue">
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
                            <x-adminlte-card title="LOCAL" class="" theme="dark" icon="fas fa-id-card">
                                <div class="col-12">                    
                                    <div class="row ">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- ÁREA DEL PREDIO --}}
                                                    <label for="">ÁREA DEL PREDIO <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="areaPredio" id="areaPredio" required value="{{ $data->area_predio }}" placeholder="Ingrese área en m²" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- PLANO VISADO --}}
                                                    <label for="">PLANO VISADO <strong style="color:red">*</strong> </label>  
                                                    <x-adminlte-input type="text" name="planoVisado" id="planoVisado" value="{{ $data->plano_visado }}" required placeholder="Ingrese n° plano" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-map-pin text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- N° RESOLUCIÓN --}}
                                                    <label for="">N° RESOLUCIÓN <strong style="color:red">*</strong> </label>  
                                                    <x-adminlte-input type="text" name="numResolucion" id="numResolucion" required value="{{ $data->num_resolucion }}" placeholder="Ingrese resolución" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- N° ORDENANZA --}}
                                                    <label for="">N° ORDENANZA <strong style="color:red">*</strong> </label>  
                                                    <x-adminlte-input type="text" name="numOrdenanza" id="numOrdenanza" required value="{{ $data->num_ordenanza }}" placeholder="Ingrese n° ordenanza" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- FECHA DE VALIDEZ --}}
                                                    <label for="">FECHA DE VALIDEZ</label>
                                                    <x-adminlte-input type="date" name="fechaValidez" id="fechaValidez" required value="{{ $data->fecha_validez }}" label-class="text-lightblue">
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