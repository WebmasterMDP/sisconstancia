
<div class="modal fade show" id="addUbicacion" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">REGISTRAR UBICACIÓN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ url('ubicacion/create') }}" method="post" autocomplete="off">
            @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>ZONA</label>                                       
                                        <x-adminlte-select type="text" name="zonaCreate" id="zonaCreate" required placeholder="Ingrese zona" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-card text-dark"></i>
                                                </div>
                                            </x-slot>
                                            <option>-- SELECCIONA --</option>
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
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>INGRESE DENOMINACIÓN</label>                                       
                                        <x-adminlte-input type="text" required name="nombreUbicacionCreate" id="nombreUbicacionCreate" placeholder="Ingrese Denominacion de Asociación" label-class="text-lightblue">
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
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
