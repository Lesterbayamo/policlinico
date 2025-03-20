<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Main_Controller.php');

class especialidad_c extends Main_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('especialidad_m');		
		$this->data_general['_redirect']='Especialidades';
	}
   
	public function inicio_950124()		
	{  
		if($this->ControlAcceso()){
			$this->Cargar_Plantilla('Estructura/vespecialidad');		
		} else{
			if($this->ControlConexion()){
				$this->No_Tiene_Permiso();
			} 
			else{redirect(base_url());}
		}
	}
	
	
	public function List()
	{		
		echo json_encode($this->especialidad_m->List());
	}
	
	public function Add(){
		$param['Nombre_esp'] = $this->input->post('nombre_especialidad_add');		
		$param['Siglas_esp'] =$this->input->post('abreviatura_add');
		$param['Descripcion_esp'] = $this->input->post('descripcion_add');		
		$result = $this->especialidad_m->Add($param);
		($result) ? $this->mensaje('success', 'Datos agregados con éxito'):$this->mensaje('error', 'Error, no se pudo agregar los datos');
		$this->Redirect();	
	}

	public function Upd(){
		$param['id_especialidad'] = $this->input->post('id_especialidad');		
		$param['Nombre_esp'] =$this->input->post('nombre_especialidad_upd');
		$param['Siglas_esp'] =$this->input->post('abreviatura_upd');		
		$param['Descripcion_esp'] = $this->input->post('descripcion_upd');		
		
			$result = $this->especialidad_m->Upd($param);
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
		$result = $this->especialidad_m->Delete($id);

		($result) ? $this->mensaje('success', 'Datos eliminados con éxito') : $this->mensaje('error', 'Error, no se pudo eliminar los datos');
		$this->Redirect();
	}
             
	
	public function Set_estado()
	{		
		$data['estado_especialidad'] = ($this->input->post('estado')==1)?'Activo':'Inactivo';		
		$data['id_especialidad'] = $this->input->post('id');	
		$data['fecha_modificado'] =$this->hoy();		
		$data['fecha_ult_conex'] =$this->hoy();	
		$result = $this->especialidad_m->Upd($data);
		
		 if($result && $data['estado_especialidad']=='Activo')
		{
			$this->mensaje('info', 'Se modifico el estado del especialidad, a estado ACTIVO');
		}
		elseif($result && $data['estado_especialidad']!='Activo')
		{
			$this->mensaje('info', 'Se modifico el estado del especialidad, a estado INACTIVO');
		}		 
		else{$this->mensaje('error', 'Error, no se pudo modificar los datos');}

		redirect(base_url().'especialidad');
	}

	
}

