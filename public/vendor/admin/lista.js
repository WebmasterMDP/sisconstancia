$(function () {   
  $('#example2').DataTable({  
   "dom": 'Bfrtip',
   "paging": false,
   "lengthChange": false,
   "searching": true,      
   "ordering": true,
   "order": [[0, "asc"]],
   "info": false,
   "autoWidth": false,
   "responsive": true,
   "paging": true,
   "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
   "emptyTable": "No hay datos disponibles para mostrar",
   "info": "Mostrando START a END de TOTAL entradas",
   "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
   "infoFiltered": "(filtrado de MAX entradas totales)",
   "infoPostFix": "",
   "thousands": ",",
   "lengthMenu": "Mostrar MENU entradas",
   "loadingRecords": "Cargando...",
   "processing": "Procesando...",
   "search": "Buscar:",
   "zeroRecords": "No se encontraron registros coincidentes",
   "paginate": {
     "first": "Primero",
     "last": "Último",
     "next": "Siguiente",
     "previous": "Anterior"
   },
   },
   "with-buttons": true,
   "buttons":
    [ { "extend": "excel", "text": '<i class="far fa-file-excel"></i> Excel', "titleAttr": "Exportar Excel", "className": "btn-success mt-1" }/* , { "extend": "", "text": '<i class="far fa-plus-square"></i> Agregar', "titleAttr": "Agregar", "className": "btn-info m-1" } */ ],
})
});
