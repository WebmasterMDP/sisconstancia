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
                    <form action="{{ route('conformidad.update', $data->id)}}" method="POST" autocomplete="off">
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
                                                        <x-adminlte-input type="text" name="edificacion" id="edificacion" value="{{ $data->tipo_edificacion }}" required placeholder="Ingrese tipo de edificación" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="expediente" id="expediente" value="{{ $data->expediente }}" required placeholder="Ingrese n° de expediente" readonly="readonly" label-class="text-lightblue">
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
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- PROPIETARIO --}}
                                                        <label for="">PROPIETARIO <strong style="color:red">*</strong></label>  
                                                        <x-adminlte-input type="text" name="propietario" id="propietario" value="{{ $data->propietario }}" placeholder="Ingrese propietario" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="resolucion" id="resolucion" value="{{ $data->num_resolucion }}" required placeholder="Ingrese resolución" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="numLicencia" id="numLicencia" value="{{ $data->num_licencia }}" required placeholder="Ingrese n° de licencia" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="ubicacion" id="ubicacion" value="{{ $data->ubicacion }}" required placeholder="Ingrese ubicación" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="areaConstruida" id="areaConstruida" value="{{ $data->area_construida }}" required placeholder="Ingrese en m²" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="areaTerreno" id="areaTerreno" value="{{ $data->area_terreno }}" required placeholder="Ingrese en m²" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="valorObra" id="valorObra" value="{{ $data->valor_obra }}" required placeholder="Ingrese valor" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="otro" id="otro" value="{{ $data->otros }}" required minlength="8" placeholder="Este campo es opcional" label-class="text-lightblue">
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
                                                            <option value="{{ $data->cantidad_pisos }}">{{ $data->cantidad_pisos }} PISO</option>
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
                                                        <x-adminlte-input type="text" name="zonificacionNormativa" id="zonificacionNormativa" value="{{ $data->zonificacion_normativa }}" required placeholder="Ingrese zonificación" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="areaEuNormativa" id="areaEuNormativa" value="{{ $data->area_eu_normativa }}" required placeholder="Ingrese área" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="alturaNormativa" id="alturaNormativa" value="{{ $data->altura_edif_normativa }}" placeholder="Ingrese altura" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="retiroNormativa" id="retiroNormativa" value="{{ $data->retiro_normativa }}" placeholder="Ingrese retiro" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="areaLibreNormativa" id="areaLibreNormativa" value="{{ $data->area_libre_normativa }}" placeholder="Ingrese porcentaje" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="densidadNormativa" id="densidadNormativa" value="{{ $data->densidad_normativa }}" placeholder="Ingrese densidad" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="estacionamientoNormativa" id="estacionamientoNormativa" value="{{ $data->estacionamiento_normativa }}" required placeholder="Ingrese estacionamiento" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="zonificacionProyecto" id="zonificacionProyecto" value="{{ $data->zonificacion_proyecto }}" required placeholder="Ingrese zonificación" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="areaEuProyecto" id="areaEuProyecto" value="{{ $data->area_eu_proyecto }}" required placeholder="Ingrese área" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="alturaProyecto" id="alturaProyecto" value="{{ $data->altura_edif_proyecto }}" placeholder="Ingrese altura" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="retiroProyecto" id="retiroProyecto" value="{{ $data->retiro_proyecto }}" placeholder="Ingrese retiro" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="areaLibreProyecto" id="areaLibreProyecto" value="{{ $data->area_libre_proyecto }}" placeholder="Ingrese porcentaje" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="densidadProyecto" id="densidadProyecto" value="{{ $data->densidad_proyecto }}" placeholder="Ingrese densidad" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="estacionamientoProyecto" id="estacionamientoProyecto" value="{{ $data->estacionamiento_proyecto }}" required placeholder="Ingrese estacionamiento" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="observaciones" id="observaciones" value="{{ $data->observaciones }}" required placeholder="Este campo es opcional" label-class="text-lightblue">
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
                                <!-- foreach ($pisosData as $index => $piso) -->
                                <!-- @for ($i = 0; $i < $data->cantidad_pisos; $i++)
                                    <x-adminlte-card title="PISO {{ $i + 1 }}" class="" name="formPiso{{ $i + 1 }}" id="formPiso{{ $i + 1 }}" theme="dark" icon="fas fa-id-card">
                                        <div class="col-12">
                                            <div class="row">
                                                @foreach ($valoresPisos as $valores)
                                                    @foreach ($valores as $atributo => $valoresAtributo)
                                                        @if (isset($valoresAtributo[$i]))
                                                            <div class="col-md-3">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        @if($atributo == 'antiguedad')

                                                                            <label for="">ANTIGUEDAD <strong style="color:red">*</strong></label>
                                                                        @elseif($atributo == 'muro_columna')
                                                                            <label for="">MURO Y COLUMNA <strong style="color:red">*</strong></label>
                                                                        @elseif($atributo == 'techos')
                                                                            <label for="">TECHOS <strong style="color:red">*</strong></label>
                                                                        @elseif($atributo == 'piso')
                                                                            <label for="">PISO <strong style="color:red">*</strong></label>
                                                                        @elseif($atributo == 'puerta_ventana')
                                                                            <label for="">PUERTAS Y VENTANAS<strong style="color:red">*</strong></label>
                                                                        @elseif($atributo == 'revestimiento')
                                                                            <label for="">REVESTIMIENTO<strong style="color:red">*</strong></label> 
                                                                        @elseif($atributo == 'bano')
                                                                            <label for="">BAÑO<strong style="color:red">*</strong></label>
                                                                        @elseif($atributo == 'inst_elect')
                                                                            <label for="">INSTALACION ELECT. Y SANT.<strong style="color:red">*</strong></label>
                                                                        @elseif($atributo == 'area_construida')
                                                                            <label for="">AREA CONSTRUIDA M2<strong style="color:red">*</strong></label>
                                                                        @endif
                                                                        <x-adminlte-input type="text" name="{{ $atributo }}{{ $i + 1 }}" value="{{ $valoresAtributo[$i] }}" placeholder="Complete el campo" label-class="text-lightblue">
                                                                            <x-slot name="prependSlot">
                                                                                <div class="input-group-text">
                                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                                </div>
                                                                            </x-slot>
                                                                        </x-adminlte-input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </x-adminlte-card>
                                @endfor -->
                                <div id="duplicatesContainer"></div>
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
<div id="data" data-id="{{ $data->id }}"></div>
@stop

@section('css')
@stop

@section('js')
<script>
    function updateCards() {
        const cantidadPisos = parseInt(document.getElementById('cantidadPisos').value);
        let cardsHtml = '';

        @for ($i = 0; $i < $data->cantidad_pisos; $i++)
            const antiguedadValue{{$i}} = @json($valoresPisos[0]['antiguedad'][$i]);
            const muroColumnaValue{{$i}} = @json($valoresPisos[0]['muro_columna'][$i]);
            const techosValue{{$i}} = @json($valoresPisos[0]['techos'][$i]);
            const pisoValue{{$i}} = @json($valoresPisos[0]['piso'][$i]);
            const puertaVentanaValue{{$i}} = @json($valoresPisos[0]['puerta_ventana'][$i]);
            const revestimientoValue{{$i}} = @json($valoresPisos[0]['revestimiento'][$i]);
            const banoValue{{$i}} = @json($valoresPisos[0]['bano'][$i]);
            const instElectValue{{$i}} = @json($valoresPisos[0]['inst_elect'][$i]);
            const areaConstruidaValue{{$i}} = @json($valoresPisos[0]['area_construida'][$i]);

            cardsHtml += `
            <x-adminlte-card title="PISO {{$i + 1}}" class="" name="formPiso{{$i + 1}}" id="formPiso{{$i + 1}}" theme="dark" icon="fas fa-id-card">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">ANTIGUEDAD <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="antiguedad{{$i + 1}}" value="${antiguedadValue{{$i}}}" placeholder="Complete el campo" label-class="text-lightblue">
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
                                    <label for="">MURO Y COLUMNA <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="muro_columna{{$i + 1}}" value="${muroColumnaValue{{$i}}}" placeholder="Complete el campo" label-class="text-lightblue">
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
                                    <label for="">TECHOS <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="techos{{$i + 1}}" value="${techosValue{{$i}}}" placeholder="Complete el campo" label-class="text-lightblue">
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
                                    <label for="">PISO <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="piso{{$i + 1}}" value="${pisoValue{{$i}}}" placeholder="Complete el campo" label-class="text-lightblue">
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
                                    <label for="">PUERTAS Y VENTANAS <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="puerta_ventana{{$i + 1}}" value="${puertaVentanaValue{{$i}}}" placeholder="Complete el campo" label-class="text-lightblue">
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
                                    <label for="">REVESTIMIENTO <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="revestimiento{{$i + 1}}" value="${revestimientoValue{{$i}}}" placeholder="Complete el campo" label-class="text-lightblue">
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
                                    <label for="">BAÑO <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="bano{{$i + 1}}" value="${banoValue{{$i}}}" placeholder="Complete el campo" label-class="text-lightblue">
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
                                    <label for="">INSTALACIONES ELECT. Y SANT. <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="inst_elect{{$i + 1}}" value="${instElectValue{{$i}}}" placeholder="Complete el campo" label-class="text-lightblue">
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
                                    <label for="">AREA CONSTRUIDA M2 <strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" name="area_construida{{$i + 1}}" value="${areaConstruidaValue{{$i}}}" placeholder="Complete el campo" label-class="text-lightblue">
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
        @endfor

        document.getElementById('duplicatesContainer').innerHTML = cardsHtml;
    }
    document.getElementById('cantidadPisos').addEventListener('change', updateCards);

    updateCards();
</script>

<script>
    $('#cantidadPisos').on('change', function() {
    const nuevaCantidadPisos = $(this).val();
    const dataId = $('#data').data('id');
    
    // Construir la URL de la solicitud AJAX
    var url = "{{ route('actualizar.pisos', [':id', ':pisos']) }}";
    url = url.replace(':id', dataId);
    url = url.replace(':pisos', nuevaCantidadPisos);

            $.ajax({
            type: "GET",
            url: url,
            data: {
                nuevaCantidadPisos: nuevaCantidadPisos
            },
            dataType: "json", 
            success: function(response) {
                $('#duplicatesContainer').html(response.html);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
</script>

@stop