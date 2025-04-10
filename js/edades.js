$(document).ready(function() {

    //Dibujar la tabla de datos
    $('#tb_edades').DataTable({  
      dom: "<'row'<'form-inline'<'col-sm-offset-5 me-15'B>>>" +
             "<'row'<'col-sm-7'l><'col-sm-5'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
           buttons: [{
               "extend": "excelHtml5",
               "text": '<i class=" fa fa-file-excel "></i>',
               "titleAttr": "Exportar a Excel",
               "className": "btn btn-dark",
               title: "Listado de los grupos de edades  por especialidades",
               "idText": "excel",
               exportOptions: {
                 columns: [0,1]
               }
             }, {
               "extend": "pdfHtml5",
               "text": '<i class=" fa fa-file-pdf "></i>',
               "titleAttr": "Exportar a Pdf",
               "className": "btn btn-dark",
               title: "Listado de los grupos de edades  por especialidades",
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
               title: "Listado de los grupos de edades  por especialidades",           
               exportOptions: {
                  columns: [0,1]
               }
             },
             {
               extend: "copyHtml5",
               "text": '<i class="fa fa-copy"></i>',
               "titleAttr": "Copiar",
               "className": "btn btn-dark",
               title: "Listado de los grupos de edades  por especialidades",           
               exportOptions: {
                  columns: [0,1]
               }
             },
             {
               extend: "csvHtml5",
               "text": '<i class="fas fa-file-csv"></i>',
               "titleAttr": "Exportar como CSV",
               "className": "btn btn-dark",
               title: "Listado de los grupos de edades  por especialidades",           
               exportOptions: {
                  columns: [0,1]
               }
             },
             {
              extend: "colvis",
              "text": '<i class="fa fa-columns"></i>',
              "titleAttr": "Columnas visibles",
              "className": "btn btn-dark",
              title: "Listado de los grupos de edades  por especialidades",           
              exportOptions: {
                 columns: [0,1,2]
              }
            },
           ],
      "ajax":
        {
          "url": baseurl+"edades_c/List",
          "type": "POST",
          dataSrc: ''
        },
        "columns":
        [        
          {data: 'Rango_edad', 'orderable': true, 'searchable': true},         
          //{data: 'Nombre_esp', 'orderable': true, 'searchable': true},         
          //{data: 'Siglas_esp', 'orderable': true, 'searchable': true},         
          {data: 'Descripcion_ge', 'orderable': false, 'searchable': true},         
                
          {
            "orderable": false,
            
            render: function(data, type, row)                                                                                                                                                                                                                                      
            {             
              return `<a href="Relacionar-grupo-de-edad-con-especialidad/${row.id_grupo_edad}" class="btn btn-block btn-info btn-xs" style="width: 45px"; data-toggle="" data-target="#" title="Relacionar el grupo de edad con especialidad." ><i class="fa fa-plus"></i></a>`;  
            }
          },    
          {
            "orderable": false,
            
            render: function(data, type, row)                                                                                                                                                                                                                                      
            {
              if(nivel_acceso=="Administrador" || nivel_acceso=="Especialista"){ 
              return '<a href="#" class="btn btn-block btn-warning btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Upd" title="Editar" onClick="Seleccionar(\''+row.id_grupo_edad+'\',\''+row.Rango_edad+'\',\''+row.Descripcion_ge+'\');"><i class="fa fa-edit"></i></a>';  
              }
              else{
                return '<a href="#" class="btn disabled btn-block btn-warning btn-xs" style="width: 45px"; data-toggle="modal" title="Editar"><i class="fa fa-edit"></i></a>';
              }
            }
          },  
          {
            "orderable": false,
            render: function(data, type, row)
            {
              if(nivel_acceso == "Administrador"){ 
              return '<a href="#" class="btn btn-block btn-danger btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Del" title="Eliminar" onClick="EliminarRegistro(\''+row.id_grupo_edad+'\');"><i class="fa  fa-trash"></i></a>';  
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
    Seleccionar = function(horario,rango,descripcion)
    {      
      $('#id_horario').val(horario);       
      $('#rango_upd').val(rango); 
      $('#descripcion_upd').val(descripcion); 
              
           
    };
    
    EliminarRegistro = function(id)
    { 
       $('#id_delete').val(id);
    };

    
   
//Listar en el combo Especialidades
$.post(baseurl + "especialidad_c/List",
  function (data) {
    var c = JSON.parse(data);     
    $.each(c, function (i, item) {
      $('#especialidad_add').append('<option value="' + item.id_especialidad + '">' + item.Nombre_esp + '</option>');          
    
    });
  }); 

    

   