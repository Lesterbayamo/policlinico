</div>
<div class="modal fade" id="setpass">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title"><b> <i class="fas fa-key"></i> CAMBIAR CONTRASEÑA</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                    data-placement="top" title="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUpd" action="<?php echo base_url(); ?>usuario_c/SetContrasenna" method="POST">
                    <div class="card-body">
                        <div class="row">


                            <input type="hidden" id="id_usuario" name="id_usuario"
                                value="<?=$this->session->userdata('id_usuario');?>" readonly>
                            <!-- <input type="text" name="controlador_actual" id="controlador_actual" value="<?=$this->uri->segment(1);?>">
               <input type="text" name="controlador_funcion" id="controlador_funcion" value="<?=$this->uri->segment(2);?>">
               <input type="text" name="parametros_url" id="parametros_url" value="0"> -->
                            <div class="form-group" style="pointer-events: none;">
                                <label>Usuario</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark"><i class="mdi mdi-account"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="password_usuario"
                                        name="password_usuario" value="<?=$this->session->userdata('usuario');?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Contraseña actual</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark"><i class="mdi mdi-key "></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="password_actual"
                                        name="password_actual" required>
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Nueva contraseña</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark"><i class="mdi mdi-key "></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="password_nueva"
                                        name="password_nueva" pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ\@\*\/\-\+\.]{8,20}$"
                                        title="Formato válido: Letras, números,@,*,/,-,+,. Entre 8 y 20 carácter"
                                        required>
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Confirmar contraseña</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark"><i class="mdi mdi-key "></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="password_confirmar"
                                        name="password_confirmar" pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ\@\*\/\-\+\.]{8,20}$"
                                        title="Formato válido: Letras, números,@,*,/,-,+,. Entre 8 y 20 carácter"
                                        required>
                                </div>
                                <!-- /.input group -->
                            </div>


                        </div>
                    </div>
                    <!-- /.card-body -->


                    <div class="modal-footer justify-content-left">
                        <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top"
                            title="Adicionar"> <b><i class="fa fa-save"></i></b> Guardar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal" id="btnCloseEdit"
                            data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fa fa-times"></i>
                            Cerrar</button>
                    </div>
                </form>

                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<div class="wrapper row6">
    <div id="copyright" class="clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2025 - Derechos Reservados - Salud Pública, Manzanillo</p>
        <p class="fl_right">Versi&oacute;n: 1.0.0</a></p>
        <!-- ################################################################################################ -->
    </div>
</div>

<script type="text/javascript">
var baseurl = "<?php echo base_url();?>";
var nivel_acceso = "<?php echo $this->session->userdata('rol');?>";
</script>

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js">
</script>
<!-- InputMask -->
<script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url();?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url();?>assets/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- Escript del proyecto -->

<script type="text/javascript">
$(function() {
    $['data-toggle = "tooltip"'].tooltip();
    
})
</script>
<?php if($this->uri->segment(1)=='Inicio') {?>
<script src="<?= base_url();?>js/grafica.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Usuario') {?>
<script src="<?= base_url();?>js/usuario.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Especialidades') {?>
<script src="<?= base_url();?>js/especialidad.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Grupo_Edades') {?>
<script src="<?= base_url();?>js/edades.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Grupo_Trabajo') {?>
<script src="<?= base_url();?>js/trabajo.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Consultorio') {?>
<script src="<?= base_url();?>js/consultorio.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Medico') {?>
<script src="<?= base_url();?>js/medico.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Cumplimiento-pronostico-mensual') {?>
<script src="<?= base_url();?>js/cumplimiento.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Labor_Medico') {?>
<script src="<?= base_url();?>js/labor.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Consultas-diarias-por-especialidad') {?>
<script src="<?= base_url();?>js/reporte_dia.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Consultas-diarias-por-consultorio') {?>
<script src="<?= base_url();?>js/reporte_consultorio.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=='Relacionar-grupo-de-edad-con-especialidad') {?>
<script src="<?= base_url();?>js/ge_esp.js"></script>
<?php }?>
<script src="<?= base_url();?>js/notificaciones.js"></script>



<script type="text/javascript">
<?php if($this->session->flashdata('success')){ ?>
toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
</script>

<script type="text/javascript">
var info = <?=$tabla_value;?>;
</script>
<!-- Page specific script -->
<script>
$(function() {
   
    //Initialize Select2 Elements
    $('#tb_notif').scroll(0,1000)
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
   
    //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Últimos 10 Días': [moment().subtract(9, 'days'), moment()],
                'Últimos 20 Días': [moment().subtract(19, 'days'), moment()],
                'Últimos 30 Días': [moment().subtract(29, 'days'), moment()],
                'Este Mes': [moment().startOf('month'), moment().endOf('month')],
                'Último Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                .endOf('month')
            ],
            'Año Actual': [moment().startOf('year'), moment()],
            'Último Año': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year')
                .endOf('year')
            ],
            }/* ,
            startDate: moment(),
            endDate: moment() */
        },
        function(start, end) {
            $('#reportrange span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'))
        }
    )
    $('#daterange-btn').change(mensaje);
    $('#consultorio').change(mensaje);
  function mensaje() {
    var formulario = document.createElement('form');
    formulario.id='form_dinamico';
    formulario.method='POST';
    formulario.action=baseurl+'Consultas-diarias-por-'+$('#dir').val();
    const input = document.createElement('input');
    input.value=$('#daterange-btn').val();
    input.hidden='true';
    input.name='fecha';
    formulario.append(input);

    const input_consultorio = document.createElement('input');
    input_consultorio.value=$('#consultorio').val();
    input_consultorio.hidden='true';
    input_consultorio.name='consultorio';
    formulario.append(input_consultorio);
    document.body.appendChild(formulario);
    formulario.submit();
 }

    
    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

})
// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
})

// DropzoneJS Demo Code Start
Dropzone.autoDiscover = false

// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template")
previewNode.id = ""
var previewTemplate = previewNode.parentNode.innerHTML
previewNode.parentNode.removeChild(previewNode)

var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
})

myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() {
        myDropzone.enqueueFile(file)
    }
})

// Update the total progress bar
myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
})

myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
})

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
})

// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
}
document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
}
// DropzoneJS Demo Code End
</script>

<script type="text/javascript">
$('[title ="Exportar a Excel"]').tooltip();
$('[title ="Exportar a Pdf"]').tooltip();
$('[title ="Imprimir"]').tooltip();
$('[title ="Editar"]').tooltip();
$('[title ="Eliminar"]').tooltip();
$('[title ="Copiar"]').tooltip();
$('[title ="Exportar como SCV"]').tooltip();
$('[title ="Columnas visibles"]').tooltip();
$('[title ="Cerrar"]').tooltip();
$('[title ="Cancelar"]').tooltip();
$('[title ="Adicionar"]').tooltip();
</script>

</body>

</html>