<?php #var_dump($seccion_notificacion);
                    if(count($seccion_notificacion))
           {  ?>  
        
        <li  class="nav-item dropdown ">
          <a class="nav-link count-indicator dropdown-toggle" title="Notificaciones" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="fas fa-bell"></i>
                        
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown" style="min-width: 20rem !important;">
            <h6 class="p-3 mb-0">Médicos con % de cumplimiento bajos para la fecha actual: (<?=count($seccion_notificacion)?>)</h6>
            <?php foreach($seccion_notificacion as $notif) {?>
            <div class="dropdown-divider"></div>            
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-basket-unfill text-danger"></i>
                </div>
              </div>              
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Nombre: <?=$notif->medico?></p>
                
                <p class="text-muted ellipsis mb-0"> CI: <?=$notif->ci_medico?>/ % de cumplimiento: <?=$notif->Cumplimiento?></p>
              </div>
            </a>
          <?php }?>  
            
            <div class="dropdown-divider"></div>
            <p class="p-1 mb-0 text-center"></p>
          </div>
        </li>
        <?php } ?>