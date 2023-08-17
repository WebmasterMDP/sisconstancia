@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>LICENCIA DE HABILITACIÓN URBANA</h1>
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
                    <form action="{{ route('habilitacion.store')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="card-body">                                
                            <div class="row "> 
                                <x-adminlte-card title="DATOS" class="" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                                       
                                        <div class="row ">
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- DENOMINACIÓN --}}
                                                        <label for="">DENOMINACIÓN <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="denominacion" id="denominacion" required  placeholder="Ingresar Denominacion" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="text" name="expediente" id="expediente" required  placeholder="Ingresar Expediente" label-class="text-lightblue">
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
                                                        <x-adminlte-input type="date" name="fechaEmision" id="fechaEmision" value="<?php echo $today->format('Y-m-d'); ?>" required label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- ZONIFICACIÓN --}} 
                                                        <label for="">ZONIFICACIÓN <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="text" name="zonificacion" id="zonificacion" required placeholder="Ingrese Zonificación" label-class="text-lightblue">
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
                                                        {{-- N° DE RESOLUCIÓN --}} 
                                                        <label for="">N° DE RESOLUCIÓN <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="text" name="numResolucion" id="numResolucion" required placeholder="Ingrese Resolución" label-class="text-lightblue">
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
                                                        {{-- FECHA DE VENCIMIENTO --}}
                                                        <label for="">FECHA DE VENCIMIENTO <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="date" name="fechaVencimiento" id="fechaVencimiento" required label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{--  PROPIETARIO DEL PREDIO --}}
                                                        <label for="">PROPIETARIO DEL PREDIO <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="propietario" id="propietario" required  placeholder="Ingrese Nombre Completo" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-id-card text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- PLANO APROBADO --}} 
                                                        <label for="">PLANO APROBADO <strong style="color:red">*</strong> </label>                                      
                                                        <x-adminlte-input type="text" name="planoAprobado" id="planoAprobado" required placeholder="Ingrese n° plano" label-class="text-lightblue">
                                                            <x-slot name="prependSlot">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-calendar text-dark"></i>
                                                                </div>
                                                            </x-slot>
                                                        </x-adminlte-input>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- RESPONSABLE DE LA OBRA --}}
                                                        <label for="">RESPONSABLE DE LA OBRA <strong style="color:red">*</strong> </label>                                    
                                                        <x-adminlte-input type="text" name="responsableObra" id="responsableObra" required  placeholder="Ingrese Nombre Completo" label-class="text-lightblue">
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
                                <x-adminlte-card title="PREDIO" class="" theme="dark" icon="fas fa-id-card">
                                    <div class="col-12">                    
                                        <div class="row ">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- DEPARTAMENTO --}}
                                                        <label for="">DEPARTAMENTO <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="departamento" id="departamento" required placeholder="Ingrese Departamento" label-class="text-lightblue">
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
                                                        {{-- PROVINCIA --}}
                                                        <label for="">PROVINCIA <strong style="color:red">*</strong> </label>  
                                                        <x-adminlte-input type="text" name="provincia" id="provincia" required placeholder="Ingrese Provincia" label-class="text-lightblue">
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
                                                        {{-- DISTRITO --}}
                                                        <label for="">DISTRITO</label>
                                                        <x-adminlte-input type="text" name="distrito" id="distrito" placeholder="Ingrese Distrito" label-class="text-lightblue">
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
                                                        {{-- URB / AA.HH. / OTROS --}}
                                                        <label for="">URB / AA.HH. / OTROS</label>
                                                        <x-adminlte-input type="text" name="ubanizacionOtro" id="ubanizacionOtro" placeholder="Este campo es opcional" label-class="text-lightblue">
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
                                                        {{-- U.C --}}
                                                        <label for="">U.C</label>
                                                        <x-adminlte-input type="text" name="uc" id="uc" placeholder="Este campo es opcional" label-class="text-lightblue">
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
                                                        {{-- SUB-LOTE --}}
                                                        <label for="">SUB-LOTE</label>
                                                        <x-adminlte-input type="text" name="lote" id="lote" placeholder="Este campo es opcional" label-class="text-lightblue">
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
                                                        {{-- AREA BRUTA DEL TERRENO --}}
                                                        <label for="">ÁREA BRUTA DEL TERRENO <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="areaTerrenoBruto" id="areaTerrenoBruto" required placeholder="Ingrese calculo a M²" label-class="text-lightblue">
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
                                                        {{-- ÁREA VÍA METROPOLITANA --}}
                                                        <label for="">ÁREA VÍA METROPOLITANA <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="areaViaMetro" id="areaViaMetro" required placeholder="Ingrese calculo a M²" label-class="text-lightblue">
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
                                                        {{-- ÁREA AFECTA A APORTES --}}
                                                        <label for="">ÁREA AFECTA A APORTES <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="areaAfectaAporte" id="areaAfectaAporte" required placeholder="Ingrese calculo a M²" label-class="text-lightblue">
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
                                                        {{-- PARQUES ZONALES SERPAR --}}
                                                        <label for="">PARQUES ZONALES SERPAR <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="parqueZonal" id="parqueZonal" required placeholder="Ingrese calculo a M²" label-class="text-lightblue">
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
                                                        {{-- SERVICIOS PÚBLICOS COMPLEMENTARIOS --}}
                                                        <label for="">SERVICIOS PÚBLICOS COMPLEMENTARIOS <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="serviciosPublico" id="serviciosPublico" required placeholder="Ingrese calculo a M²" label-class="text-lightblue">
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
                                                        {{-- ÁREA DE SERVICIOS --}}
                                                        <label for="">ÁREA DE SERVICIOS <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="areaServicio" id="areaServicio" required placeholder="Ingrese calculo a M²" label-class="text-lightblue">
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
                                                        {{-- ÁREA VENDIBLE --}}
                                                        <label for="">ÁREA VENDIBLE <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="areaVendible" id="areaVendible" required placeholder="Ingrese calculo a M²" label-class="text-lightblue">
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
                                                        {{-- ÁREA DE CIRCULACIÓN --}}
                                                        <label for="">ÁREA DE CIRCULACIÓN <strong style="color:red">*</strong> </label>
                                                        <x-adminlte-input type="text" name="areaCirculacion" id="areaCirculacion" required placeholder="Ingrese calculo a M² " label-class="text-lightblue">
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