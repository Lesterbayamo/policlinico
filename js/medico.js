$(document).ready(function() {

    //Dibujar la tabla de datos
    $('#tb_medico').DataTable({  
      dom: "<'row'<'form-inline'<'col-sm-offset-5 me-15'B>>>" +
             "<'row'<'col-sm-7'l><'col-sm-5'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
           buttons: [{
               "extend": "excelHtml5",
               "text": '<i class=" fa fa-file-excel "></i>',
               "titleAttr": "Exportar a Excel",
               "className": "btn btn-dark",
               title: "Listado de los médicos",
               "idText": "excel",
               exportOptions: {
                 columns: [0,1,2]
               }
             }, {
               "extend": "pdfHtml5",
               "text": '<i class=" fa fa-file-pdf "></i>',
               "titleAttr": "Exportar a Pdf",
               "className": "btn btn-dark",
               title: "Listado de los médicos",
               "idText": "pdf",
               pageSize: 'LETTER',
               exportOptions: {
                  columns: [0,1,2]
               }
             }, {
               extend: "print",
               "text": '<i class=" fa fa-print "></i>',
               "titleAttr": "Imprimir",
               "className": "btn btn-dark",
               title: "Listado de los médicos",           
               exportOptions: {
                  columns: [0,1,2]
               }
             },
             {
               extend: "copyHtml5",
               "text": '<i class="fa fa-copy"></i>',
               "titleAttr": "Copiar",
               "className": "btn btn-dark",
               title: "Listado de los médicos",           
               exportOptions: {
                  columns: [0,1,2]
               }
             },
             {
               extend: "csvHtml5",
               "text": '<i class="fas fa-file-csv"></i>',
               "titleAttr": "Exportar como CSV",
               "className": "btn btn-dark",
               title: "Listado de los médicos",           
               exportOptions: {
                  columns: [0,1,2]
               }
             },
             {
              extend: "colvis",
              "text": '<i class="fa fa-columns"></i>',
              "titleAttr": "Columnas visibles",
              "className": "btn btn-dark",
              title: "Listado de los médicos",           
              exportOptions: {
                 columns: [0,1,2]
              }
            },
           ],
      "ajax":
        {
          "url": baseurl+"medico_c/List",
          "type": "POST",
          dataSrc: ''
        },
        "columns":
        [        
          {data: 'ci_medico', 'orderable': true, 'searchable': true},         
          {data: 'Nombre_medico', 'orderable': true, 'searchable': true},
          {data: 'Apellido_medico', 'orderable': true, 'searchable': true},         
          {data: 'Nombre_esp', 'orderable': true, 'searchable': true},         
          {data: 'Pronostico', 'orderable': true, 'searchable': true},         
          {data: 'Telefono_medico', 'orderable': true, 'searchable': true},   
           
          {
            "orderable": false,
            render: function(data, type, row)
            {
              if(nivel_acceso == "Administrador" || nivel_acceso=="Especialista"){ 
              return '<a href="#" class="btn btn-block btn-info btn-xs" style="width: 45px"; data-toggle="modal" data-target="#status" title="Cantidad de consultas por tipo." onClick="PronosticoRegistro(\''+row.ci_medico+'\');"><i class="fa  fa-plus"></i></a>';  
              }
              else{
                return '<a href="#" class="btn disabled btn-block btn-info btn-xs" style="width: 45px"; data-toggle="modal" title="Cantidad de consultas por tipo."><i class="fa fa-fw fa-plus"></i></a>';
              }
            }
          }  ,     
          {
            "orderable": false,
            
            render: function(data, type, row)                                                                                                                                                                                                                                      
            {
              if(nivel_acceso=="Administrador" || nivel_acceso=="Especialista"){ 
              return '<a href="#" class="btn btn-block btn-warning btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Upd" title="Editar" onClick="Seleccionar(\''+row.ci_medico+'\',\''+row.Nombre_medico+'\',\''+row.Apellido_medico+'\',\''+row.Telefono_medico+'\',\''+row.id_especialidad+'\');"><i class="fa fa-edit"></i></a>';  
              }
              else{
                return '<a href="#" class="btn disabled btn-block btn-warning btn-xs" style="width: 45px"; data-toggle="modal" title="Eliminar"><i class="fa fa-edit"></i></a>';
              }
            }
          }, 
          {
            "orderable": false,
            render: function(data, type, row)
            {
              if(nivel_acceso == "Administrador"){ 
              return '<a href="#" class="btn btn-block btn-danger btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Del" title="Eliminar" onClick="EliminarRegistro(\''+row.ci_medico+'\');"><i class="fa  fa-trash"></i></a>';  
              }
              else{
                return '<a href="#" class="btn disabled btn-block btn-danger btn-xs" style="width: 45px"; data-toggle="modal" title="Eliminar"><i class="fa fa-fw fa-trash"></i></a>';
              }
            }
          }  
           
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
    
    
    //Con esta funcion pasamos los parámetros a los text del modal.
    Seleccionar = function(ci,nombre,apellidos,telefono,especialidad)
    {      
      $('#ci_medico_upd').val(ci);       
      //$('#grupo_trabajo_upd').val(grupo);             
      $('#nombre_upd').val(nombre); 
      $('#apellido_upd').val(apellidos);  
      $('#telefono_upd').val(telefono);  
      $.post(baseurl + "especialidad_c/List",
        function (data) {
          var c = JSON.parse(data);  
          $('#especialidad_upd').empty();   
          $('#especialidad_upd').append('<option value="0">Seleccionar</option>');          
          $.each(c, function (i, item) {
            var selected =(especialidad == item.id_especialidad)?"selected":"";  
            $('#especialidad_upd').append('<option ' +selected+  '   value="' + item.id_especialidad + '">' + item.Nombre_esp + '</option>');          
          
          });
        });             
    };
    
    EliminarRegistro = function(id)
    { 
       $('#id_delete').val(id);
    };
    PronosticoRegistro = function(id)
    { 
       $('#medico').val(id);
       $.post(baseurl + "medico_c/Anno_Mes_Actual_Siguiente",
        function (data) {
          var c = JSON.parse(data);  
         $('#mes').empty();   
          $.each(c, function (i, item) {
            //var selected =(especialidad == item.id_especialidad)?"selected":"";  
            $('#mes').append('<option  value="' + item.valor + '">' + item.valor + '</option>');          
          
          });
        });  
    };
//Listar en el combo Especialidades
$.post(baseurl + "especialidad_c/List",
  function (data) {
    var c = JSON.parse(data);     
    $.each(c, function (i, item) {
      $('#especialidad_add').append('<option value="' + item.id_especialidad + '">' + item.Nombre_esp + '</option>');          
    
    });
  });    
   


    

   