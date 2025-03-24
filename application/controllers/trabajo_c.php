<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Main_Controller.php');

class trabajo_c extends Main_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('trabajo_m');		
		$this->data_general['_redirect']='Grupo_Trabajo';
	}   
	public function inicio_950124()		
	{  
		if($this->ControlAcceso()){	$this->Cargar_Plantilla('Estructura/vtrabajo');		
		} else{	if($this->ControlConexion()){$this->No_Tiene_Permiso();	} else{redirect(base_url());}		}
	}	
	public function List()
	{	echo json_encode($this->trabajo_m->List());	}	
	public function Add(){
		$param['Nombre_gt'] =trim($this->input->post('nombre_add'));		
		$param['Descripcion_gt'] =trim($this->input->post('descripcion_add'));				
		$result = $this->trabajo_m->Add($param);
		($result) ? $this->mensaje('success', 'Datos agregados con éxito'):$this->mensaje('error', 'Error, no se pudo agregar los datos');
		$this->Redirect();	
	}
	public function Upd(){
		$param['id_grupo_trabajo'] = $this->input->post('id_trabajo');			
		$param['Nombre_gt'] =trim($this->input->post('nombre_upd'));
		$param['Descripcion_gt'] = trim($this->input->post('descripcion_upd'));
		$result = $this->trabajo_m->Upd($param);
		($result) ? $this->mensaje('success', 'Datos modificados con éxito') : $this->mensaje('error', 'Error, no se pudo modificar los datos.');
		$this->Redirect();
	}
	public function Delete(){
		$id = $this->input->post('id_delete');		
		$result = $this->trabajo_m->Delete($id);
		($result) ? $this->mensaje('success', 'Datos eliminados con éxito') : $this->mensaje('error', 'Error, no se pudo eliminar los datos');
		$this->Redirect();
	}   
	
}

