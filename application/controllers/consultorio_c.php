<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Main_Controller.php');

class consultorio_c extends Main_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('consultorio_m');		
		$this->data_general['_redirect']='Consultorio';
	}
   
	public function inicio_950124()		
	{  
		if($this->ControlAcceso()){
			$this->Cargar_Plantilla('Estructura/vconsultorio');		
		} else{
			if($this->ControlConexion()){
				$this->No_Tiene_Permiso();
			} 
			else{redirect(base_url());}
		}
	}
	
	
	public function List()
	{		
		echo json_encode($this->consultorio_m->List());
	}
	
	public function Add(){
		$param['Table_GRUPO_TRABAJO_id_grupo_trabajo'] = $this->input->post('grupo_trabajo_add');		
		$param['Nombre_cm'] = trim($this->input->post('nombre_add'));		
		$param['Direccion_cm'] = trim($this->input->post('direccion_add'));		
			
		$result = $this->consultorio_m->Add($param);
		($result) ? $this->mensaje('success', 'Datos agregados con éxito'):$this->mensaje('error', 'Error, no se pudo agregar los datos');
		$this->Redirect();	
	}

	public function Upd(){
		$param['id_consultorio_medico'] = $this->input->post('id_consultorio');		
		$param['Table_GRUPO_TRABAJO_id_grupo_trabajo'] = $this->input->post('grupo_trabajo_upd');		
		$param['Nombre_cm'] = trim($this->input->post('nombre_upd'));		
		$param['Direccion_cm'] = trim($this->input->post('direccion_upd'));		
		
			$result = $this->consultorio_m->Upd($param);
			if($result)
			{
			$this->mensaje('success', 'Datos modificados con éxito');
			}
			else
			{
				$this->mensaje('error', 'Error, no se pudo modificar los datos.');
			}			
				
		$this->Redirect();
	}

	public function Delete(){
		$id = $this->input->post('id_delete');		
		$result = $this->consultorio_m->Delete($id);

		($result) ? $this->mensaje('success', 'Datos eliminados con éxito') : $this->mensaje('error', 'Error, no se pudo eliminar los datos');
		$this->Redirect();
	}
             
	
	public function Set_estado()
	{		
		$data['estado_consultorio'] = ($this->input->post('estado')==1)?'Activo':'Inactivo';		
		$data['id_consultorio'] = $this->input->post('id');	
		$data['fecha_modificado'] =$this->hoy();		
		$data['fecha_ult_conex'] =$this->hoy();	
		$result = $this->consultorio_m->Upd($data);
		
		 if($result && $data['estado_consultorio']=='Activo')
		{
			$this->mensaje('info', 'Se modifico el estado del consultorio, a estado ACTIVO');
		}
		elseif($result && $data['estado_consultorio']!='Activo')
		{
			$this->mensaje('info', 'Se modifico el estado del consultorio, a estado INACTIVO');
		}		 
		else{$this->mensaje('error', 'Error, no se pudo modificar los datos');}

		redirect(base_url().'consultorio');
	}

	
}

