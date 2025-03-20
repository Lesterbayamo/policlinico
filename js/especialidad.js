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
               title: "Listado de especialidades",
               "idText": "excel",
               exportOptions: {
                 columns: [0,1,2]
               }
             }, {
               "extend": "pdfHtml5",
               "text": '<i class=" fa fa-file-pdf "></i>',
               "titleAttr": "Exportar a Pdf",
               "className": "btn btn-dark",
               title: "Listado de especialidades",
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
               title: "Listado de especialidades",           
               exportOptions: {
                  columns: [0,1,2]
               }
             },
             {
               extend: "copyHtml5",
               "text": '<i class="fa fa-copy"></i>',
               "titleAttr": "Copiar",
               "className": "btn btn-dark",
               title: "Listado de especialidades",           
               exportOptions: {
                  columns: [0,1,2]
               }
             },
             {
               extend: "csvHtml5",
               "text": '<i class="fas fa-file-csv"></i>',
               "titleAttr": "Exportar como CSV",
               "className": "btn btn-dark",
               title: "Listado de especialidades",           
               exportOptions: {
                  columns: [0,1,2]
               }
             },
             {
              extend: "colvis",
              "text": '<i class="fa fa-columns"></i>',
              "titleAttr": "Columnas visibles",
              "className": "btn btn-dark",
              title: "Listado de especialidades",           
              exportOptions: {
                 columns: [0,1,2]
              }
            },
           ],
      "ajax":
        {
          "url": baseurl+"especialidad_c/List",
          "type": "POST",
          dataSrc: ''
        },
        "columns":
        [        
          {data: 'Nombre_esp', 'orderable': true, 'searchable': true},         
          {data: 'Siglas_esp', 'orderable': true, 'searchable': true},
          {data: 'edades', 'orderable': true, 'searchable': true},         
          {data: 'Descripcion_esp', 'orderable': true, 'searchable': true},         
           
          {
            "orderable": false,
            
            render: function(data, type, row)                                                                                                                                                                                                                                      
            {
              if(nivel_acceso=="Administrador"){ 
              return '<a href="#" class="btn btn-block btn-warning btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Upd" title="Editar" onClick="Seleccionar(\''+row.id_especialidad+'\',\''+row.Nombre_esp+'\',\''+row.Siglas_esp+'\',\''+row.Descripcion_esp+'\');"><i class="fa fa-edit"></i></a>';  
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
              return '<a href="#" class="btn btn-block btn-danger btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Del" title="Eliminar" onClick="EliminarRegistro(\''+row.id_especialidad+'\');"><i class="fa  fa-trash"></i></a>';  
              }
              else{
                return '<a href="#" class="btn disabled btn-block btn-danger btn-xs" style="width: 45px"; data-toggle="modal" title="Eliminar"><i class="fa fa-fw fa-trash"></i></a>';
              }
            }
          }   
        ],
        "order": [[0, "asc"],[2, "asc"]],  
    });
    $('[title ="Exportar a Excel"]').tooltip();
    $('[title ="Exportar a Pdf"]').tooltip();
    $('[title ="Imprimir"]').tooltip();
    $('[title ="Copiar"]').tooltip();
    $('[title ="Exportar como SCV"]').tooltip();
    $('[title ="Columnas visibles"]').tooltip();
   
    
     });
    
    
    //Con esta funcion pasamos los parámetros a los text del modal.
    Seleccionar = function(id,nombre,sigla,descripcion)
    {      
      $('#id_especialidad').val(id);       
      $('#nombre_especialidad_upd').val(nombre); 
      $('#abreviatura_upd').val(sigla);             
      $('#descripcion_upd').val(descripcion);             
    };
    
    EliminarRegistro = function(id)
    { 
       $('#id_delete').val(id);
    };

    
   


    

   