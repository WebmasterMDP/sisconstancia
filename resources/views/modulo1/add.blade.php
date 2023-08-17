@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CONFORMIDAD DE OBRAS</h1>
@stop

@section('content')
<br>
<x-adminlte-card title="REGISTRO DE LICENCIA" class="m-2" theme="dark" icon="fas fa-id-card">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    Campos obligatorios ('<strong style="color:red">*</strong>') 
                </div>
                <div class="col-12">
                    <form action="{{ route('conformidad.store')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="card-body">                                
                            <div class="row "> 
                                <x-adminlte-card title="DATOS" class="" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                                       
                                        <div class="row ">
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">TIPO DE EDIFICACIÓN <strong style="color:red">*</strong> </label>                                   
                                                        <x-adminlte-input type="text" name="edificacion" id="edificacion" required placeholder="Ingrese tipo de edificación" label-class="text-lightblue">
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
                                                        {{-- EXPEDIENTE --}} 
                                                        <label for="">EXPEDIENTE <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="text" name="expediente" id="expediente" required placeholder="Ingrese n° de expediente" label-class="text-lightblue">
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
                                                        {{-- Fecha Expediente --}} 
                                                        <label for="">FECHA DE EXPEDIENTE <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="date" name="fechaExpediente" id="fechaExpediente" required label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-calendar text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- PROPIETARIO --}}
                                                        <label for="">PROPIETARIO <strong style="color:red">*</strong></label>  
                                                        <x-adminlte-input type="text" name="propietario" id="propietario" placeholder="Ingrese propietario" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-phone-alt text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- RESOLUCIÓN --}} 
                                                        <label for="">RESOLUCIÓN <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="text" name="resolucion" id="resolucion" required placeholder="Ingrese resolución" label-class="text-lightblue">
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
                                                        {{-- N° DE LICENCIA --}}
                                                        <label for="">N° DE LICENCIA <strong style="color:red">*</strong> </label>                                       
                                                        <x-adminlte-input type="text" name="numLicencia" id="numLicencia" required placeholder="Ingrese n° de licencia" label-class="text-lightblue">
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
                                                        {{-- UBICACIÓN --}} 
                                                        <label for="">UBICACIÓN <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="text" name="ubicacion" id="ubicacion" required placeholder="Ingrese ubicación" label-class="text-lightblue">
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
                                                        {{-- ÁREA CONSTRUIDA --}}
                                                        <label for="">ÁREA CONSTRUIDA <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="areaConstruida" id="areaConstruida" required placeholder="Ingrese en m²" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 juridica">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- ÁREA TERRENO --}}
                                                        <label for="">ÁREA TERRENO <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="areaTerreno" id="areaTerreno" required placeholder="Ingrese en m²" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-user text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 juridica">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- VALOR DE LA OBRA --}}
                                                        <label for="">VALOR DE LA OBRA <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="valorObra" id="valorObra" required placeholder="Ingrese valor" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 juridica">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- OTROS --}}
                                                        <label for="">OTROS </label>  
                                                        <x-adminlte-input type="text" name="otro" id="otro" required minlength="8" placeholder="Este campo es opcional" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 juridica">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- CANTIDAD DE PISOS --}}
                                                        <label for="">CANTIDAD DE PISOS </label>  
                                                        <x-adminlte-select type="text" name="cantidadPisos" id="cantidadPisos" required label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                            <option value="1">1 PISO</option>
                                                            <option value="2">2 PISOS</option>
                                                            <option value="3">3 PISOS</option>
                                                            <option value="4">4 PISOS</option>
                                                            <option value="5">5 PISOS</option>
                                                            <option value="6">6 PISOS</option>
                                                            <option value="7">7 PISOS</option>
                                                            <option value="8">8 PISOS</option>
                                                        </x-adminlte-select>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>       
                                    </div>               
                                </x-adminlte-card>
                                <x-adminlte-card title="NORMATIVA" class="" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                    
                                        <div class="row ">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- ZONIFICACIÓN --}}
                                                        <label for="">ZONIFICACIÓN <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="zonificacionNormativa" id="zonificacionNormativa" required placeholder="Ingrese zonificación" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-map-pin text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- AREA E:U. --}}
                                                        <label for="">AREA E:U. <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="areaEuNormativa" id="areaEuNormativa" required placeholder="Ingrese área" label-class="text-lightblue">
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
                                                        {{-- ALTURA EDIFICACION --}}
                                                        <label for="">ALTURA EDIFICACION <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="alturaNormativa" id="alturaNormativa" placeholder="Ingrese altura" label-class="text-lightblue">
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
                                                        {{-- RETIRO --}}
                                                        <label for="">RETIRO <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="retiroNormativa" id="retiroNormativa" placeholder="Ingrese retiro" label-class="text-lightblue">
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
                                                        {{-- ÁREA LIBRE --}}
                                                        <label for="">ÁREA LIBRE <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="areaLibreNormativa" id="areaLibreNormativa" placeholder="Ingrese porcentaje" label-class="text-lightblue">
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
                                                        {{-- DENSIDAD --}}
                                                        <label for="">DENSIDAD <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="densidadNormativa" id="densidadNormativa" placeholder="Ingrese densidad" label-class="text-lightblue">
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
                                                        {{-- ESTACIONAMIENTO --}}
                                                        <label for="">ESTACIONAMIENTO <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="estacionamientoNormativa" id="estacionamientoNormativa" required placeholder="Ingrese estacionamiento" label-class="text-lightblue">
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
                                <x-adminlte-card title="PROYECTO" class="" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                    
                                        <div class="row ">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- ZONIFICACIÓN --}}
                                                        <label for="">ZONIFICACIÓN <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="zonificacionProyecto" id="zonificacionProyecto" required placeholder="Ingrese zonificación" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-map-pin text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- AREA E:U. --}}
                                                        <label for="">AREA E:U. <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="areaEuProyecto" id="areaEuProyecto" required placeholder="Ingrese área" label-class="text-lightblue">
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
                                                        {{-- ALTURA EDIFICACION --}}
                                                        <label for="">ALTURA EDIFICACION <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="alturaProyecto" id="alturaProyecto" placeholder="Ingrese altura" label-class="text-lightblue">
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
                                                        {{-- RETIRO --}}
                                                        <label for="">RETIRO <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="retiroProyecto" id="retiroProyecto" placeholder="Ingrese retiro" label-class="text-lightblue">
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
                                                        {{-- ÁREA LIBRE --}}
                                                        <label for="">ÁREA LIBRE <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="areaLibreProyecto" id="areaLibreProyecto" placeholder="Ingrese porcentaje" label-class="text-lightblue">
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
                                                        {{-- DENSIDAD --}}
                                                        <label for="">DENSIDAD <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="densidadProyecto" id="densidadProyecto" placeholder="Ingrese densidad" label-class="text-lightblue">
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
                                                        {{-- ESTACIONAMIENTO --}}
                                                        <label for="">ESTACIONAMIENTO <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="estacionamientoProyecto" id="estacionamientoProyecto" required placeholder="Ingrese estacionamiento" label-class="text-lightblue">
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
                                                        {{-- OBSERVACIÓN --}}
                                                        <label for="">OBSERVACIÓN </label>
                                                        <x-adminlte-input type="text" name="observaciones" id="observaciones" required placeholder="Este campo es opcional" label-class="text-lightblue">
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
                                <!-- <x-adminlte-card title="PISO 1" class="" name="formPiso1" id="formPiso1" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                    
                                        <div class="row ">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- ANTIGUEDAD --}}
                                                        <label for="">ANTIGUEDAD <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="antiguedadPiso1" id="antiguedadPiso1" required placeholder="Complete el campo" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-map-pin text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- MURO Y COLUMNA --}}
                                                        <label for="">MURO Y COLUMNA <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="muroColumnaPiso1" id="muroColumnaPiso1" required placeholder="Complete el campo" label-class="text-lightblue">
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
                                                        {{-- TECHOS --}}
                                                        <label for="">TECHOS <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="techosPiso1" id="techosPiso1" placeholder="Complete el campo" label-class="text-lightblue">
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
                                                        {{-- PISO --}}
                                                        <label for="">PISO <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="pisoPiso1" id="pisoPiso1" placeholder="Complete el campo" label-class="text-lightblue">
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
                                                        {{-- PUERTAS Y VENTANAS --}}
                                                        <label for="">PUERTAS Y VENTANAS <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="puertasVentanasPiso1" id="puertasVentanasPiso1" placeholder="Complete el campo" label-class="text-lightblue">
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
                                                        {{-- REVESTIMIENTO --}}
                                                        <label for="">REVESTIMIENTO <strong style="color:red">*</strong></label>
                                                        <x-adminlte-input type="text" name="revestimientoPiso1" id="revestimientoPiso1" placeholder="Complete el campo" label-class="text-lightblue">
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
                                                        {{-- BAÑO --}}
                                                        <label for="">BAÑO <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="banoPiso1" id="banoPiso1" required placeholder="Complete el campo" label-class="text-lightblue">
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
                                                        {{-- INSTALACIONES ELECT. Y SANITARIA --}}
                                                        <label for="">INSTALACIONES ELECT. Y SANITARIA <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="instElectPiso1" id="instElectPiso1" required placeholder="Complete el campo" label-class="text-lightblue">
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
                                                        {{-- ÁREA CONSTRUIDA M² --}}
                                                        <label for="">ÁREA CONSTRUIDA M² <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="areaConstruidaPiso1" id="areaConstruidaPiso1" required placeholder="Complete el campo" label-class="text-lightblue">
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
                                </x-adminlte-card> -->
                                <div id="duplicatesContainer"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary" name="btnRegistrar" id="btnRegistrar" type="submit">
                                        <i class="fas fa-check-double"></i>
                                        Registrar
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

<script>
    // Función para duplicar el contenido del card según la cantidad seleccionada
    function duplicateCards() {
        const cantidadPisos = parseInt(document.getElementById('cantidadPisos').value);
        const cardTemplate = `
            <x-adminlte-card title="PISO {i}" class="" name="formPiso{i}" id="formPiso{i}" theme="dark" icon="fas fa-id-card">
                <div class="col-12 ">                    
                    <div class="row ">
                        <div class="col-md-3" class="">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- ANTIGUEDAD --}}
                                    <label for="">ANTIGUEDAD <strong style="color:red">*</strong> </label>  
                                    <x-adminlte-input type="text" name="antiguedadPiso{i}" id="antiguedadPiso{i}" required placeholder="Complete el campo" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-map-pin text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" class="">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- MURO Y COLUMNA --}}
                                    <label for="">MURO Y COLUMNA <strong style="color:red">*</strong> </label>  
                                    <x-adminlte-input type="text" name="muroColumnaPiso{i}" id="muroColumnaPiso{i}" required placeholder="Complete el campo" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-id-card text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" class="">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- TECHOS --}}
                                    <label for="">TECHOS <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="techosPiso{i}" id="techosPiso{i}" placeholder="Complete el campo" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-id-card text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" class="">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- PISO --}}
                                    <label for="">PISO <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="pisoPiso{i}" id="pisoPiso{i}" placeholder="Complete el campo" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-id-card text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" class="">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- PUERTAS Y VENTANAS --}}
                                    <label for="">PUERTAS Y VENTANAS <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="puertasVentanasPiso{i}" id="puertasVentanasPiso{i}" placeholder="Complete el campo" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-id-card text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" class="">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- REVESTIMIENTO --}}
                                    <label for="">REVESTIMIENTO <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="revestimientoPiso{i}" id="revestimientoPiso{i}" placeholder="Complete el campo" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-id-card text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" class="">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- BAÑO --}}
                                    <label for="">BAÑO <strong style="color:red">*</strong> </label>
                                    <x-adminlte-input type="text" name="banoPiso{i}" id="banoPiso{i}" required placeholder="Complete el campo" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-id-card text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" class="">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- INSTALACIONES ELECT. Y SANITARIA --}}
                                    <label for="">INSTALACIONES ELECT. Y SANITARIA <strong style="color:red">*</strong> </label>
                                    <x-adminlte-input type="text" name="instElectPiso{i}" id="instElectPiso{i}" required placeholder="Complete el campo" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-id-card text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" class="">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- ÁREA CONSTRUIDA M² --}}
                                    <label for="">ÁREA CONSTRUIDA M² <strong style="color:red">*</strong> </label>
                                    <x-adminlte-input type="text" name="areaConstruidaPiso{i}" id="areaConstruidaPiso{i}" required placeholder="Complete el campo" label-class="text-lightblue">
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
        `;

        let allCards = '';
        for (let i = 1; i <= cantidadPisos; i++) {
            const cardHtml = cardTemplate.replace(/{i}/g, i);
            allCards += cardHtml;
        }

        document.getElementById('duplicatesContainer').innerHTML = allCards;
    }

    // Escuchar el evento de cambio en el combobox y duplicar los cards cuando cambie
    document.getElementById('cantidadPisos').addEventListener('change', duplicateCards);

    // Llamar a la función inicialmente para mostrar el número predeterminado de cards
    duplicateCards();
</script>
@stop