<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Main_Controller.php');

class labor_c extends Main_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('labor_m');		
				
		$this->data_general['_redirect']='Labor_Medico';
	}
   
	public function inicio_950124()		
	{  
		if($this->ControlAcceso()){
			$this->Cargar_Plantilla('Estructura/vlabor');		
		} else{
			if($this->ControlConexion()){
				$this->No_Tiene_Permiso();
			} 
			else{redirect(base_url());}
		}
	}
	
	
	public function List_Valor_X_RE(){			
		$consultorio=$this->input->post('consultorio');
		$carnet=$this->input->post('carnet');
		$fecha=$this->input->post('fecha');
		$consulta=$this->input->post('consulta');
		$grupo_edad=$this->input->post('grupo_edad');
		$identificador=md5($consultorio.$carnet.$fecha.$consulta);
		echo $this->cant_m->List_Valor_X_RE($identificador,$grupo_edad);
	}
	public function List()
	{	
		echo json_encode($this->labor_m->List());
	}
	
	
	public function Add(){
		$param['Table_CONSULTORIO_MEDICO_id_consultorio_medico'] = $this->input->post('consultorio_add');		
		$param['Table_MEDICO_ci_medico'] = $this->input->post('medico_add');		
		$param['Fecha_consulta'] = $this->input->post('fecha_add');		
		$param['Tipo_consulta'] = ($this->input->post('consultorio_add'))?"Terreno":"Policlinico";		
		$valores=array();
		$array_keys = array_keys($_POST);
		foreach ($array_keys as $key => $nombre) {
			# code...
			if(strpos('"'.$nombre.'"',"id_")){
				#echo $nombre." ";
				$valor['identificador']=md5($param['Table_CONSULTORIO_MEDICO_id_consultorio_medico'].$param['Table_MEDICO_ci_medico'].$param['Fecha_consulta'].$param['Tipo_consulta']);
				$valor['id_ge']=substr($nombre,3);
				$valor['cant_x_ge']=$_POST[$nombre];
				array_push($valores,$valor);
			}
		}
		
		
		if(!count($valores)){
			$param['Cantidad_paciente'] = $this->input->post('cantidad_add');		
		}
			
		$result = $this->labor_m->Add($param);
		if(count($valores) && $result) {			
			$this->cant_m->Add($valores);	
		}
		
		($result) ? $this->mensaje('success', 'Datos agregados con éxito'):$this->mensaje('error', 'Error, no se pudo agregar los datos');
		$this->Redirect();	
	}

	public function Upd(){
		$param['Table_MEDICO_ci_medico'] = $this->input->post('ci_medico_upd');		
		$param['Fecha_consulta'] = $this->input->post('fecha_upd');		
		$param['Table_CONSULTORIO_MEDICO_id_consultorio_medico'] = $this->input->post('id_consultorio_upd');		
		$param['Tipo_consulta'] = $this->input->post('tipo_upd');
		
		$valores=array();
		$array_keys = array_keys($_POST);
		foreach ($array_keys as $key => $nombre) {
			# code...
			if(strpos('"'.$nombre.'"',"id_")){
				#echo $nombre." ";
				$valor['identificador']=md5($param['Table_CONSULTORIO_MEDICO_id_consultorio_medico'].$param['Table_MEDICO_ci_medico'].$param['Fecha_consulta'].$param['Tipo_consulta']);
				$valor['id_ge']=substr($nombre,3);
				$valor['cant_x_ge']=$_POST[$nombre];
				array_push($valores,$valor);
			}
		}
		
		
		if(!count($valores)){
			$param['Cantidad_paciente'] = $this->input->post('cantidad_upd');		
		}else {
			$res = $this->cant_m->Upd($valores);	
		}
		#$param['Cantidad_paciente'] = $this->input->post('cantidad_upd');		
			$result = $this->labor_m->Upd($param);
			if($result || $res)
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
		$result = $this->labor_m->Delete($id);

		($result) ? $this->mensaje('success', 'Datos eliminados con éxito') : $this->mensaje('error', 'Error, no se pudo eliminar los datos');
		$this->Redirect();
	}
             
	
	public function Set_estado()
	{		
		$data['estado_labor'] = ($this->input->post('estado')==1)?'Activo':'Inactivo';		
		$data['id_labor'] = $this->input->post('id');	
		$data['fecha_modificado'] =$this->hoy();		
		$data['fecha_ult_conex'] =$this->hoy();	
		$result = $this->labor_m->Upd($data);
		
		 if($result && $data['estado_labor']=='Activo')
		{
			$this->mensaje('info', 'Se modifico el estado del labor, a estado ACTIVO');
		}
		elseif($result && $data['estado_labor']!='Activo')
		{
			$this->mensaje('info', 'Se modifico el estado del labor, a estado INACTIVO');
		}		 
		else{$this->mensaje('error', 'Error, no se pudo modificar los datos');}

		redirect(base_url().'labor');
	}

	
}

