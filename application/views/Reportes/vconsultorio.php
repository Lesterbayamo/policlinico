<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <b>
                    <h1> Consultas por consultorio</h1>
                </b>
                <input type="hidden" name="dir" id="dir" value="consultorio">
            </div>
            <div class="col-sm-2">
                <ol class="breadcrumb float-sm-right">
                    

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
                        <spam id="titulo_exportar">Reporte de las consultas en el consultorio</spam>
                    </div>
                    <!-- /.card-header -->
                  
                        <div class="form-group " style="margin-left: 15px;">
                            <label>Intervalo de Fecha</label>
                            <div class="input-group" style="width: auto;display: inline-flex;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark"><i
                                    class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" id="daterange-btn" name="fecha"
                                value="<?=$valorFecha;?>"
                                required>
                            </div>
                            <!-- /.input group -->
                        </div>
                     
                        <div class="form-group" style="margin-left: 15px;">
                            <label>Consultorio</label>
                            <div class="input-group col-2" style="margin-left: -5px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark"><i
                                            class="fas fa-spell-check"></i></span>
                                </div>
                                <select class="select2" style="width: 75%" id="consultorio"
                                    name="consultorio" required>
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                        </div>
                    <div class="card-body">
                        <table style="width: 100%" id="tb_labor" alin="center"
                            class="table table-bordered  table-hover table-condensed">
                            <thead>
                                <tr>                                    
                                    <th style="width: 5%;">Especialidad</th>
                                    <!-- <th style="width: 5%;">Tipo de Consulta</th> -->
                                    <th style="width: 5%;">CMF</th>
                                    <th style="width: 5%;">Fecha/Consulta</th>
                                    <?php foreach ($rango_edades as $key => $rango) {
                                        echo '<th style="width: 5%;">'.$rango->Rango_edad.'</th>';
                                    } ?>
                                    <th style="width: 5%;">Total</th>   
                                    
                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                    foreach ($datos as $key => $value) {
                                        # code...
                                        echo '<tr>';
                                        echo '<td>'.$value->Nombre_esp.'</td>';
                                        echo '<td>'.$value->consultorio.'</td>';
                                        /* echo '<td>'.$value->Tipo_consulta.'</td>'; */
                                        echo '<td>'.$value->Fecha_consulta.'</td>';
                                        foreach ($rango_edades as $key => $rango) {$controlValor=false;
                                            foreach ($value->Total_GE as $key => $x) {
                                                # code...
                                                if ($rango->id_grupo_edad == $x->id_ge) {
                                                    echo '<td>'.$x->cantidad.'</td>';
                                                    $controlValor=true;
                                                }
                                            }
                                            if(!$controlValor)
                                            { echo '<td>0</td>';}
                                            
                                        }                                  
                                        echo '<td>'.$value->Total_Atendido.'</td>';
                                        echo '</tr>';
                                    }
                                ?>

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



<script type="text/javascript">
var valorConsultorio = "<?=$valorConsultorio;?>";
var nombreConsultorio = "<?=$nombreConsultorio[0]->Nombre_cm;?>";

</script>




