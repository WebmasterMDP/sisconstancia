@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
@stop

@section('js')
@if(session('pass') == 'ok')
    <script>
        Swal.fire(
        'Exito!',
        'Contraseña cambiada correctamente',
        'success'
        )
    </script>
@endif
@stop