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
                            <x-adminlte-card title="DATOS" class="" theme="gray" icon="fas fa-id-card">
                                <div class="col-12">                                       
                                    <div class="row ">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- NOMBRES Y APELLIDOS --}}
                                                    <label>NOMBRES Y APELLIDOS <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="nombreCompleto" id="nombreCompleto" value="{{$data->nombreCompleto}}" required placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
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
                                                    <label>DNI <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="numdoc" id="numdoc" value="{{$data->numdoc}}" required  placeholder="Ingresar dni" label-class="text-lightblue">
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
                                                    {{-- ESTADO CIVIL --}}
                                                    <label>ESTADO CIVIL <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-select type="text" name="estadoCivil" id="estadoCivil" required placeholder="Ingresar dni" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                        <option value="{{$data->estadoCivil}}">{{$data->estadoCivil}}</option>
                                                        <option value="s">Soltero</option>
                                                        <option value="c">Casado/Conviviente</option>
                                                    </x-adminlte-select>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- ZONA --}}
                                                    <label>ZONA <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-select type="text" name="zona" id="zona" required placeholder="Ingresar dni" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                        <option value="{{$data->zona}}">{{$data->zona}}</option>
                                                        <option value="Z1">1</option>
                                                        <option value="Z2">2</option>
                                                        <option value="Z3">3</option>
                                                        <option value="Z4">4</option>
                                                        <option value="Z5">5</option>
                                                        <option value="RE">RETAMAL</option>
                                                    </x-adminlte-select>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- N° DE INFORME --}} 
                                                    <label>N° DE INFORME <strong style="color:red">*</strong> </label>                                      
                                                    <x-adminlte-input type="text" name="numInforme" id="numInforme" value="{{$data->numInforme}}" required placeholder="0000" label-class="text-lightblue">
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
                                                    {{-- EXPEDIENTE --}}
                                                    <label>EXPEDIENTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="numExpediente" id="numExpediente" value="{{$data->numExpediente}}" required  placeholder="0000" label-class="text-lightblue">
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
                                                    {{-- LOTE --}}
                                                    <label>LOTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="lote" id="lote" value="{{$data->lote}}" required placeholder="Ingresar Expediente" label-class="text-lightblue">
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
                                                    {{-- MANZANA --}}
                                                    <label>MANZANA <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="manzana" id="manzana" value="{{$data->manzana}}" required placeholder="Ingresar Expediente" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>  
                                                </div>
                                            </div>
                                        </div>
                                        <?php $fechaInforme = date('Y-m-d', strtotime($data->fechaInforme)); ?>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- FECHA DE INFORME --}}
                                                    <label>FECHA DE INFORME <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="date" name="fechaInforme" id="fechaInforme" value="<?php echo $fechaInforme; ?>" required label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>  
                                                </div>
                                            </div>
                                        </div>
                                        <?php $fechaExpediente = date('Y-m-d', strtotime($data->fechaExpediente)); ?>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- FECHA DE EXPEDIENTE --}}
                                                    <label>FECHA DE EXPEDIENTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="date" name="fechaExpediente" id="fechaExpediente" value="<?php echo $fechaExpediente; ?>" required label-class="text-lightblue">
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
                                                    {{-- UBICACIÓN --}} 
                                                    <label>UBICACIÓN <strong style="color:red">*</strong> </label>                                      
                                                    <x-adminlte-select type="text" name="ubicacion" id="ubicacion" required label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                        <option>{{$data->ubicacion}}</option>
                                                    </x-adminlte-select>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- ÁREA DEL PREDIO --}}
                                                    <label>ÁREA DEL PREDIO <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="areaPredio" id="areaPredio" value="{{$data->areaPredio}}" required placeholder="Ingrese área en m²" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>  
                                                </div>
                                            </div>
                                        </div>
                                        <?php $fechaIngreso = date('Y-m-d', strtotime($data->fechaIngreso)); ?>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- FECHA DE INGRESO --}}
                                                    <label>FECHA DE INGRESO <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="date" name="fechaIngreso" id="fechaIngreso"  value="<?php echo $fechaIngreso; ?>" required readonly="readonly" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 civil">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- ACOMPAÑANTE --}}
                                                    <label>ACOMPAÑANTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="partner" id="partner" value="{{ $data->partner }}" required placeholder="Ingrese acompañante" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 civil">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{--  DNI ACOMPAÑANTE --}}
                                                    <label>DNI ACOMPAÑANTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="dniPartner" id="dniPartner" value="{{ $data->dniPartner }}" required  placeholder="Ingrese dni" label-class="text-lightblue">
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

<script>
    $("#zona").on("change", function(){
        
        $("#ubicacion").html("");
        var zona = $("#zona").val();
        var url = "{{ route('getSector', ':zona') }}";                
        url = url.replace(':zona', zona);
        /* console.log(url); */
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function (response) {
                /* console.log(response['0'].nombre); */
                response.forEach(element => {
                    $("#ubicacion").append("<option value='"+element.nombreUbicacion+"'>"+element.nombreUbicacion+"</option>");
                })

                /* $("#cSect").val(element.codSector);
                console.log(response['0'].codSector); */
            /* $("#cSect").val(element.cod); */
            }
        });
    });

</script>

@stop