@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
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
                    <form action="" method="POST" autocomplete="off">
                        @csrf
                        <div class="card-body">                                
                            <div class="row "> 
                                <x-adminlte-card title="DATOS" class="" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                                       
                                        <div class="row ">
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">VIGENCIA <strong style="color:red">*</strong> </label>                                   
                                                        <x-adminlte-select type="text" name="vigencia" id="vigencia" required placeholder="Vigencia" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                            <option>-- selecione --</option>
                                                            <option>INDETERMINADA</option>
                                                            <option>UN (01) AÑO</option>
                                                            <option>DOS (02) AÑOS</option>
                                                            <option>CUATRO (04) AÑOS</option>
                                                            <option>CINCO (05) AÑOS</option>
                                                            <option>CESE (BAJA DE LICENCIA)</option>
                                                            <option>ANULADO</option>
                                                        </x-adminlte-select>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- Natural/Juridica --}} 
                                                        <label for="">NATURAL/JURÍRIDCA <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-select type="text" name="natJurid" id="natJurid" required placeholder="Natural / Juridica" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                            <option>-- selecione --</option>
                                                            <option value="NATURAL">NATURAL</option>
                                                            <option value="JURIDICA">JURIDICA</option>
                                                        </x-adminlte-select>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- Expediente --}}
                                                        <label for="">EXPEDIENTE <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="expediente" id="expediente" required  placeholder="Expediente" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- Asunto --}}
                                                        <label for="">ASUNTO <strong style="color:red">*</strong> </label>                                     
                                                        <x-adminlte-select type="text" name="asunto" id="asunto" required placeholder="Asunto" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                            <option>-- selecione --</option>
                                                            <option>LICENCIA DE FUNCIONAMIENTO INDETERMINADA</option>
                                                            <option>LICENCIA DE FUNCIONAMIENTO TEMPORAL</option>
                                                            <option>LICENCIA DE FUNCIONAMIENTO MAS AUTORIZACION DE ANUNCIO PUBLICITARIO</option>
                                                            <option>LICENCIA DE CESIONARIO</option>
                                                            <option>LICENCIA PARA MERCADO DE ABASTOS, GALERIAS COMERCIALES Y CENTRO COMERCIALES</option>
                                                            <option>CAMBIO DE DENOMINACION O NOMBRE COMERCIAL DE LA PERSONA JURIDICA</option>
                                                            <option>TRANSFERENCIA DE LICENCIA DE FUNCIONAMIENTO</option>
                                                            <option>CESE DE ACTIVIDADES</option>
                                                            <option>OTROS (ESPECIFICAR)</option>
                                                        </x-adminlte-select>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- Fecha Expediente --}} 
                                                        <label for="">FECHA DE EXPEDIENTE <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="date" name="fechaExped" id="fechaExped" required placeholder="Ingrese Fecha" label-class="text-lightblue">
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
                                                        {{-- Telefono --}}
                                                        <label for="">TELÉFONO</label>  
                                                        <x-adminlte-input type="number" name="telefono" id="telefono" placeholder="Ingrese telefono" label-class="text-lightblue">
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
                                                        {{-- Resolucion --}} 
                                                        <label for="">RESOLUCIÓN <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="text" name="resolucion" id="resolucion" required placeholder="Resolucion" label-class="text-lightblue">
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
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- Fecha Resolucion --}} 
                                                        <label for="">FECHA RESOLUCIÓN <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="date" name="fechaResol" id="fechaResol" value="<?php echo $today->format('Y-m-d'); ?>" placeholder="Resolucion" label-class="text-lightblue" readonly="readonly">
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
                                                        {{-- RUC --}} 
                                                        <label for="">RUC <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="text" name="ruc" id="ruc" required placeholder="Ingrese RUC" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                            <x-slot name="appendSlot">
                                                                {{-- <div class="input-group-text">
                                                                    <i class="fas fa-search text-dark"></i>
                                                                </div> --}}
                                                                <a href="#" data-href="" class="btn btn-dark" id="getSunatDatos" required name="getSunatDatos" data-target="#getSunatDatos" data-placement="top" title="Cargar Registro">
                                                                <span class="fas fa-search"></span>
                                                                </a>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- Apellidos y Nombres --}}
                                                        <label for="">APELLIDOS Y NOMBRES / RAZON SOCIAL <strong style="color:red">*</strong> </label>                                       
                                                        <x-adminlte-input type="text" name="apeNombre" id="apeNombre" required placeholder="Ingrese apellidos y nombres" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-user text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- DNI / CE --}}
                                                        <label for="">DNI / CE <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="number" name="dni" id="dni" required minLength="8" placeholder="Ingrese DNI" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 juridica">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- Representante legal --}}
                                                        <label for="">REPRESENTANTE LEGAL <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="repLegal" id="repLegal" required placeholder="Representante Legal" label-class="text-lightblue">
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
                                                        {{-- DNI Rep Legal --}}
                                                        <label for="">DNI / REP. LEG. <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="number" name="dniRepLegal" id="dniRepLegal" required minlength="8" placeholder="Representante Legal" label-class="text-lightblue">
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
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- Direccion del Establecimiento --}}
                                                        <label for="">DIRECCION DEL ESTABLECIMIENTO <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="dirEstable" id="dirEstable" required placeholder="Ingrese dirección" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-map-pin text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- NOMBRE COMERCIAL --}}
                                                        <label for="">NOMBRE COMERCIAL <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="nomComercial" id="nomComercial" required placeholder="Ingrese Nombre" label-class="text-lightblue">
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
                                                        {{-- Nº --}}
                                                        <label for="">Nº</label>
                                                        <x-adminlte-input type="text" name="numero" id="numero" placeholder="Ingrese Nº" label-class="text-lightblue">
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
                                                        {{-- INT --}}
                                                        <label for="">INT</label>
                                                        <x-adminlte-input type="text" name="int" id="int" placeholder="Ingrese int" label-class="text-lightblue">
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
                                                        {{-- MZ --}}
                                                        <label for="">MZ</label>
                                                        <x-adminlte-input type="text" name="manzana" id="manzana" placeholder="Ingrese Mz." label-class="text-lightblue">
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
                                                        {{-- LT. --}}
                                                        <label for="">LT.</label>
                                                        <x-adminlte-input type="text" name="lote" id="lote" placeholder="Ingrese Lote" label-class="text-lightblue">
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
                                                        {{-- ZONA --}}
                                                        <label for="">ZONA <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-select type="text" name="zona" id="zona" required placeholder="Ingrese zona" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>

                                                            <option value="-">-</option>
                                                            <option value="1">1</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>

                                                        </x-adminlte-select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- SECTOR --}}
                                                        <label for="">SECTOR <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-select type="text" name="sector" id="sector" required placeholder="Ingrese sector" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                            <option value="">1</option>
                                                        </x-adminlte-select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- C.SECT. --}}
                                                        <label for="">C.SECT. <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="cSect" id="cSect" value="" required placeholder="Ingrese cSect" label-class="text-lightblue" readonly="readonly">
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
                                                        {{-- AREA --}}
                                                        <label for="">AREA <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input name="area" id="area" required placeholder="Ingrese area" label-class="text-lightblue">
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
                                                        {{-- NIVEL DE RIESGO --}}
                                                        <label for="">NIVEL DE RIESGO <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-select type="text" name="nivelRiesgo" id="nivelRiesgo" required onchange='cambioOpciones();' placeholder="Ingrese Nivel" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-exclamation-triangle text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                                <option value="-- seleccione --">--  seleccione --</option>
                                                                <option value="N. R. BAJO">N. R. BAJO</option>
                                                                <option value="N. R. MEDIO">N. R. MEDIO</option>
                                                                <option value="N. R. ALTO">N. R. ALTO</option>
                                                                <option value="N. R. MUY ALTO">N. R. MUY ALTO</option>
                                                        </x-adminlte-select>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- ZONIFICACION --}}
                                                        <label for="">ZONIFICACION <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-select type="text" name="zonificacion" id="zonificacion" required placeholder="Zonificacion" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-select>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- Giro del Establecimiento --}}
                                                        <label for="">GIRO DEL ESTABLECIMIENTO <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-select type="text" name="estable" id="estable" required placeholder="Ingrese giro" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- 2 --}}
                                                        <label for="">ESTABLECIMIENTO <strong style="color:red">*</strong></label>                                                          
                                                        <x-adminlte-textarea type="text" name="giroEstable" id="giroEstable" required  placeholder="Ingrese establecimiento" label-class="text-lightblue" readonly="readonly">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-map-pin text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                            <x-slot name="appendSlot">
                                                                <x-adminlte-button label="Limpiar" id="clear" name="clear" icon="fas fa-lg fa-ban text-danger"/>
                                                            </x-slot>                                                           
                                                        </x-adminlte-textarea>  
                                                    </div>
                                                </div>                                      
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- OBSERVACIONES --}}
                                                        <label for="">OBSERVACIONES </label>  
                                                        <x-adminlte-textarea type="text" name="observacion" id="observacion" placeholder="Ingrese observación" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-comment-dots text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-textarea>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- RECIBO DE PAGO --}}
                                                        <label for="">RECIBO DE PAGO <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input name="reciboPago" id="reciboPago" required placeholder="Ingrese recibo" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-receipt text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- FECHA PAGO --}}
                                                        <label for="">FECHA DE PAGO <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="date" name="fechaPago" id="fechaPago" required placeholder="Ingrese fecha" label-class="text-lightblue">
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
                                                        {{-- IMPORTE --}}
                                                        <label for="">IMPORTE <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input name="importe" id="importe" required placeholder="Ingrese importe" label-class="text-lightblue" readonly="readonly">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-coins text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="estado" name="estado" value="1">
                                            <input type="hidden" id="print" name="print" value="0">
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
@stop