$(document).ready(function() {

  //Dibujar la tabla de datos
  $('#tb_especialidad').DataTable({  
    dom: "<'row'<'form-inline'<'col-sm-offset-5 me-15'B>>>" +
           "<'row'<'col-sm-7'l><'col-sm-5'f>>" +
           "<'row'<'col-sm-12'tr>>" +
           "<'row'<'col-sm-5'i><'col-sm-7'p>>",
         buttons: [{
             "extend": "excelHtml5",
             "text": '<i class=" fa fa-file-excel "></i>',
             "titleAttr": "Exportar a Excel",
             "className": "btn btn-dark",
             title: "Listado de las especialidades relacionadas con el rango de edad "+descripcion_ge,
             "idText": "excel",
             exportOptions: {
               columns: [0,1]
             }
           }, {
             "extend": "pdfHtml5",
             "text": '<i class=" fa fa-file-pdf "></i>',
             "titleAttr": "Exportar a Pdf",
             "className": "btn btn-dark",
             title: "Listado de las especialidades relacionadas con el rango de edad "+descripcion_ge,
             "idText": "pdf",
             pageSize: 'LETTER',
             exportOptions: {
                columns: [0,1]
             }
           }, {
             extend: "print",
             "text": '<i class=" fa fa-print "></i>',
             "titleAttr": "Imprimir",
             "className": "btn btn-dark",
             title: "Listado de las especialidades relacionadas con el rango de edad "+descripcion_ge,           
             exportOptions: {
                columns: [0,1]
             }
           },
           {
             extend: "copyHtml5",
             "text": '<i class="fa fa-copy"></i>',
             "titleAttr": "Copiar",
             "className": "btn btn-dark",
             title: "Listado de las especialidades relacionadas con el rango de edad "+descripcion_ge,           
             exportOptions: {
                columns: [0,1]
             }
           },
           {
             extend: "csvHtml5",
             "text": '<i class="fas fa-file-csv"></i>',
             "titleAttr": "Exportar como CSV",
             "className": "btn btn-dark",
             title: "Listado de las especialidades relacionadas con el rango de edad "+descripcion_ge,           
             exportOptions: {
                columns: [0,1]
             }
           },
           {
            extend: "colvis",
            "text": '<i class="fa fa-columns"></i>',
            "titleAttr": "Columnas visibles",
            "className": "btn btn-dark",
            title: "Listado de las especialidades relacionadas con el rango de edad "+descripcion_ge,           
            exportOptions: {
               columns: [0,1]
            }
          },
         ],
    "ajax":
      {
        "url": baseurl+"especialidad_c/List_Esp_X_Ge_In?id="+id_ge,
        "type": "POST",
        dataSrc: ''
      },
      "columns":
      [        
        {data: 'Nombre_esp', 'orderable': true, 'searchable': true},         
        {data: 'Descripcion_esp', 'orderable': true, 'searchable': true},         
         
        
        {
          "orderable": false,
          render: function(data, type, row)
          {
            if(nivel_acceso == "Administrador" || nivel_acceso=="Especialista"){ 
            return '<a href="#" class="btn btn-block btn-danger btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Del" title="Eliminar" onClick="EliminarRegistro(\''+row.id_especialidad+'\');"><i class="fa  fa-trash"></i></a>';  
            }
            else{
              return '<a href="#" class="btn disabled btn-block btn-danger btn-xs" style="width: 45px"; data-toggle="modal" title="Eliminar"><i class="fa fa-fw fa-trash"></i></a>';
            }
          }
        }   
      ],
      "order": [[0, "asc"]],  
  });
  $('[title ="Exportar a Excel"]').tooltip();
  $('[title ="Exportar a Pdf"]').tooltip();
  $('[title ="Imprimir"]').tooltip();
  $('[title ="Copiar"]').tooltip();
  $('[title ="Exportar como SCV"]').tooltip();
  $('[title ="Columnas visibles"]').tooltip();
 
  
   });
  
  
  //Con esta funcion pasamos los parámetros a los text del modal.
 
  
  EliminarRegistro = function(id)
  { 
     $('#id_delete').val(id);
  };

  
 


  

  $.post(baseurl + "especialidad_c/List_Esp_X_Ge_Not",{id:id_ge},
    function (data) {
      var c = JSON.parse(data);     
      $.each(c, function (i, item) {
        $('#especialidad_add').append(`<option value="${item.id_especialidad}"> ${item.Nombre_esp}</option>`);
        //$('#medico_add').append('<option value="' + item.ci_medico + '">' + item.medico + '</option>');          
      
      });
    }); 