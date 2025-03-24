<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Main_Controller.php');

class usuario_c extends Main_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_m');		
		$this->data_general['_redirect']='Usuario';
	}
   
	public function inicio_950124()		
	{  
		if($this->ControlAcceso()){
			$this->Cargar_Plantilla('Estructura/vusuario');		
		} else{
			if($this->ControlConexion()){
				$this->No_Tiene_Permiso();
			} 
			else{redirect(base_url());}
		}
	}
	
	
	public function List()
	{		
		echo json_encode($this->usuario_m->List());
	}
	public function List_No_Root()
	{		
		echo json_encode($this->usuario_m->List_No_Root());
	}

	public function List_Filtro()
	{		//var_dump($this->reporte_m->Dependencia_Filtro());
		echo json_encode($this->usuario_m->List_Filtro($this->reporte_m->Usuario_Filtro()));		
	}     
	
	public function Add(){
		$param['rol'] = $this->input->post('rol_usuario_add');		
		$param['nombre_usuario'] =trim($this->input->post('nombre_usuario_add'));
		$param['usuario'] = trim($this->input->post('usuario_add'));		
		$param['creado_por'] = $this->session->userdata('id_usuario');	
		$param['contrasenna'] =md5($this->input->post('password_add'));			
		$password_confirmar = md5($this->input->post('password_confirmar_add'));		
		$param['fecha_creado'] =$this->hoy();	
		$param['fecha_modificado'] =$this->hoy();	
		
		if($password_confirmar == $param['contrasenna']){
			#var_dump($param);return;
			if(!$this->usuario_m->Existe($param))	{	
				$result = $this->usuario_m->Add($param);
				($result) ? $this->mensaje('success', 'Datos agregados con éxito'):$this->mensaje('error', 'Error, no se pudo agregar los datos');
				}
				else $this->mensaje('info', 'Usuario creado con anterioridad.');
		}else{$this->mensaje('info', 'Las contraseñas no coinciden.');}		
		
		
		
		
		$this->Redirect();	
	}

	public function Upd(){
		$param['id_usuario'] = $this->input->post('id_usuario');		
		$param['usuario'] =trim($this->input->post('usuario_upd'));
		$param['nombre_usuario'] =trim($this->input->post('nombre_usuario_upd'));		
		$param['rol'] = $this->input->post('rol_usuario_upd');		
		
		
		$password_nueva = $this->input->post('password_upd');	
		$password_confirmar = $this->input->post('password_confirmar_upd');
		
		$bool_confir = true; 
		
		if($password_nueva && $password_confirmar && $password_nueva==$password_confirmar){				
			$param['contrasenna'] =md5( $this->input->post('password_upd'));	
		}elseif($password_nueva || $password_confirmar || $password_nueva != $password_confirmar){
			$bool_confir = false; 
			$this->mensaje('error','Las contraseñas no coinciden');			
		}	
		
		
		if($bool_confir)
		{
			$result = $this->usuario_m->Upd($param);
			if($result)
			{
				$param1['id_usuario'] = $this->input->post('id_usuario');		
			$param1['fecha_modificado'] =$this->hoy();		
			$this->usuario_m->Upd($param1);
			$this->mensaje('success', 'Datos modificados con éxito');
		}
		else
		{
			$this->mensaje('error', 'Error, no se pudo modificar los datos.');
		}			
	}		
		$this->Redirect();
	}

	public function Delete(){
		$id = $this->input->post('id_delete');		
		$result = $this->usuario_m->Delete($id);

		($result) ? $this->mensaje('success', 'Datos eliminados con éxito') : $this->mensaje('error', 'Error, no se pudo eliminar los datos');
		$this->Redirect();
	}
        
        
	public function SetContrasenna(){
				
		$password_actual = md5($this->input->post('password_actual'));	
		$password_nueva = md5($this->input->post('password_nueva'));	
		$password_confirmar = md5($this->input->post('password_confirmar'));	
		if($password_nueva==$password_confirmar){
			$pass=$this->usuario_m->List($this->session->userdata('id_usuario'));	
				
			if($pass[0]->contrasenna==$password_actual){
				if($password_actual==$password_nueva){
					$this->mensaje('info','La contraseña actual y la nueva contraseña coinciden.');
				}else{
					$param['id_usuario'] = $this->input->post('id_usuario');	
					$param['contrasenna'] = $password_nueva;	
					$param['fecha_modificado'] = $this->hoy();	
					$result=$this->usuario_m->Upd($param);
					if($result){
						$this->mensaje('success','La contraseña fue actualizada');
					}else{
						$this->mensaje('danger','Error, no se pudo actualizar la contraseña');
					}

					//ok las validaciones

				}
			}else{//var_dump($pass[0]->contrasenna." - ".$password_actual); var_dump($pass,$this->session->userdata('id_usuario')); return;
				$this->mensaje('info','La contraseña actual es incorrecta.');
			}
		}else{
			$this->mensaje('info','La contraseña nueva no coincide.');

		}



		redirect(base_url().'Inicio');
	}

	public function Set_estado()
	{		
		$data['estado_usuario'] = ($this->input->post('estado')==1)?'Activo':'Inactivo';		
		$data['id_usuario'] = $this->input->post('id');	
		$data['fecha_modificado'] =$this->hoy();		
		$data['fecha_ult_conex'] =$this->hoy();	
		$result = $this->usuario_m->Upd($data);
		
		 if($result && $data['estado_usuario']=='Activo')
		{
			$this->mensaje('info', 'Se modifico el estado del usuario, a estado ACTIVO');
		}
		elseif($result && $data['estado_usuario']!='Activo')
		{
			$this->mensaje('info', 'Se modifico el estado del usuario, a estado INACTIVO');
		}		 
		else{$this->mensaje('error', 'Error, no se pudo modificar los datos');}

		redirect(base_url().'Usuario');
	}

	public function ListarEnum()
	{		
		$data['tabla'] = 'table_usuario';
		$data['campo'] = 'rol';		
		echo json_encode($this->usuario_m->ListarEnum($data));
	}
}

