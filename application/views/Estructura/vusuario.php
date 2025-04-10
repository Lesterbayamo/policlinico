
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-10">
        <b><h1><i class="fa fa-users"></i> GESTIONAR CUENTA DE USUARIO</h1></b>
      </div>
      <div class="col-sm-2">
        <ol class="breadcrumb float-sm-right"> 
        <?php 

        if($this->session->userdata('rol')=="Administrador" || $this->session->userdata('rol')=='Jefe Departamento')
        {            
           echo  "<button style='width: 35px' class='btn btn-block btn-success btn-xs'  data-toggle='modal' data-target='#Add' ><i class='fas fa-user-plus'></i></button> ";
        }  ?>               
       
        </ol>
      </div>      
    </div>
  </div>
  <!-- /.container-fluid -->
</section>



<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-success">
            Listado del Usuarios
            </div>
            <!-- /.card-header -->
            
          <div class="card-body">
            <table style="width: 100%" id="tb_usuario" alin="center" class="table table-bordered  table-hover table-condensed">
              <thead>
                <tr>           
                  <th style="width: 5%;">Usuario</th>                   
                  <th style="width: 15%;">Nombre</th>                   
                  <th style="width: 5%;">Rol</th>                   
                  <th style="width: 10%;">Creado</th>                   
                  <th style="width: 10%;">Modificado</th>                   
                  <th style="width: 10%;">Inicio Secci&oacute;n</th>                   
                  <th style="width: 15%;">Creado Por</th>                   
                  <th style="width: 1%;">Estado</th>                   
                  <th style="width: 1%;">Editar</th>                   
                  <th style="width: 1%;">Eliminar</th>                   
                </tr>     
                
              </thead>
              
              <tbody>            
                
             
              </tbody>           
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="modal fade" id="Add">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title"><b> <i class="fas fa-user-plus"></i> CREAR CUENTA DE USUARIO</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle = "tooltip" data-placement = "top" title="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAdd" action="<?php echo base_url(); ?>usuario_c/Add" method="POST">
          <div class="card-body">
            <div class="row">
              <div class="col-12">              
              
                <!-- ROL -->
                <div class="form-group ">
                  <label>Rol</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text bg-dark" ><i class="fas fa-users "></i></span>
                    </div>
                    <select class="select2" style="width: 89%" id="rol_usuario_add" name="rol_usuario_add" required>
                      <option value="">--Select--</option>                        
                    </select>
                  </div>
                </div>
                <!-- NOMBRE  -->
                <div class="form-group" >
                  <label>Nombre</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-user-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nombre_usuario_add" name="nombre_usuario_add" pattern="^([a-zA-ZáéíóúÁÉÍÓÚÑñ]{3,20})(\s[a-zA-ZáéíóúÁÉÍÓÚÑñ]{2,20}){2,4}$" title="Formato válido: Solo texto, ejemplo: nombre primer_apellido segundo_apellido" required>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- USUARIO -->
                <div class="form-group" >
                  <label>Usuario</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-user-alt"></i></span>
                    </div>
                    <input pattern="^([a-záéíóúñ]{3,20})\.([a-záéíóúñ]{3,20})$" title="Formato válido: Solo texto, ejemplo: nombre.apellido" type="text" class="form-control" id="usuario_add" name="usuario_add" required>
                  </div>
                  <!-- /.input group -->
                </div>               
                <div class="form-group">
                  <label>Contraseña</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-key "></i></span>
                    </div>
                    <input type="password" class="form-control" id="password_add" name="password_add" pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ\@\*\/\-\+\.]{8,20}$" title="Formato válido: Letras, números,@,*,/,-,+,. Entre 8 y 20 carácter" required>
                  </div>
                  <!-- /.input group -->
                </div>
                  
                <div class="form-group">
                  <label>Confirmar contraseña</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-key "></i></span>
                    </div>
                    <input type="password" class="form-control" id="password_confirmar_add" name="password_confirmar_add" pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ\@\*\/\-\+\.]{8,20}$" title="Formato válido: Letras, números,@,*,/,-,+,. Entre 8 y 20 carácter" required>
                  </div>
                  <!-- /.input group -->
                </div> 
                
                
                
                
              </div> 
                         
              
            </div>
          </div>
          <!-- /.card-body -->   

          </div>
            <div class="modal-footer justify-content-left">
              <button type="submit" class="btn btn-dark" data-toggle = "tooltip" data-placement = "top" title="Adicionar"> <b><i class="fa fa-save"></i></b> Guardar</button>
              <button type="button" class="btn btn-dark" data-dismiss="modal" id="btnCloseEdit" data-toggle = "tooltip" data-placement = "top" title="Cancelar"><i class="fa fa-times"></i> Cerrar</button>              
            </div>
            </form> 
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
</div>


<div class="modal fade" id="Upd">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title"><b> <i class="fa fa-edit"></i> MODIFICAR CUENTA DE USUARIO</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle = "tooltip" data-placement = "top" title="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUpd" action="<?php echo base_url(); ?>usuario_c/Upd" method="POST">
          <div class="card-body">
            <div class="row">
              <div class="col-12">              
              <input type="hidden" name="id_usuario" id="id_usuario">
                <div class="form-group ">
                  <label>Rol</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text bg-dark" ><i class="fas fa-users "></i></span>
                    </div>
                    <select class="select2" style="width: 89%" id="rol_usuario_upd" name="rol_usuario_upd" required>
                      <option value="">--Select--</option>                        
                    </select>
                  </div>
                </div>
                
                <div class="form-group" >
                  <label>Nombre</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-user-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nombre_usuario_upd" name="nombre_usuario_upd" pattern="^([a-zA-ZáéíóúÁÉÍÓÚÑñ]{3,20})(\s[a-zA-ZáéíóúÁÉÍÓÚÑñ]{2,20}){2,4}$" title="Formato válido: Solo texto, ejemplo: nombre primer_apellido segundo_apellido"  required>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group" >
                  <label>Usuario</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-user-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="usuario_upd" name="usuario_upd" pattern="^([a-záéíóúñ]{3,20})\.([a-záéíóúñ]{3,20})$" title="Formato válido: Solo texto, ejemplo: nombre.apellido" required>
                  </div>
                  <!-- /.input group -->
                </div>               
                <div class="form-group">
                  <label>Contraseña</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-key "></i></span>
                    </div>
                    <input type="password" class="form-control" id="password_upd" name="password_upd"  pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ\@\*\/\-\+\.]{8,20}$" title="Formato válido: Letras, números,@,*,/,-,+,. Entre 8 y 20 carácter">
                  </div>
                  <!-- /.input group -->
                </div>
                  
                <div class="form-group">
                  <label>Confirmar contraseña</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-key "></i></span>
                    </div>
                    <input type="password" class="form-control" id="password_confirmar_upd" name="password_confirmar_upd" pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ\@\*\/\-\+\.]{8,20}$" title="Formato válido: Letras, números,@,*,/,-,+,. Entre 8 y 20 carácter">
                  </div>
                  <!-- /.input group -->
                </div> 
                
                
                
                
              </div> 
                         
              
            </div>
          </div>
          <!-- /.card-body -->   

          </div>
            <div class="modal-footer justify-content-left">
              <button type="submit" class="btn btn-dark" data-toggle = "tooltip" data-placement = "top" title="Adicionar"> <b><i class="fa fa-save"></i></b> Guardar</button>
              <button type="button" class="btn btn-dark" data-dismiss="modal" id="btnCloseEdit" data-toggle = "tooltip" data-placement = "top" title="Cancelar"><i class="fa fa-times"></i> Cerrar</button>              
            </div>
            </form> 
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
</div>

<!-- /.modal -->


<div class="modal fade" id="Del">
  <div class="modal-dialog modal-lm">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><b> <i class="fa fa-trash"></i>  ELIMINAR DATOS</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle = "tooltip" data-placement = "top" title="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCampDel" action="<?php echo base_url(); ?>usuario_c/Delete" method="POST">
        <div class="card-body">  
          <!-- Parametros ocultos -->
          <input type="hidden" id="id_delete" name="id_delete">
          <h5>¿Est&aacute; seguro de querer eliminar los datos seleccionados? La operación será irreversible</h5>              
        </div>
        <!-- /.card-body -->  
      </div>
      <div class="modal-footer justify-content-left">
        <button type="submit" class="btn btn-dark" data-toggle = "tooltip" data-placement = "top" title="Eliminar"> <i class="fa fa-trash"></i> Eliminar</button>
        <button type="button" class="btn btn-dark" data-dismiss="modal" id="btnCloseEdit" data-toggle = "tooltip" data-placement = "top" title="Cancelar"><i class="fa fa-times"></i> Cerrar</button>              
      </div>
      </form> 
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<div class="modal fade" id="status">
  <div class="modal-dialog modal-lm">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><b> <i class="fas fa-exchange-alt"></i>  CAMBIAR ESTADO</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle = "tooltip" data-placement = "top" title="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCampDel" action="<?php echo base_url(); ?>usuario_c/Set_estado" method="POST">
        <div class="card-body">  
          <!-- Parametros ocultos -->
          <input type="hidden" id="estado" name="estado">
          <input type="hidden" id="id" name="id">
          <h5 id="btn1"></h5>              
        </div>
        <!-- /.card-body -->  
      </div>
      <div class="modal-footer justify-content-left">
       
        <button  type="submit" class="btn btn-dark" data-toggle = "tooltip" data-placement = "top" > <i class="fas fa-share"></i>CAMBIAR ESTADO </button>
       
        <button type="button" class="btn btn-dark" data-dismiss="modal" id="btnCloseEdit" data-toggle = "tooltip" data-placement = "top" title="Cancelar"><i class="fa fa-times"></i> Cerrar</button>              
      </div>
      </form> 
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

