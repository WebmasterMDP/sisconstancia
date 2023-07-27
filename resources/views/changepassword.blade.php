@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop


@section('content')
<br>
<br>

<section class="m-0 row justify-content-center align-items-center">
<div class="login-box justify-content-center">

        
        <div class="login-logo col-auto">
            <a href="http://192.168.30.13/sisConstancia/public/home">
                <img src="http://192.168.30.13/sisConstancia/public/vendor/adminlte/dist/img/AdminLTELogo.png" alt="Admin Logo" height="50">
                <b>Admin</b>LTE
            </a>
        </div>

        <div class="card card-outline card-primary">
            
            <div class="card-header ">
                <h3 class="card-title float-none text-center">Cambio de contraseña</h3>
            </div>

            <div class="card-body login-card-body ">
                <form action="{{ url('usuario/pass') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" value="" placeholder="Contraseña actual" autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock "></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="input-group mb-3">
                        <input type="password" name="first" id="first" class="form-control" value="" placeholder="Ingrese nueva contraseña" autofocus="">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock "></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="newpass" id="newpass" class="form-control " placeholder="Confirme nueva contraseña">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock "></span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-5">
                            <button type="submit" class="btn btn-block btn-flat btn-primary">
                                <span class="fas fa-sign-in-alt"></span>
                                Cambiar
                            </button>
                        </div>
                    </div>

                </form>
            </div>

            <!-- <div class="card-footer ">
                <p class="my-0">
                    <a href="http://192.168.30.13/sisConstancia/public/password/reset">I forgot my password</a>
                </p>
                <p class="my-0">
                    <a href="http://192.168.30.13/sisConstancia/public/register">Register a new membership</a>
                </p>
            </div> -->
        </div>
    </div>
                </section>

@stop

@section('css')
@stop

@section('js')

@if(session('pass') == 'fail')
    <script>
        Swal.fire({
            icon: 'error',
            title:'Ups...',
            text: 'Contraseña incorrecta',
            footer: '<a href="https://munipachacamac.com/">Error al anular la licencia, contácte con la Oficina de Gobierno Digital</a>'
        })
    </script>
@endif

@if(session('pass') == 'miss')
    <script>
        Swal.fire(
            'Campo faltante!',
            'No procedio la solicitud',
            'warning'
        )
    </script>
@endif

@if(session('pass') == 'nomatch')
    <script>
        Swal.fire(
            'Contraseña incorrecta!',
            'No coinciden las contraseñas',
            'warning'
        )
    </script>
@endif

@stop