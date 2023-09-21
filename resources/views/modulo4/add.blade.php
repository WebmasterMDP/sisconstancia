@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>PARÁMETROS URBANÍSTICOS Y EDIFICATORIOS</h1>
@stop

@section('content')
<br>
<x-adminlte-card title="REGISTRO CERTIFICADO DE PARÁMETROS URBANÍSTICOS Y EDIFICATORIOS" class="m-2" theme="dark" icon="fas fa-id-card">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    Campos obligatorios ('<strong style="color:red">*</strong>') 
                </div>
                <div class="col-12">
                    <form action="{{ route('parametro.store')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="card-body">                                
                            <div class="row "> 
                                <x-adminlte-card title="INFORMACION DEL SOLICITANTE" class="" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                                       
                                        <div class="row ">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for=""> TITULAR <strong style="color:red">*</strong> </label>                                   
                                                        <x-adminlte-input type="text" name="name" id="name" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
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
                                            <?php $today = new DateTime(); ?>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- FECHA DE EMISIÓN --}} 
                                                        <label for="">FECHA DE EMISIÓN <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="date" name="fechaEmision" id="fechaEmision" value="<?php echo $today->format('Y-m-d'); ?>" required label-class="text-lightblue" readonly="readonly">
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
                                                        {{-- DIRECCIÓN --}}
                                                        <label for="">DIRECCIÓN <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="direccion" id="direccion" required  placeholder="Ingresar dirección" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $fechaactual = date('Y-m-d');
                                            $nuevafecha = strtotime ('+3 year' , strtotime($fechaactual)); //Se añade un año mas
                                            $nuevafecha = date ('Y-m-d',$nuevafecha); 
                                            ?>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- FECHA DE VENCIMIENTO --}} 
                                                        <label for="">FECHA DE VENCIMIENTO <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="date" name="fechaVencimiento" id="fechaVencimiento" value="<?php echo $nuevafecha; ?>" readonly="readonly" required label-class="text-lightblue">
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
                                                        {{-- N° PARTIDA  --}}
                                                        <label for="">N° PARTIDA <strong style="color:red">*</strong> </label>                                       
                                                        <x-adminlte-input type="text" name="numPartida" id="numPartida" required placeholder="Ingrese n° partida" label-class="text-lightblue">
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
                                                        {{-- N° INFORME  --}}
                                                        <label for="">N° INFORME <strong style="color:red">*</strong> </label>                                       
                                                        <x-adminlte-input type="text" name="numInforme" id="numInforme" required placeholder="Ingrese n° informe" label-class="text-lightblue">
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
                                        </div>       
                                    </div>               
                                </x-adminlte-card>
                                <x-adminlte-card title="INFORMACIÓN TECNICA" class="" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                                       
                                        <div class="row ">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for=""> ÁREA TERRITORIAL <strong style="color:red">*</strong> </label>                                   
                                                        <x-adminlte-input type="text" name="areaTerritorial" id="areaTerritorial" required placeholder="Ingresar área territorial" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for=""> ÁREA DE TRATAMIENTO NORMATIVO <strong style="color:red">*</strong> </label>                                   
                                                        <x-adminlte-input type="text" name="areaTratamientoNormativo" id="areaTratamientoNormativo" required placeholder="Ingresar área" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for=""> ZONIFICACIÓN <strong style="color:red">*</strong> </label>                                   
                                                        <x-adminlte-input type="text" name="zonificacion" id="zonificacion" required placeholder="Ingresar zonificación" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for=""> FRENTE DE LOTE MÍNIMO<strong style="color:red">*</strong> </label>                                   
                                                        <x-adminlte-input type="text" name="frenteLoteMininmo" id="frenteLoteMininmo" required placeholder="Ingresar dato" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for=""> ESTACIONAMIENTO <strong style="color:red">*</strong> </label>                                   
                                                        <x-adminlte-input type="text" name="estacionamiento" id="estacionamiento" required placeholder="Ingresar estacionamiento" label-class="text-lightblue">
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
                                        <x-adminlte-card title="USO DE SUELO PERMISIBLE Y COMPATIBLES" class="" theme="dark" icon="fas fa-id-card">
                                            <div class="col-12">                                       
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for=""> VIVIENDA UNIFAMILIAR, COMERCIO VECINAL Y ZONAL <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="viviendaUnfComercio1" id="viviendaUnfComercio1" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                                    <x-slot name="prependSlot">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-id-card text-dark"></i>
                                                                        </div>
                                                                    </x-slot>
                                                                </x-adminlte-input>  
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for=""> COJUNTO RESIDENCIALES Y MULTIFAMILIARES <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="conjuntoResidencial1" id="conjuntoResidencial1" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                                    <x-slot name="prependSlot">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-id-card text-dark"></i>
                                                                        </div>
                                                                    </x-slot>
                                                                </x-adminlte-input>  
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for=""> CONJUNTO RESIDENCIAL O CONDOMINIOS <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="conjuntoCondominios1" id="conjuntoCondominios1" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
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
                                        <x-adminlte-card title="PORCENTAJE MÍNIMO DE ÁREA LIBRE" class="" theme="dark" icon="fas fa-id-card">
                                            <div class="col-12">                                       
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for=""> VIVIENDA UNIFAMILIAR, COMERCIO VECINAL Y ZONAL <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="viviendaUnfComercio2" id="viviendaUnfComercio2" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                                    <x-slot name="prependSlot">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-id-card text-dark"></i>
                                                                        </div>
                                                                    </x-slot>
                                                                </x-adminlte-input>  
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for=""> COJUNTO RESIDENCIALES Y MULTIFAMILIARES <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="conjuntoResidencial2" id="conjuntoResidencial2" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                                    <x-slot name="prependSlot">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-id-card text-dark"></i>
                                                                        </div>
                                                                    </x-slot>
                                                                </x-adminlte-input>  
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for=""> CONJUNTO RESIDENCIAL O CONDOMINIOS <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="conjuntoCondominios2" id="conjuntoCondominios2" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
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
                                        <x-adminlte-card title="ALTURA MÁXIMA" class="" theme="dark" icon="fas fa-id-card">
                                            <div class="col-12">                                       
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for=""> VIVIENDA UNIFAMILIAR, COMERCIO VECINAL Y ZONAL <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="viviendaUnfComercio3" id="viviendaUnfComercio3" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                                    <x-slot name="prependSlot">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-id-card text-dark"></i>
                                                                        </div>
                                                                    </x-slot>
                                                                </x-adminlte-input>  
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for=""> COJUNTO RESIDENCIALES Y MULTIFAMILIARES <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="conjuntoResidencial3" id="conjuntoResidencial3" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                                    <x-slot name="prependSlot">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-id-card text-dark"></i>
                                                                        </div>
                                                                    </x-slot>
                                                                </x-adminlte-input>  
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for=""> CONJUNTO RESIDENCIAL O CONDOMINIOS <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="conjuntoCondominios3" id="conjuntoCondominios3" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
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
                                        <x-adminlte-card title="RETIROS" class="" theme="dark" icon="fas fa-id-card">
                                            <div class="col-12">                                       
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="">FRENTE A AVENIDAS <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="frenteAvenidas" id="frenteAvenidas" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                                    <x-slot name="prependSlot">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-id-card text-dark"></i>
                                                                        </div>
                                                                    </x-slot>
                                                                </x-adminlte-input>  
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="">FRENTE A CALLES <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="frenteCalles" id="frenteCalles" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
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
                                        <x-adminlte-card title="ÁREA DE LOTE NORMATIVO" class="" theme="dark" icon="fas fa-id-card">
                                            <div class="col-12">                                       
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for=""> VIVIENDA UNIFAMILIAR, COMERCIO VECINAL Y ZONAL <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="viviendaUnfComercio4" id="viviendaUnfComercio4" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                                    <x-slot name="prependSlot">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-id-card text-dark"></i>
                                                                        </div>
                                                                    </x-slot>
                                                                </x-adminlte-input>  
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for=""> COJUNTO RESIDENCIALES Y MULTIFAMILIARES <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="conjuntoResidencial4" id="conjuntoResidencial4" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                                    <x-slot name="prependSlot">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-id-card text-dark"></i>
                                                                        </div>
                                                                    </x-slot>
                                                                </x-adminlte-input>  
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for=""> CONJUNTO RESIDENCIAL O CONDOMINIOS <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="conjuntoCondominios4" id="conjuntoCondominios4" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
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
                </div>
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
    $("#getSunatDatos").on("click", function(){
            var ruc = $("#ruc").val();
            var url = "{{ route('getSunatDatos', ':ruc') }}";                
            url = url.replace(':ruc', ruc);
            
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    var datosNull = response.list.multiRef['cod_dep']['@nil'];

                    if (datosNull) {
                        Swal.fire({
                        icon: 'error',
                        title:'Oops...',
                        text: 'Datos no encontrados',
                        })

                    }else{
                        /* alert('Datos Encontrados'); */
                        responseDatosSunat = response.list.multiRef;

                        console.log(responseDatosSunat);
                        console.log(responseDatosSunat["nombre"]["$"]);

                        /* $("#apeNombre").val(responseDatosSunat["ddp_nombre"]["$"]);
                        Swal.fire(
                        'Exito!',
                        'Datos encontrados',
                        'success')
                        return false; */
                    }
                }
            });
        });
</script>
@stop