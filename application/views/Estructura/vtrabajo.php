
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-10">
        <b><h1><i class="fas fa-layer-group"></i> GESTIONAR GRUPOS DE TRABAJO</h1></b>
      </div>
      <div class="col-sm-2">
        <ol class="breadcrumb float-sm-right"> 
        <?php 

        if($this->session->userdata('rol')=="Administrador" || $this->session->userdata('rol')=="Especialista")
        {            
           echo  "<button style='width: 35px' class='btn btn-block btn-success btn-xs'  data-toggle='modal' data-target='#Add' ><i class='fas fa-plus'></i></button> ";
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
            Listado de los grupos de trabajo.
            </div>
            <!-- /.card-header -->
            
          <div class="card-body">
            <table style="width: 100%" id="tb_trabajo" alin="center" class="table table-bordered  table-hover table-condensed">
              <thead>
                <tr>           
                                    
                  <th style="width: 20%;">Nombre</th>                   
                  <th style="width: 60%;">Descripción</th>   
                                
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
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title"><b> <i class="fas fa-plus"></i> AGREGAR GRUPO DE TRABAJO</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle = "tooltip" data-placement = "top" title="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAdd" action="<?php echo base_url(); ?>trabajo_c/Add" method="POST">
          <div class="card-body">
            <div class="row">
              <div class="col-12">              
              
                
                
                
                <div class="form-group">
                  <label>Nombre</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-spell-check"></i></span>
                      <input type="text" class="form-control" id="nombre_add" name="nombre_add" pattern="^[GTB]{3}\s([1-9]{1}[0-9]{0,1})$" title="Formato válido: GTB y números. Entre 5 y 6 carácter" required>
                    </div>
                     
                    </div>
                  <!-- /.input group -->
                </div>  
                
                
                <div class="form-group">
                  <label>Descripción</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-spell-check"></i></span>
                      <textarea name="descripcion_add" id="descripcion_add" cols="16" rows="5" required></textarea>                    
                    </div>
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
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title"><b> <i class="fa fa-edit"></i> MODIFICAR GRUPO DE TRABAJO</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle = "tooltip" data-placement = "top" title="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUpd" action="<?php echo base_url(); ?>trabajo_c/Upd" method="POST">
          <div class="card-body">
            <div class="row">
              <div class="col-12">              
              <input type="hidden" name="id_trabajo" id="id_trabajo">
             
                
                <div class="form-group">
                  <label>Nombre</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-spell-check"></i></span>
                      <input type="text" class="form-control" id="nombre_upd" name="nombre_upd" pattern="^[GTB]{3}\s([1-9]{1}[0-9]{0,1})$" title="Formato válido: GTB y números. Entre 5 y 6 carácter" required>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>  
                
                
                <div class="form-group">
                  <label>Descripción</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark"><i class="fas fa-spell-check"></i></span>
                      <textarea name="descripcion_upd" id="descripcion_upd" cols="16" rows="5" required></textarea>                    
                    </div>
                  </div>
                  <!-- /.input group -->
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
        <form id="formCampDel" action="<?php echo base_url(); ?>trabajo_c/Delete" method="POST">
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
        <form id="formCampDel" action="<?php echo base_url(); ?>trabajo_c/Set_estado" method="POST">
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

