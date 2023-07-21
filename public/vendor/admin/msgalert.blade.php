if(session('desanular') == 'ok') 
    <script>
        Swal.fire(
        'Exito!',
        'Se desanulo la licencia',
        'success'
        )
    </script>
endif


if(session('print') == 'ok')
    <script>
        Swal.fire(
        'Exito!',
        'Se habilito la impresión',
        'success'
        )
    </script>
endif

if(session('anular') == 'ok')
    <script>
        Swal.fire(
        'Exito!',
        'Se anulo correctamente',
        'success'
        )
    </script>
endif

if(session('error') == 'fail')
    <script>
        Swal.fire({
            icon: 'error',
            title:'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
        })
    </script>
endif

if(session('reason') == 'miss')
    <script>
        Swal.fire(
            'No ingreso motivo!',
            'No procedio la solicitud',
            'warning'
        )
    </script>
endif