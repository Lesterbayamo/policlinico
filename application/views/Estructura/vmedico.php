<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <b>
                    <h1> GESTIONAR MÉDICOS</h1>
                </b>
            </div>
            <div class="col-sm-2">
                <ol class="breadcrumb float-sm-right">
                    <?php 

        if($this->session->userdata('rol')=="Administrador")
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
                        Listado de Médicos
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table style="width: 100%" id="tb_medico" alin="center"
                            class="table table-bordered  table-hover table-condensed">
                            <thead>
                                <tr>

                                    <th style="width: 10%;">Carnet Identidad</th>
                                    <th style="width: 10%;">Nombre</th>
                                    <th style="width: 20%;">Apellidos</th>
                                    <th style="width: 10%;">Especialidad</th>
                                    <th style="width: 10%;">Pronóstico</th>
                                    <th style="width: 10%;">Teléfono</th>

                                    <th style="width: 1%;">Pronosticar</th>
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
                <h4 class="modal-title"><b> <i class="fas fa-plus"></i> AGREGAR MÉDICO</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                    data-placement="top" title="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAdd" action="<?php echo base_url(); ?>medico_c/Add" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <div class="form-group ">
                                    <label>Especialidad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <select class="select2" style="width: 89%" id="especialidad_add"
                                            name="especialidad_add" required>
                                            <option value="0">--Select--</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Nombre</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre_add" name="nombre_add" pattern="^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,50}$" title="Formato válido: Solo texto. Entre 3 y 50 carácter"
                                            required>
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="apellidos_add" name="apellidos_add" pattern="^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{5,50}$" title="Formato válido: Solo texto. Entre 5 y 50 carácter"
                                            required>
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Carnet Identidad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="ci_medico_add" name="ci_medico_add" pattern="^[0-9]{11}$" title="Formato válido: Solo 11 dígitos."
                                            required>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="telefono_add" name="telefono_add" pattern="^([0-9]{2}-){3}[0-9]{2}$" title="Formato válido: ##-##-##-##"
                                            required>
                                    </div>
                                    <!-- /.input group -->
                                </div>


                            </div>


                        </div>
                    </div>
                    <!-- /.card-body -->

            </div>
            <div class="modal-footer justify-content-left">
                <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Adicionar">
                    <b><i class="fa fa-save"></i></b> Guardar</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal" id="btnCloseEdit" data-toggle="tooltip"
                    data-placement="top" title="Cancelar"><i class="fa fa-times"></i> Cerrar</button>
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
                <h4 class="modal-title"><b> <i class="fa fa-edit"></i> MODIFICAR MÉDICO</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                    data-placement="top" title="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUpd" action="<?php echo base_url(); ?>medico_c/Upd" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <div class="form-group ">
                                    <label>Especialidad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <select class="select2" style="width: 89%" id="especialidad_upd"
                                            name="especialidad_upd" required>
                                            <option value="">--Select--</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Nombre</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre_upd" name="nombre_upd"
                                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,50}$" title="Formato válido: Solo texto. Entre 3 y 50 carácter"   required>
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="apellido_upd" name="apellido_upd"
                                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{5,50}$" title="Formato válido: Solo texto. Entre 5 y 50 carácter"  required>
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Carnet Identidad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="ci_medico_upd" name="ci_medico_upd"
                                        pattern="^[0-9]{11}$" title="Formato válido: Solo 11 dígitos."  required>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="telefono_upd" name="telefono_upd" pattern="^([0-9]{2}-){3}[0-9]{2}$" title="Formato válido: ##-##-##-##"
                                            required>
                                    </div>
                                    <!-- /.input group -->
                                </div>


                            </div>


                        </div>
                    </div>
                    <!-- /.card-body -->

            </div>
            <div class="modal-footer justify-content-left">
                <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Adicionar">
                    <b><i class="fa fa-save"></i></b> Guardar</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal" id="btnCloseEdit" data-toggle="tooltip"
                    data-placement="top" title="Cancelar"><i class="fa fa-times"></i> Cerrar</button>
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
                <h4 class="modal-title"><b> <i class="fa fa-trash"></i> ELIMINAR DATOS</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                    data-placement="top" title="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCampDel" action="<?php echo base_url(); ?>medico_c/Delete" method="POST">
                    <div class="card-body">
                        <!-- Parametros ocultos -->
                        <input type="hidden" id="id_delete" name="id_delete">
                        <h5>¿Est&aacute; seguro de querer eliminar los datos seleccionados? La operación será
                            irreversible</h5>
                    </div>
                    <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-left">
                <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Eliminar">
                    <i class="fa fa-trash"></i> Eliminar</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal" id="btnCloseEdit" data-toggle="tooltip"
                    data-placement="top" title="Cancelar"><i class="fa fa-times"></i> Cerrar</button>
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
                <h4 class="modal-title"><b> <i class="fa fa-plus"></i> PRONÓSTICO DE CONSULTAS PARA EL MES</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                    data-placement="top" title="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCampDel" action="<?php echo base_url(); ?>medico_c/Set_pronostico" method="POST">
                    <div class="card-body">
                        <!-- Parametros ocultos -->
                        
                        <input type="hidden" id="medico" name="medico">
                        <div class="form-group ">

                            <label>Tipo de consultas</label>
                            <div class="input-group">
                                

                                    <label  class="mr-5" for="terreno">Terreno</label>
                                    <input  type="radio" name="tipo" value="Terreno" checked >
                                    <label class="ml-15" for="policlinico">Policlínico</label>
                                    <input  type="radio" name="tipo" value="Policlinico">
                                
                            </div>
                        </div>
                        <div class="form-group ">
                            <label>Mes</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark"><i class="fas fa-spell-check"></i></span>
                                </div>
                                <select class="select2" style="width: 89%" id="mes" name="mes"
                                    required>
                                    <option value="">--Select--</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                                    <label>Cantidad de consultas</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="cantidad" name="cantidad" min="0" max="500" 
                                            required>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                    </div>
                    <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-left">

                <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top"> <i
                        class="fas fa-share"></i>Guardar </button>

                <button type="button" class="btn btn-dark" data-dismiss="modal" id="btnCloseEdit" data-toggle="tooltip"
                    data-placement="top" title="Cancelar"><i class="fa fa-times"></i> Cerrar</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->