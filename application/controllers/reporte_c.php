<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Main_Controller.php');

class reporte_c extends Main_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('reporte_m');		
		$this->data_general['_redirect']='reporte_Medico';
	}
   
	public function inicio_diario()		
	{  //var_dump(cal_days_in_month(CAL_GREGORIAN,3,2025));return;
		if($this->ControlAcceso()){
			$param['datos'] = $this->List_Diario();
			$this->Cargar_Plantilla('Reportes/vdia',$param);		
		} else{
			if($this->ControlConexion()){
				$this->No_Tiene_Permiso();
			} 
			else{redirect(base_url());}
		}
	}
	
	
	public function List_Diario()
	{		
		return $this->reporte_m->List_Diario();
	}
	
	
}

