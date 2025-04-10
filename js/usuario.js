$(document).ready(function() {

    //Dibujar la tabla de datos
    $('#tb_usuario').DataTable({  
      
          
      
      dom: "<'row'<'form-inline'<'col-sm-offset-5 me-15'B>>>" +
             "<'row'<'col-sm-7'l><'col-sm-5'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
           buttons: [{
               "extend": "excelHtml5",
               "text": '<i class=" fa fa-file-excel "></i>',
               "titleAttr": "Exportar a Excel",
               "className": "btn btn-dark",
               title: "Listado de usuarios del sistema",
               "idText": "excel",
               exportOptions: {
                 columns: [0,1,2,3,4,5,6]
               }
             }, {
               "extend": "pdfHtml5",
               "text": '<i class=" fa fa-file-pdf "></i>',
               "titleAttr": "Exportar a Pdf",
               "className": "btn btn-dark",
               title: "Listado de usuarios del sistema",
               "idText": "pdf",
               pageSize: 'LETTER',
               exportOptions: {
                  columns: [0,1,2,3,4,5,6]
               }
             }, {
               extend: "print",
               "text": '<i class=" fa fa-print "></i>',
               "titleAttr": "Imprimir",
               "className": "btn btn-dark",
               title: "Listado de usuarios del sistema",           
               exportOptions: {
                  columns: [0,1,2,3,4,5,6]
               }
             },
             {
               extend: "copyHtml5",
               "text": '<i class="fa fa-copy"></i>',
               "titleAttr": "Copiar",
               "className": "btn btn-dark",
               title: "Listado de usuarios del sistema",           
               exportOptions: {
                  columns: [0,1,2,3,4,5,6]
               }
             },
             {
               extend: "csvHtml5",
               "text": '<i class="fas fa-file-csv"></i>',
               "titleAttr": "Exportar como CSV",
               "className": "btn btn-dark",
               title: "Listado de usuarios del sistema",           
               exportOptions: {
                  columns: [0,1,2,3,4,5,6]
               }
             },
             {
              extend: "colvis",
              "text": '<i class="fa fa-columns"></i>',
              "titleAttr": "Columnas visibles",
              "className": "btn btn-dark",
              title: "Listado de usuarios del sistema",           
              exportOptions: {
                 columns: [0,1,2,3,4,5,6]
              }
            },
           ],
      "ajax":
        {
          "url": baseurl+"usuario_c/List_No_Root",
          "type": "POST",
          dataSrc: ''
        },
        "columns":
        [        
          {data: 'usuario', 'orderable': true, 'searchable': true},         
          {data: 'nombre_usuario', 'orderable': true, 'searchable': true},
          {data: 'rol', 'orderable': true, 'searchable': true},         
          {data: 'fecha_creado', 'orderable': true, 'searchable': true},         
          {data: 'fecha_modificado', 'orderable': true, 'searchable': true},         
          {data: 'fecha_ult_conex', 'orderable': true, 'searchable': true},         
          {data: 'creado', 'orderable': true, 'searchable': true},         
          {
            "orderable": false,
            
            render: function(data, type, row)                                                                                                                                                                                                                                      
            {
              if(row.estado!=1){ 
                return '<a href="#" title="CAMBIAR A ESTADO ACTIVO" class="btn  btn-block btn-danger btn-xs" style="width: 45px"; data-toggle="modal" data-target="#status" onClick="F_status(\''+row.id_usuario+'\',\''+row.estado+'\',\''+row.usuario+'\',\''+row.nombre_usuario+'\');"><i class="fas fa-user-alt-slash"></i></a>';
              }
              else{
                return '<a href="#" title="CAMBIAR A ESTADO INACTIVO" class="btn  btn-block btn-success btn-xs" style="width: 45px"; data-toggle="modal" data-target="#status" onClick="F_status(\''+row.id_usuario+'\',\''+row.estado+'\',\''+row.usuario+'\',\''+row.nombre_usuario+'\');" ><i class="fas fa-user-alt"></i></a>';
              }
            }
          },  
          {
            "orderable": false,
            
            render: function(data, type, row)                                                                                                                                                                                                                                      
            {
              if(nivel_acceso=="Administrador" || nivel_acceso=='Jefe Departamento'){ 
              return '<a href="#" class="btn btn-block btn-warning btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Upd" title="Editar" onClick="Seleccionar(\''+row.id_usuario+'\',\''+row.nombre_usuario+'\',\''+row.rol+'\',\''+row.usuario+'\');"><i class="fa fa-edit"></i></a>';  
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
              return '<a href="#" class="btn btn-block btn-danger btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Del" title="Eliminar" onClick="EliminarRegistro(\''+row.id_usuario+'\');"><i class="fa  fa-trash"></i></a>';  
              }
              else{
                return '<a href="#" class="btn disabled btn-block btn-danger btn-xs" style="width: 45px"; data-toggle="modal" title="Eliminar"><i class="fa fa-fw fa-trash"></i></a>';
              }
            }
          }   
        ],
        "order": [[2, "asc"],[1, "asc"]],  
    });
    $('[title ="Exportar a Excel"]').tooltip();
    $('[title ="Exportar a Pdf"]').tooltip();
    $('[title ="Imprimir"]').tooltip();
    $('[title ="Copiar"]').tooltip();
    $('[title ="Exportar como SCV"]').tooltip();
    $('[title ="Columnas visibles"]').tooltip();
   
    
     });
    
    
    //Con esta funcion pasamos los parámetros a los text del modal.
    Seleccionar = function(id,trabajador,rol,usuario)
    {      
      $('#id_usuario').val(id);       
      $('#usuario_upd').val(usuario);             
      $('#nombre_usuario_upd').val(trabajador);             
      
       //Listar en el combo ROL
    $.post(baseurl + "usuario_c/ListarEnum",
      function (data) {
        var c = JSON.parse(data);    
        $('#rol_usuario_upd').empty(); 
        $.each(c, function (i, item) {
          var selected =(rol == item.valor)?"selected":"";     
                 
          $('#rol_usuario_upd').append(`<option ${selected} value="${item.valor}"> ${item.valor} </option>`);          
        });
      }); 
    };
    
    EliminarRegistro = function(id)
    { 
       $('#id_delete').val(id);
    };

    
   

   F_status = function(id,estado,usuario,trabajador)
    { 
       $('#id').val(id);
       if(estado==1){               
        document.getElementById('btn1').innerText=`¿Está seguro de querer modificar el estado de la cuenta de usuario "${usuario}" del trabajador "${trabajador}" a ESTADO INACTIVO?`;  
                 
        $('#estado').val(0);}
        else{                 
        document.getElementById('btn1').innerText=`¿Está seguro de querer modificar el estado de la cuenta de usuario "${usuario}" del trabajador "${trabajador}" a ESTADO ACTIVO?`;
        $('#estado').val(1);}
      
    };
    

    //Listar en el combo ROL
    $.post(baseurl + "usuario_c/ListarEnum",
    function (data) {
      var c = JSON.parse(data);     
      $.each(c, function (i, item) {
        $('#rol_usuario_add').append('<option value="' + item.valor + '">' + item.valor + '</option>');          
       // $('#rol_usuario_upd').append('<option value="' + item.valor + '">' + item.valor + '</option>');          
      });
    }); 

   