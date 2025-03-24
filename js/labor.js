//window.arr_cant="lester";
$(document).ready(function() {
  var titulo_exportar = document.getElementById('titulo_exportar').textContent;
 
    //Dibujar la tabla de datos
    if(vista !="1"){
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
                   columns: [0,1,2,3,4,5,6,7]
                 }
               }, {
                 "extend": "pdfHtml5",
                 "text": '<i class=" fa fa-file-pdf "></i>',
                 "titleAttr": "Exportar a Pdf",
                 "className": "btn btn-dark",
                 title: titulo_exportar,
                 "idText": "pdf",
                 pageSize: 'LETTER',
                 orientation: 'landscape',
                 exportOptions: {
                    columns: [0,1,2,3,4,5,6,7]
                 }
               }, {
                 extend: "print",
                 "text": '<i class=" fa fa-print "></i>',
                 "titleAttr": "Imprimir",
                 "className": "btn btn-dark",
                 title: titulo_exportar,           
                 exportOptions: {
                    columns: [0,1,2,3,4,5,6,7]
                 }
               },
               {
                 extend: "copyHtml5",
                 "text": '<i class="fa fa-copy"></i>',
                 "titleAttr": "Copiar",
                 "className": "btn btn-dark",
                 title: titulo_exportar,           
                 exportOptions: {
                    columns: [0,1,2,3,4,5,6,7]
                 }
               },
               {
                 extend: "csvHtml5",
                 "text": '<i class="fas fa-file-csv"></i>',
                 "titleAttr": "Exportar como CSV",
                 "className": "btn btn-dark",
                 title: titulo_exportar,           
                 exportOptions: {
                    columns: [0,1,2,3,4,5,6,7]
                 }
               },
               {
                extend: "colvis",
                "text": '<i class="fa fa-columns"></i>',
                "titleAttr": "Columnas visibles",
                "className": "btn btn-dark",
                title: titulo_exportar,           
                exportOptions: {
                   columns: [0,1,2,3,4,5,6,7]
                }
              },
             ],
        "ajax":
          {
            "url": baseurl+"labor_c/List?num="+vista,
            "type": "POST",
            dataSrc: ''
          },
          "columns":
          [        
            {data: 'ci_medico', 'orderable': true, 'searchable': true},         
            {data: 'medico', 'orderable': true, 'searchable': true},         
            {data: 'Nombre_esp', 'orderable': true, 'searchable': true},         
            {data: 'Tipo_consulta', 'orderable': true, 'searchable': true},         
            {data: 'Nombre_cm', 'orderable': true, 'searchable': true},         
            {data: 'Fecha_consulta', 'orderable': true, 'searchable': true},         
            {data: 'Cantidad_paciente', 'orderable': true, 'searchable': true},         
            {data: 'Telefono_medico', 'orderable': true, 'searchable': true},         
            
            
             
            {
              "orderable": false,
              
              render: function(data, type, row)                                                                                                                                                                                                                                      
              {
                if(nivel_acceso=="Administrador"){ 
                return '<a href="#" class="btn btn-block btn-warning btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Upd" title="Editar" onClick="Seleccionar(\''+row.Tipo_consulta+'\',\''+row.consult+'\',\''+row.ci_medico+'\',\''+row.Nombre_cm+'\',\''+row.Cantidad_paciente+'\',\''+row.Fecha_consulta+'\',\''+row.medico+'\',\''+row.id_especialidad+'\');"><i class="fa fa-edit"></i></a>';  
                }
                else{
                  return '<a href="#" class="btn disabled btn-block btn-warning btn-xs" style="width: 45px"; data-toggle="modal" title="Editar"><i class="fa fa-edit"></i></a>';
                }
              }
            }
          ],
          "order": [[5, "desc"],[3, "asc"],[4, "desc"],[2, "desc"]],  
      }
    }else{
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
                   columns: [0,1,2,3,4,5]
                 }
               }, {
                 "extend": "pdfHtml5",
                 "text": '<i class=" fa fa-file-pdf "></i>',
                 "titleAttr": "Exportar a Pdf",
                 "className": "btn btn-dark",
                 title: titulo_exportar,
                 "idText": "pdf",
                 pageSize: 'LETTER',
                 orientation: 'landscape',
                 exportOptions: {
                    columns: [0,1,2,3,4,5]
                 }
               }, {
                 extend: "print",
                 "text": '<i class=" fa fa-print "></i>',
                 "titleAttr": "Imprimir",
                 "className": "btn btn-dark",
                 title: titulo_exportar,           
                 exportOptions: {
                    columns: [0,1,2,3,4,5]
                 }
               },
               {
                 extend: "copyHtml5",
                 "text": '<i class="fa fa-copy"></i>',
                 "titleAttr": "Copiar",
                 "className": "btn btn-dark",
                 title: titulo_exportar,           
                 exportOptions: {
                    columns: [0,1,2,3,4,5]
                 }
               },
               {
                 extend: "csvHtml5",
                 "text": '<i class="fas fa-file-csv"></i>',
                 "titleAttr": "Exportar como CSV",
                 "className": "btn btn-dark",
                 title: titulo_exportar,           
                 exportOptions: {
                    columns: [0,1,2,3,4,5]
                 }
               },
               {
                extend: "colvis",
                "text": '<i class="fa fa-columns"></i>',
                "titleAttr": "Columnas visibles",
                "className": "btn btn-dark",
                title: titulo_exportar,           
                exportOptions: {
                   columns: [0,1,2,3,4,5]
                }
              },
             ],
        "ajax":
          {
            "url": baseurl+"labor_c/List?num="+vista,
            "type": "POST",
            dataSrc: ''
          },
          "columns":
          [        
            {data: 'ci_medico', 'orderable': true, 'searchable': true},         
            {data: 'medico', 'orderable': true, 'searchable': true},         
            {data: 'Nombre_cm', 'orderable': true, 'searchable': true},         
            {data: 'Fecha_consulta', 'orderable': true, 'searchable': true},         
            {data: 'Cantidad_paciente', 'orderable': true, 'searchable': true},         
            {data: 'Telefono_medico', 'orderable': true, 'searchable': true},         
            
            
             
            {
              "orderable": false,
              
              render: function(data, type, row)                                                                                                                                                                                                                                      
              {
                if(nivel_acceso=="Administrador"){ 
                return '<a href="#" class="btn btn-block btn-warning btn-xs" style="width: 45px"; data-toggle="modal" data-target="#Upd" title="Editar" onClick="Seleccionar(\''+row.Tipo_consulta+'\',\''+row.consult+'\',\''+row.ci_medico+'\',\''+row.Nombre_cm+'\',\''+row.Cantidad_paciente+'\',\''+row.Fecha_consulta+'\',\''+row.medico+'\',\''+row.id_especialidad+'\');"><i class="fa fa-edit"></i></a>';  
                }
                else{
                  return '<a href="#" class="btn disabled btn-block btn-warning btn-xs" style="width: 45px"; data-toggle="modal" title="Editar"><i class="fa fa-edit"></i></a>';
                }
              }
            }
          ],
          "order": [[5, "desc"],[3, "asc"],[4, "desc"],[2, "desc"]],  
      }
    }
    
    $('#tb_labor').DataTable(objeto_tabla);
    $('[title ="Exportar a Excel"]').tooltip();
    $('[title ="Exportar a Pdf"]').tooltip();
    $('[title ="Imprimir"]').tooltip();
    $('[title ="Copiar"]').tooltip();
    $('[title ="Exportar como SCV"]').tooltip();
    $('[title ="Columnas visibles"]').tooltip();
   
    
     });
    /*  window.arr_id=[]; */
     
    
    //Con esta funcion pasamos los parámetros a los text del modal.
    Seleccionar = function(tipo,id_cmf,ci,Nombre_cm,Cantidad_paciente,Fecha_consulta,medico,id_especialidad)
    {   
      Nombre_cm = (Nombre_cm!='null')?Nombre_cm:"";
      $('#consultorio_upd').val(Nombre_cm);       
     
      $('#fecha_upd').val(Fecha_consulta); 
      $('#medico_upd').val(medico); 
      $('#ci_medico_upd').val(ci); 
      $('#id_consultorio_upd').val(id_cmf); 
      $('#tipo_upd').val(tipo); 
                  
      /* Inicio */     
      
      var rango_div = document.getElementById('div_rango_edad_upd');
      rango_div.innerHTML="";
           
            if(id_especialidad!="null"){
              F_rango_edad_listar(id_especialidad,"_upd",id_cmf,ci,Fecha_consulta,tipo);
              //F_valores_rango_edad(id_cmf,ci,Fecha_consulta,tipo);
              }else{
                rango_div.innerHTML=`<div class="col-12"> <div class="form-group">
                                      <label>Pacientes atendidos</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text bg-dark"><i
                                                      class="fas fa-spell-check"></i></span>
                                          </div>
                                          <input type="number" min="1" class="form-control" id="cantidad_upd"
                                              name="cantidad_upd" required>
                                      </div>
                                      <!-- /.input group -->
                                  </div></div>`;
              }
          
      /* fin */
      $('#cantidad_upd').val(Cantidad_paciente); 
    };
    
    EliminarRegistro = function(id)
    { 
       $('#id_delete').val(id);
    };

F_rango_edad_input =   function (rango,id,val=0) {
 
 input_cant = `<div class="form-group">
                  <label>${rango}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark"><i
                                    class="fas fa-spell-check"></i></span>
                        </div>
                        <input type="number" min="0" class="form-control" id="id_${id}"
                            name="id_${id}" value="${val}" required>
                    </div>
                    <!-- /.input group -->
                </div>`;               
               return input_cant;
} 
   
//Listar en el combo Medico
$.post(baseurl + "medico_c/List_Labor",{num:vista},
  function (data) {
    var c = JSON.parse(data);     
    $.each(c, function (i, item) {
      $('#medico_add').append(`<option value="${item.ci_medico}"> ${item.medico} ${item.Nombre_esp}</option>`);                 
    });
  }); 

  $('#medico_add').change(function() {
    var rango_div = document.getElementById('div_rango_edad');
    rango_div.innerHTML="";
    //alert($(this).val())
   // F_rango_edad()
    if($(this).val())
      {$.post(baseurl + "medico_c/List",{valor:$(this).val()},
        function (data) {
         var c = JSON.parse(data);     
         //console.log(c);
         $.each(c, function (i, item) {
          if(item.id_especialidad){
            F_rango_edad_listar(item.id_especialidad);}else{
              rango_div.innerHTML=`<div class="col-12"> <div class="form-group">
                                    <label>Pacientes atendidos</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="number" min="1" class="form-control" id="cantidad_add"
                                            name="cantidad_add" required>
                                    </div>
                                    <!-- /.input group -->
                                </div></div>`;
            }
          });
       }); }
  }); 
//Listar en el combo Consultorio
$.post(baseurl + "consultorio_c/List",
  function (data) {
    var c = JSON.parse(data);     
    $.each(c, function (i, item) {
      $('#consultorio_add').append(`<option value="${item.id_consultorio_medico}"> ${item.Nombre_gt} ${item.Nombre_cm}</option>`);
      //$('#medico_add').append('<option value="' + item.ci_medico + '">' + item.medico + '</option>');          
    
    });
  }); 
  
  F_rango_edad_listar = function(id,div="",id_cmf="",ci="",Fecha_consulta="",tipo=""){    
     $.post(baseurl + "edades_c/List",{valor:id},
      function (data) {
        var c = JSON.parse(data);   
        var txt = "";
        $.each(c, function (i, item) {         
          if(div!=""){
            F_valores_rango_edad(id_cmf,ci,Fecha_consulta,tipo,item.id_grupo_edad, function(resultado) {                 
             txt = txt + F_rango_edad_input(item.Rango_edad,item.id_grupo_edad,resultado);
           /*  document.getElementById('valor_upd').innerText=txt; */
            var rango_div = document.getElementById('div_rango_edad'+div);
           rango_div.innerHTML=`<div class="col-12"> ${txt} </div>`;
            });            
          }else{
            txt = txt + F_rango_edad_input(item.Rango_edad,item.id_grupo_edad);}
        });
        var rango_div = document.getElementById('div_rango_edad'+div);
        rango_div.innerHTML=`<div class="col-12"> ${txt} </div>`;
      });       
    }
   /* 
F_valores_rango_edad = function (id_cmf,ci,Fecha_consulta,tipo,id_grupo_edad) {
  var resultado =[];
  $.post(baseurl + "labor_c/List_Valor_X_RE",
    {consultorio:id_cmf,
    carnet:ci,
    fecha:Fecha_consulta,
    grupo_edad:id_grupo_edad,
    consulta:tipo},
  function (data) { 
    dato={valor:data}    
    resultado.push(data);
  }); 
  return resultado;
}
   
    */   
function F_valores_rango_edad(id_cmf, ci, Fecha_consulta, tipo, id_grupo_edad, callback) {
  $.post(baseurl + "labor_c/List_Valor_X_RE", {
    consultorio: id_cmf,
    carnet: ci,
    fecha: Fecha_consulta,
    grupo_edad: id_grupo_edad,
    consulta: tipo
  }, function (data) {
    callback(data); // Llamar al callback con los datos recibidos
  });
}

/* // Uso de la función
F_valores_rango_edad(id_cmf, ci, Fecha_consulta, tipo, id_grupo_edad, function(resultado) {
  console.log(resultado); // Manejar el resultado aquí
}); */