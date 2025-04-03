$(document).ready(function() {

    //Dibujar la tabla de datos
    $('#tb_cumplimiento').DataTable({  
      dom: "<'row'<'form-inline'<'col-sm-offset-5 me-15'B>>>" +
             "<'row'<'col-sm-7'l><'col-sm-5'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
           buttons: [{
               "extend": "excelHtml5",
               "text": '<i class=" fa fa-file-excel "></i>',
               "titleAttr": "Exportar a Excel",
               "className": "btn btn-dark",
               title: "Reporte de cumplimiento del pronóstico de los medicos",
               "idText": "excel",
               exportOptions: {
                 columns: [0,1,2,3,4,5]
               }
             }, {
               "extend": "pdfHtml5",
               "text": '<i class=" fa fa-file-pdf "></i>',
               "titleAttr": "Exportar a Pdf",
               "className": "btn btn-dark",
               title: "Reporte de cumplimiento del pronóstico de los medicos",
               "idText": "pdf",
               pageSize: 'LETTER',
               exportOptions: {
                  columns: [0,1,2,3,4,5]
               }
             }, {
               extend: "print",
               "text": '<i class=" fa fa-print "></i>',
               "titleAttr": "Imprimir",
               "className": "btn btn-dark",
               title: "Reporte de cumplimiento del pronóstico de los medicos",           
               exportOptions: {
                  columns: [0,1,2,3,4,5]
               }
             },
             {
               extend: "copyHtml5",
               "text": '<i class="fa fa-copy"></i>',
               "titleAttr": "Copiar",
               "className": "btn btn-dark",
               title: "Reporte de cumplimiento del pronóstico de los medicos",           
               exportOptions: {
                  columns: [0,1,2,3,4,5]
               }
             },
             {
               extend: "csvHtml5",
               "text": '<i class="fas fa-file-csv"></i>',
               "titleAttr": "Exportar como CSV",
               "className": "btn btn-dark",
               title: "Reporte de cumplimiento del pronóstico de los medicos",           
               exportOptions: {
                  columns: [0,1,2,3,4,5]
               }
             },
             {
              extend: "colvis",
              "text": '<i class="fa fa-columns"></i>',
              "titleAttr": "Columnas visibles",
              "className": "btn btn-dark",
              title: "Reporte de cumplimiento del pronóstico de los medicos",           
              exportOptions: {
                 columns: [0,1,2,3,4,5]
              }
            },
           ],
      "ajax":
        {
          "url": baseurl+"reporte_c/List_Cumplimiento",
          "type": "POST",
          dataSrc: ''
        },
        "columns":
        [        
          {data: 'ci_medico', 'orderable': true, 'searchable': true},         
          {data: 'medico', 'orderable': true, 'searchable': true},
          {data: 'Nombre_esp', 'orderable': true, 'searchable': true},         
          {data: 'Pronostico', 'orderable': true, 'searchable': true},         
          {data: 'Cumplimiento', 'orderable': true, 'searchable': true},      
          {data: 'Porciento_Cumplimiento', 'orderable': true, 'searchable': true},      
        ],
        "order": [[2, "asc"],[0, "asc"]],  
    });
    $('[title ="Exportar a Excel"]').tooltip();
    $('[title ="Exportar a Pdf"]').tooltip();
    $('[title ="Imprimir"]').tooltip();
    $('[title ="Copiar"]').tooltip();
    $('[title ="Exportar como SCV"]').tooltip();
    $('[title ="Columnas visibles"]').tooltip();
   
    
     });
    
    
    
//Listar en el combo Especialidades
//$.post(baseurl + "especialidad_c/List",
//  function (data) {
//    var c = JSON.parse(data);     
//    $.each(c, function (i, item) {
//      $('#especialidad_add').append('<option value="' + item.id_especialidad + '">' + item.Nombre_esp + '</option>');          
//    
//    });
//  });    
   


    

   