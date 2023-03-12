/* ==============================================
DATA TABLE
============================================== */

$(".tablas").DataTable({
  // ajax: "ajax/datatable-plantilla.ajax.php",
  // deferRender: true,
  // retrieve: true,
  // processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo:
      "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
  dom:
    "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
  buttons: [
    {
      //Botón para Excel
      extend: "excelHtml5",
      footer: true,
      title: "Clima | Cool",
      filename: "Reporte_Clima-Cool",

      //Aquí es donde generas el botón personalizado
      text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>',
    },
    //Botón para PDF
    {
      extend: "pdfHtml5",
      download: "open",
      footer: true,
      title: "Clima-Cool",
      filename: "Clima-Cool",
      text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
      exportOptions: {
        columns: [0, ":visible"],
      },
    },
    //Botón para copiar
    {
      extend: "copyHtml5",
      footer: true,
      title: "Clima-Cool",
      filename: "Clima-Cool",
      text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
      exportOptions: {
        columns: [0, ":visible"],
      },
    },
    //Botón para print
    {
      extend: "print",
      footer: true,
      filename: "Reporte_Clima-Cool_print",
      text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>',
    },
    //Botón para cvs
    {
      extend: "csvHtml5",
      footer: true,
      filename: "Reporte_Clima-Cool_csv",
      text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>',
    },
    {
      extend: "colvis",
      text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
      postfixButtons: ["colvisRestore"],
    },
  ],
});
