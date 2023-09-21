@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>PARÁMETROS URBANÍSTICOS Y EDIFICATORIOS</h1>
@stop

@section('content')
<br>
<x-adminlte-card title="EDITAR REGISTRO CERTIFICADO DE PARÁMETROS URBANÍSTICOS Y EDIFICATORIOS" class="m-2" theme="dark" icon="fas fa-id-card">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    Campos obligatorios ('<strong style="color:red">*</strong>') 
                </div>
                <div class="col-12">
                    <form action="{{ route('parametro.update', $data->id)}}" method="POST" autocomplete="off">
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
                                                        <x-adminlte-input type="text" name="name" id="name" value="{{ $data->titular }}" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="expediente" id="expediente" value="{{ $data->expediente }}" required placeholder="Expediente" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="direccion" id="direccion" value="{{ $data->direccion }}" required placeholder="Ingresar dirección" label-class="text-lightblue">
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
                                                        {{-- FECHA DE VENCIMIENTO --}} 
                                                        <label for="">FECHA DE VENCIMIENTO <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="date" name="fechaVencimiento" id="fechaVencimiento" value="{{ $data->fecha_vencimiento }}" required label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="numPartida" id="numPartida" value="{{ $data->partida }}" required placeholder="Ingrese n° partida" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="numInforme" id="numInforme" value="{{ $data->num_informe }}" required placeholder="Ingrese n° informe" label-class="text-lightblue">
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
                                                        {{-- RUC --}} 
                                                        <label for="">RUC <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="text" name="ruc" id="ruc" value="{{ $data->numdoc }}" required placeholder="Ingrese RUC" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="areaTerritorial" id="areaTerritorial" value="{{ $data->area_territorial }}" required placeholder="Ingresar área territorial" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="areaTratamientoNormativo" id="areaTratamientoNormativo" value="{{ $data->area_tratamiento }}" required placeholder="Ingresar área" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="zonificacion" id="zonificacion" value="{{ $data->zonificacion }}" required placeholder="Ingresar zonificación" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="frenteLoteMininmo" id="frenteLoteMininmo" value="{{ $data->frente_lote }}" required  placeholder="Ingresar dato" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="estacionamiento" id="estacionamiento" value="{{ $data->estacionamiento }}" required placeholder="Ingresar estacionamiento" label-class="text-lightblue">
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
                                    <x-adminlte-card title="RETIROS" class="" theme="dark" icon="fas fa-id-card">
                                            <div class="col-12">                                       
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="">FRENTE A AVENIDAS <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="frenteAvenidas" id="frenteAvenidas" value="{{ $data->frente_avenida }}" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                                                    <x-slot name="prependSlot">
                                                                        <div class="input-group-text">
                                                                            <i class="fas fa-id-card text-dark"></i>
                                                                        </div>
                                                                    </x-slot>
                                                                </x-adminlte-input>  
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="">FRENTE A CALLES <strong style="color:red">*</strong> </label>                                   
                                                                <x-adminlte-input type="text" name="frenteCalles" id="frenteCalles" value="{{ $data->frente_calle }}" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
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
                                <div id="duplicatesContainer">
                                </div>
                                </x-adminlte-card>
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
    function updateCards() {
        let cardsHtml = '';

        @for ($i = 0; $i < 4; $i++)
            const vivienda{{$i}} = @json($valoresRows[0]['vivienda'][$i]);
            const residencial{{$i}} = @json($valoresRows[0]['residencial'][$i]);
            const condominio{{$i}} = @json($valoresRows[0]['condominio'][$i]);
            @php
                $titulos = [
                    'USO DE SUELO PERMISIBLE Y COMPATIBLES',
                    'PORCENTAJE MÍNIMO DE ÁREA LIBRE',
                    'ALTURA MÁXIMA',
                    'AREA DE LOTE NORMATIVO'
                ];
            @endphp

            cardsHtml += `
            <x-adminlte-card title="{{ $titulos[$i] }}" class="" name="" id="" theme="dark" icon="fas fa-id-card">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <label for=""> VIVIENDA UNIFAMILIAR, COMERCIO VECINAL Y ZONAL <strong style="color:red">*</strong> </label>                                   
                            <x-adminlte-input type="text" name="vivienda{{$i + 1}}" id="vivienda{{$i + 1}}" value="${vivienda{{$i}}}" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-id-card text-dark"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>  
                        </div>
                        <div class="col-md-12">
                            <label for=""> COJUNTO RESIDENCIALES Y MULTIFAMILIARES <strong style="color:red">*</strong> </label>                                   
                            <x-adminlte-input type="text" name="residencial{{$i + 1}}" id="residencial{{$i + 1}}" value="${residencial{{$i}}}" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-id-card text-dark"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>  
                        </div>
                        <div class="col-md-12">
                            <label for=""> CONJUNTO RESIDENCIAL O CONDOMINIOS <strong style="color:red">*</strong> </label>                                   
                            <x-adminlte-input type="text" name="condominio{{$i + 1}}" id="condominio{{$i + 1}}" value="${condominio{{$i}}}" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-id-card text-dark"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>  
                        </div>
                    </div>
                </div>
            </x-adminlte-card>
            `;
        @endfor

        document.getElementById('duplicatesContainer').innerHTML = cardsHtml;
    }

    updateCards();
</script>

@stop