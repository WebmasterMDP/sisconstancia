@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CONSTANCIA DE POSESIÓN</h1>
@stop

@section('content')
<br>
<x-adminlte-card title="REGISTRO DE CONSTANCIA" class="m-2" theme="dark" icon="fas fa-id-card">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    Campos obligatorios ('<strong style="color:red">*</strong>') 
                </div>
                <div class="col-12">
                    <form action="{{ route('constancia.store')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="card-body">                                
                            <x-adminlte-card title="DATOS" class="" theme="gray" icon="fas fa-id-card">
                                <div class="col-12">                                       
                                    <div class="row ">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- NOMBRES Y APELLIDOS --}}
                                                    <label for="">NOMBRES Y APELLIDOS <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="nombreCompleto" id="nombreCompleto" required  placeholder="Ingresar nombres y apellidos" label-class="text-lightblue">
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
                                                    <x-adminlte-input type="text" name="numdoc" id="numdoc" required  placeholder="Ingresar dni" label-class="text-lightblue">
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
                                                    <label for="">ESTADO CIVIL <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-select type="text" name="estadoCivil" id="estadoCivil" required  placeholder="Ingresar dni" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                        <option>--Seleccione--</option>
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
                                                    <label for="">ZONA <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-select type="text" name="zona" id="zona" required  placeholder="Ingresar dni" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-id-card text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                        <option>--Seleccione--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="RE">RETAMAL</option>
                                                    </x-adminlte-select>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- N° DE INFORME --}} 
                                                    <label for="">N° DE INFORME <strong style="color:red">*</strong> </label>                                      
                                                    <x-adminlte-input type="text" name="numInforme" id="numInforme" required placeholder="Ingrese informe" label-class="text-lightblue">
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
                                                    <label for="">EXPEDIENTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="numExpediente" id="numExpediente" required  placeholder="Ingresar Expediente" label-class="text-lightblue">
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
                                                    <label for="">LOTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="lote" id="lote" required  placeholder="Ingresar Expediente" label-class="text-lightblue">
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
                                                    <label for="">MANZANA <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="manzana" id="manzana" required  placeholder="Ingresar Expediente" label-class="text-lightblue">
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
                                                    {{-- FECHA DE INFORME --}}
                                                    <label for="">FECHA DE INFORME <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="date" name="fechaInforme" id="fechaInforme" required label-class="text-lightblue">
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
                                                    {{-- FECHA DE EXPEDIENTE --}}
                                                    <label for="">FECHA DE EXPEDIENTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="date" name="fechaExpediente" id="fechaExpediente" required label-class="text-lightblue">
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
                                                    <label for="">UBICACIÓN <strong style="color:red">*</strong> </label>                                      
                                                    <x-adminlte-select type="text" name="ubicacion" id="ubicacion" required placeholder="Ingrese ubicación" label-class="text-lightblue">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar text-dark"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-select>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{-- ÁREA DEL PREDIO --}}
                                                    <label for="">ÁREA DEL PREDIO <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="areaPredio" id="areaPredio" required placeholder="Ingrese área en m²" label-class="text-lightblue">
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
                                                    {{-- FECHA DE INGRESO --}}
                                                    <label for="">FECHA DE INGRESO <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="date" name="fechaIngreso" id="fechaIngreso" value="<?php echo $today->format('Y-m-d'); ?>" required readonly="readonly" label-class="text-lightblue">
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
                                                    <label for="">ACOMPAÑANTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="partner" id="partner" required placeholder="Ingrese acompañante" label-class="text-lightblue">
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
                                                    <label for="">DNI ACOMPAÑANTE <strong style="color:red">*</strong> </label>                                    
                                                    <x-adminlte-input type="text" name="dniPartner" id="dniPartner" required  placeholder="Ingrese dni" label-class="text-lightblue">
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
                        <input type="hidden" id="estado" name="estado" value="1">
                        <input type="hidden" id="print" name="print" value="0">
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

<script>
    $(document).ready(function(){

        $('#estadoCivil').on('change',function(){
            if($(this).val() === "s")
            {
                $('#partner').val("-");
                $("#dniPartner").val("00000000");
                $('.civil').hide();
            }else{
                $('#partner').val("");
                $("#dniPartner").val("");
                $('.civil').show();
            }
        })
    });
</script>

@stop