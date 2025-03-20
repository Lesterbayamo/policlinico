$(document).ready(function() {
  var titulo_exportar = document.getElementById('titulo_exportar').textContent;

    //Dibujar la tabla de datos
    var objeto_tabla ={  
      dom: "<'row'<'form-inline'<'col-sm-offset-5 me-15'B>>>" +
             "<'row'<'col-sm-7'l><'col-sm-5'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
           buttons: [{
               "extend": "excelHtml5",
               "text": '<i class=" fa fa-file-excel "></i>',
               "titleAttr": "Exportar a Excel",
               "className": "btn btn-dark",
               title: titulo_exportar,
               "idText": "excel",
               exportOptions: {
                 columns: [0,1,2,3]
               }
             }, {
               "extend": "pdfHtml5",
               "text": '<i class=" fa fa-file-pdf "></i>',
               "titleAttr": "Exportar a Pdf",
               "className": "btn btn-dark",
               title: titulo_exportar,
               "idText": "pdf",
               pageSize: 'LETTER',
               exportOptions: {
                  columns: [0,1,2,3]
               }
             }, {
               extend: "print",
               "text": '<i class=" fa fa-print "></i>',
               "titleAttr": "Imprimir",
               "className": "btn btn-dark",
               title: titulo_exportar,           
               exportOptions: {
                  columns: [0,1,2,3]
               }
             },
             {
               extend: "copyHtml5",
               "text": '<i class="fa fa-copy"></i>',
               "titleAttr": "Copiar",
               "className": "btn btn-dark",
               title: titulo_exportar,           
               exportOptions: {
                  columns: [0,1,2,3]
               }
             },
             {
               extend: "csvHtml5",
               "text": '<i class="fas fa-file-csv"></i>',
               "titleAttr": "Exportar como CSV",
               "className": "btn btn-dark",
               title: titulo_exportar,           
               exportOptions: {
                  columns: [0,1,2,3]
               }
             },
             {
              extend: "colvis",
              "text": '<i class="fa fa-columns"></i>',
              "titleAttr": "Columnas visibles",
              "className": "btn btn-dark",
              title: titulo_exportar,           
              exportOptions: {
                 columns: [0,1,2,3]
              }
            },
           ],
      
        "order": [[3, "desc"]],  
    }
    $('#tb_labor').DataTable(objeto_tabla);
    $('[title ="Exportar a Excel"]').tooltip();
    $('[title ="Exportar a Pdf"]').tooltip();
    $('[title ="Imprimir"]').tooltip();
    $('[title ="Copiar"]').tooltip();
    $('[title ="Exportar como SCV"]').tooltip();
    $('[title ="Columnas visibles"]').tooltip();
   
    
     });
    
    
    //Con esta funcion pasamos los parámetros a los text del modal.
    Seleccionar = function(tipo,id_cmf,ci,Nombre_cm,Cantidad_paciente,Fecha_consulta,medico)
    {   
      Nombre_cm = (Nombre_cm!='null')?Nombre_cm:"";
      $('#consultorio_upd').val(Nombre_cm);       
      $('#cantidad_upd').val(Cantidad_paciente); 
      $('#fecha_upd').val(Fecha_consulta); 
      $('#medico_upd').val(medico); 
      $('#ci_medico_upd').val(ci); 
      $('#id_consultorio_upd').val(id_cmf); 
      $('#tipo_upd').val(tipo); 
                  
      
     
    };
    
    EliminarRegistro = function(id)
    { 
       $('#id_delete').val(id);
    };

    
   
//Listar en el combo Medico
$.post(baseurl + "medico_c/List",
  function (data) {
    var c = JSON.parse(data);     
    $.each(c, function (i, item) {
      $('#medico_add').append(`<option value="${item.ci_medico}"> ${item.medico} - ${item.Nombre_esp}</option>`);
      //$('#medico_add').append('<option value="' + item.ci_medico + '">' + item.medico + '</option>');          
    
    });
  }); 

    
//Listar en el combo Consultorio
$.post(baseurl + "consultorio_c/List",
  function (data) {
    var c = JSON.parse(data);     
    $.each(c, function (i, item) {
      $('#consultorio_add').append(`<option value="${item.id_consultorio_medico}"> ${item.Nombre_gt} - ${item.Nombre_cm}</option>`);
      //$('#medico_add').append('<option value="' + item.ci_medico + '">' + item.medico + '</option>');          
    
    });
  }); 
   