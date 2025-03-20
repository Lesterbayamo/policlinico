<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <b>
                    <h1> GESTIÓN DE LA LABOR DE LOS MÉDICOS</h1>
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
                        <spam id="titulo_exportar">Listado de la gestión de la labor de los médicos.</spam>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table style="width: 100%" id="tb_labor" alin="center"
                            class="table table-bordered  table-hover table-condensed">
                            <thead>
                                <tr>

                                    <th style="width: 5%;">Carnet</th>
                                    <th style="width: 10%;">Médico</th>
                                    <th style="width: 5%;">Especialidad</th>
                                    <th style="width: 5%;">Tipo de Consulta</th>
                                    <th style="width: 5%;">CMF</th>
                                    <th style="width: 5%;">Fecha/Consulta</th>
                                    <th style="width: 5%;">Cantidad/Paciente</th>
                                    <th style="width: 5%;">Teléfono</th>

                                    <th style="width: 1%;">Editar</th>
                                    
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
                <h4 class="modal-title"><b> <i class="fas fa-plus"></i> AGREGAR LABOR DEL MÉDICO</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                    data-placement="top" title="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAdd" action="<?php echo base_url(); ?>labor_c/Add" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                               
                                <div class="form-group ">
                                    <label>Médico</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <select class="select2" style="width: 89%" id="medico_add" name="medico_add"
                                            required>
                                            <option value="">--Select--</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Fecha</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="fecha_add" name="fecha_add"
                                            required>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                

                                <div class="form-group ">
                                    <label>Consultorio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <select class="select2" style="width: 89%" id="consultorio_add"
                                            name="consultorio_add" required>
                                            <option value="0">--Select--</option>
                                        </select>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div id="div_rango_edad" class="row"></div>
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
                <h4 class="modal-title"><b> <i class="fa fa-edit"></i> MODIFICAR LABOR DEL MÉDICO</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                    data-placement="top" title="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUpd" action="<?php echo base_url(); ?>labor_c/Upd" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <div class="form-group ">
                                    <label>Médico</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="medico_upd" id="medico_upd"
                                            readonly>
                                        <input type="hidden" name="ci_medico_upd" id="ci_medico_upd">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Fecha</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="fecha_upd" name="fecha_upd" readonly
                                            required>
                                    </div>
                                    <!-- /.input group -->
                                </div>


                               <!--  <div class="form-group">
                                    <label>Pacientes atendidos</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="number" min="1" class="form-control" id="cantidad_upd"
                                            name="cantidad_upd" required>
                                    </div>
                                   
                                </div> -->

                                <div class="form-group ">
                                    <label>Consultorio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="consultorio_upd"
                                            id="consultorio_upd" readonly>
                                        <input type="hidden" name="id_consultorio_upd" id="id_consultorio_upd">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>Tipo de Consulta</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark"><i
                                                    class="fas fa-spell-check"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="tipo_upd"
                                            id="tipo_upd" readonly>
                                        
                                    </div>
                                </div>
                                
                                <div id="div_rango_edad_upd" class="row"></div>
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
                <form id="formCampDel" action="<?php echo base_url(); ?>consultorio_c/Delete" method="POST">
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
                <h4 class="modal-title"><b> <i class="fas fa-exchange-alt"></i> CAMBIAR ESTADO</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                    data-placement="top" title="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCampDel" action="<?php echo base_url(); ?>consultorio_c/Set_estado" method="POST">
                    <div class="card-body">
                        <!-- Parametros ocultos -->
                        <input type="hidden" id="estado" name="estado">
                        <input type="hidden" id="id" name="id">
                        <h5 id="btn1"></h5>
                    </div>
                    <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-left">

                <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top"> <i
                        class="fas fa-share"></i>CAMBIAR ESTADO </button>

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