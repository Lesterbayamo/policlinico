      <!-- Sidebar Menu -->
      <div class="wrapper row1 container-fluid">
          <header id="header" class="clear">
              <!-- ################################################################################################ -->
              <div id="logo" class="fl_left col-9">
                  <h1><a class="nav-link" href="<?php echo base_url();?>Inicio">CONSULTAS EXTERNAS EN EL POLICLÍNICO
                          DOCENTE ÁNGEL ORTIZ VÁZQUEZ</a></h1>
              </div>
              <!-- ################################################################################################ -->
              <!-- ################################################################################################ -->

              <ul class=" navbar-nav navbar-nav-right">
                  <li class="nav-item dropdown ">
                      <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                          <div class="navbar-profile "
                              style=" display: flex;  justify-content: center; align-items: center;">
                              <img src="<?php echo base_url();?>assets/dist/img/userDefault.jpg"
                                  class="img-circle elevation-2" style="width: 40px;" alt="User Image">
                              <p class="mb-0 d-none d-sm-block navbar-profile-name" style="padding: 10px">
                                  <?php echo $this->session->userdata('nombre_usuario');?></p>
                              <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                          </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                          aria-labelledby="profileDropdown">
                          <h6 class="p-3 mb-0">Perfil</h6>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item" data-toggle='modal' data-target='#setpass'>

                              <div class="preview-item-content"
                                  style="cursor: pointer; display: flex;  justify-content: left; align-items: center;">
                                  <i class='fas fa-key'> </i>
                                  <p class="preview-subject mb-1" style="padding: 10px">Cambiar contraseña</p>
                              </div>
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item" href="<?php echo base_url();?>clogin/CerrarSesion">

                              <div class="preview-item-content"
                                  style=" display: flex;  justify-content: left; align-items: center;">
                                  <i class='fas fa-hourglass-end'> </i>
                                  <p class="preview-subject mb-1" style="padding: 10px">Desconectarse</p>
                              </div>
                          </a>
                          <div class="dropdown-divider"></div>
                          <p class="p-3 mb-0 text-center">Configuraci&oacute;n Avanzada</p>
                      </div>
                  </li>
              </ul>
              <!-- ################################################################################################ -->


              <!-- ################################################################################################ -->

              <!-- ################################################################################################ -->

              <nav id="mainav" class="fl_right">

                  <ul class="clear" style="width: 1100px;">
                      <li class="<?php echo ($this->uri->segment(1)=='Inicio')?'active':'';?>"> <a class="nav-link" href="<?php echo base_url();?>Inicio">Inicio</a> </li>


                      <li class="<?php echo ($this->uri->segment(1)=='Labor_Medico')?'active':'';?>"><a class="drop" href="#">Labor del Médico</a>
                          <ul>
                              <li class="<?php echo ($this->uri->segment(2)=='1')?'active':'';?>"><a href="<?php echo base_url();?>Labor_Medico/1">Consultas del médico de la
                                      familia</a></li>
                              <li class="<?php echo ($this->uri->segment(2)=='2')?'active':'';?>"><a href="<?php echo base_url();?>Labor_Medico/2">Consultas de los Especialistas</a>
                              </li>
                          </ul>
                      </li>
                      <li class="<?php echo ($this->uri->segment(1)=='Medico')?'active':'';?>"><a class="drop" href="#">Médicos</a>
                          <ul>
                              <li class="<?php echo ($this->uri->segment(1)=='Medico')?'active':'';?>"><a href="<?php echo base_url();?>Medico">Médicos</a></li>
                          </ul>
                      </li>
                      <li class="<?php echo ($this->uri->segment(1)=='Especialidades')?'active':'';?>"><a class="drop" href="#">Especialidades</a>
                          <ul>
                              <li class="<?php echo ($this->uri->segment(1)=='Especialidades')?'active':'';?>"><a href="<?php echo base_url();?>Especialidades">Especialidades</a></li>
                              <!--  <li><a   href="<?php echo base_url();?>Grupo_Edades">Grupos de Edades</a></li> -->
                          </ul>
                      </li>
                      <li class="<?php echo ($this->uri->segment(1)=='Grupo_Edades')?'active':'';?>"><a class="drop" href="#">Grupos de Edades</a>
                          <ul>
                              <li class="<?php echo ($this->uri->segment(1)=='Grupo_Edades')?'active':'';?>"><a href="<?php echo base_url();?>Grupo_Edades">Grupos de Edades</a></li>
                          </ul>
                      </li>
                      <li class="<?php echo ($this->uri->segment(1)=='Consultorio' || $this->uri->segment(1)=='Grupo_Trabajo')?'active':'';?>"><a class="drop" href="#">Consultorios</a>
                          <ul>
                              <li class="<?php echo ($this->uri->segment(1)=='Consultorio')?'active':'';?>"><a href="<?php echo base_url();?>Consultorio">Consultorios</a></li>
                              <li class="<?php echo ($this->uri->segment(1)=='Grupo_Trabajo')?'active':'';?>"><a href="<?php echo base_url();?>Grupo_Trabajo">Grupos de Trabajo</a></li>
                          </ul>
                      </li>
                      <li
                      class="<?php echo ($this->uri->segment(1)=='Consultas-diarias-por-especialidad' || $this->uri->segment(1)=='Consultas-diarias-por-consultorio' || $this->uri->segment(1)=='Cumplimiento-pronostico-mensual')?'active':'';?>"
                      ><a class="drop" href="#">Reportes</a>
                          <ul>
                              <li class="<?php echo ($this->uri->segment(1)=='Consultas-diarias-por-especialidad')?'active':'';?>"><a href="<?php echo base_url();?>Consultas-diarias-por-especialidad">Consultas por
                                      especialidad</a></li>
                              <li class="<?php echo ($this->uri->segment(1)=='Consultas-diarias-por-consultorio')?'active':'';?>"><a href="<?php echo base_url();?>Consultas-diarias-por-consultorio">Consultas por
                                      consultorio</a></li>
                              <li class="<?php echo ($this->uri->segment(1)=='Cumplimiento-pronostico-mensual')?'active':'';?>"><a href="<?php echo base_url();?>Cumplimiento-pronostico-mensual">Cumplimiento
                                      pronostico mensual</a></li>
                          </ul>
                      </li>
                      <li class="<?php echo ($this->uri->segment(1)=='Usuario')?'active':'';?>"><a class="drop" href="#"> Administración</a>
                          <ul>
                              <li class="<?php echo ($this->uri->segment(1)=='Usuario')?'active':'';?>"><a href="<?php echo base_url();?>Usuario">Usuario</a></li>
                          </ul>
                      </li>

                  </ul>


              </nav>
          </header>
      </div>