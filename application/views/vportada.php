<section class="content-header">
  <!-- <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1><b>SISTEMA AUTOMATIZADO PARA LA CCS MARTIRES DEL CAUTO, RIO CAUTO</b></h1>
      </div>     
    </div>
  </div> -->
  <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $this->db->count_all('table_medico');?></h3>
            <p>MÉDICOS</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
              <a href="<?php echo base_url();?>Medico" class="small-box-footer">M&aacute;s Informaci&oacute;n... <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
     
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $this->db->count_all('table_especialidad');?></h3>
                <p>ESPECIALIDAD</p>
              </div>
              <div class="icon">
                <i class="fa fa-graduation-cap"></i>
              </div>
              <a href="<?php echo base_url();?>Especialidades" class="small-box-footer">M&aacute;s Informaci&oacute;n... <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $this->db->count_all('table_consultorio_medico');?></h3>

                <p>CONSULTORIOS MÉDICOS</p>
              </div>
              <div class="icon">
                <i class="fas fa-building"></i>
              </div>
              <a href="<?php echo base_url();?>Consultorio" class="small-box-footer">M&aacute;s Informaci&oacute;n... <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $this->db->count_all('table_grupo_trabajo');?></h3>
                <p>GRUPO DE TRABAJO</p>
              </div>
              <div class="icon">
                <i class="fa fa-briefcase"></i>
              </div>
              <a href="<?php echo base_url();?>Grupo_Trabajo" class="small-box-footer">M&aacute;s Informaci&oacute;n... <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
</section>
<!-- /.content -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Box Comment -->
        <br><br>
        <h4 hidden><b>La Cooperativa de Cr&eacute;ditos y Servicios (CCS) M&aacute;rtires del Cauto, R&iacute;o Cauto est&aacute; dedicada a la producci&oacute;n  de arroz, carne vacuna y leche como su tarea econ&oacute;mica fundamental.</h4><br>          
        <br>
        <div class="hidden card card-widget">
          <div class="card-header bg-success">                        
              <span class="username"><b> Estado campaña actual.  </b></span>        
            <div class="card-tools">                  
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">  
            <!-- <h4><b>La Cooperativa de Cr&eacute;ditos y Servicios (CCS) M&aacute;rtires del Cauto, R&iacute;o Cauto est&aacute; dedicada a la producci&oacute;n  de arroz, carne vacuna y leche como su tarea econ&oacute;mica fundamental.</h4><br>           -->
           <!--Trabajando aqui -->
           <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                    
                      <strong id="periodo"> </strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="grafo_estado_campanna" height="128" style="height: 192px; width: 569px;" width="379"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Datos Generales</strong>
                    </p>

                    <div class="progress-group">
                      Plan
                      <span id="plan" class="float-right"></span>
                      <div class="progress progress-sm">
                        <div id="plan_pc" class="progress-bar" ></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Cumplimiento
                      <span id="cumplimiento" class="float-right"></span>
                      <div class="progress progress-sm">
                        <div id="cumplimiento_pc" class="progress-bar" ></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Rendimiento
                      <span id="rendimiento" class="float-right"></span>
                      <div class="progress progress-sm">
                        <div id="rendimiento_pc" class="progress-bar bg-warning"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                   
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
           <!--Fin del trabajo -->

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- =========================================================== -->
       
    
    <div class="hidden card card-success">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card mb-2 bg-gradient-dark">
              <img class="card-img-top" src="<?php echo base_url();?>assets/dist/img/dos.jpg" alt="Dist Photo 1">
              
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card mb-2">
              <img class="card-img-top" src="<?php echo base_url();?>assets/dist/img/tres.jpg" alt="Dist Photo 2">
              <div class="card-img-overlay d-flex flex-column justify-content-center">
                
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card mb-2">
              <img class="card-img-top" src="<?php echo base_url();?>assets/dist/img/cuatro.jpg" alt="Dist Photo 3">
              <div class="card-img-overlay">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content --> 