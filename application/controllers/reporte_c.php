<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Main_Controller.php');

class reporte_c extends Main_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('reporte_m');		
		$this->load->model('edades_m');		
		$this->data_general['_redirect']='reporte_Medico';
	}
   
	public function inicio_diario()		
	{  
		if($this->ControlAcceso()){
			if($this->input->post('fecha'))
			{
				$fecha = $this->input->post('fecha');				
			}else {
				$fecha = $this->fechaHoy()."-".$this->fechaHoy();
			}
			$param['datos'] = $this->List_Diario($fecha);			
			$param['rango_edades'] = $this->edades_m->List();			
			$param['valorFecha'] =$this->input->post('fecha');			
			$this->Cargar_Plantilla('Reportes/vdia',$param);		
		} else{
			if($this->ControlConexion()){
				$this->No_Tiene_Permiso();
			} 
			else{redirect(base_url());}
		}
	}
	
	
	public function List_Diario($fecha)
	{		
		return $this->reporte_m->List_Diario($fecha);
	}
	
	
}

