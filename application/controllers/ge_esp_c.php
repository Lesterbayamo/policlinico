<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Main_Controller.php');

class ge_esp_c extends Main_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('edades_m');		
		$this->load->model('ge_esp_m');		
		$this->data_general['_redirect']='Relacionar-grupo-de-edad-con-especialidad';
		
	}
   
	public function inicio_950124($id)		
	{  
		if($this->ControlAcceso()){			
			$datos['id']=$id;
			$val=$this->edades_m->List(0,$id);
			$datos['rango']=$val[0]->Rango_edad;
			$datos['descripcion']=$val[0]->Descripcion_ge;
			$this->Cargar_Plantilla('Estructura/vge_esp',$datos);		
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
		
		$param['Table_GRUPO_EDAD_id_grupo_edad'] = $this->input->post('id_ge');		
		$param['Table_ESPECIALIDAD_id_especialidad'] = $this->input->post('especialidad_add');		
		$result = $this->ge_esp_m->Add($param);
		($result) ? $this->mensaje('success', 'Datos agregados con éxito'):$this->mensaje('error', 'Error, no se pudo agregar los datos');
		redirect(base_url().'Relacionar-grupo-de-edad-con-especialidad/'.$param['Table_GRUPO_EDAD_id_grupo_edad']);	
	}

	
	public function Delete(){
		$id['Table_ESPECIALIDAD_id_especialidad'] = $this->input->post('id_delete');		
		$id['Table_GRUPO_EDAD_id_grupo_edad'] = $this->input->post('id_ge');		
		$result = $this->ge_esp_m->Delete($id);

		($result) ? $this->mensaje('success', 'Datos eliminados con éxito') : $this->mensaje('error', 'Error, no se pudo eliminar los datos');
		redirect(base_url().'Relacionar-grupo-de-edad-con-especialidad/'.$id['Table_GRUPO_EDAD_id_grupo_edad']);	
	}
             
	
	

	
}

