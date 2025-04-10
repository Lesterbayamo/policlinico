<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Main_Controller.php');

class edades_c extends Main_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('edades_m');		
		$this->data_general['_redirect']='Grupo_Edades';
	}
   
	public function inicio_950124()		
	{  
		if($this->ControlAcceso('Director,Especialista,Jefe Departamento')){
			$this->Cargar_Plantilla('Estructura/vedades');		
		} else{
			if($this->ControlConexion()){
				$this->No_Tiene_Permiso();
			} 
			else{redirect(base_url());}
		}
	}
	
	
	public function List()
	{		
		if(isset($_POST['valor'])){
			$id=$_POST['valor'];
		}else{$id=0;}
		echo json_encode($this->edades_m->List($id));
	}
	
	public function Add(){
		$param['Rango_edad'] = trim($this->input->post('rango_add'));		
		$param['Descripcion_ge'] = trim($this->input->post('descripcion_add'));		
		#$param['Table_ESPECIALIDAD_id_especialidad'] =$this->input->post('especialidad_add');
			
		$result = $this->edades_m->Add($param);
		($result) ? $this->mensaje('success', 'Datos agregados con éxito'):$this->mensaje('error', 'Error, no se pudo agregar los datos');
		$this->Redirect();	
	}

	public function Upd(){
		$param['id_grupo_edad'] = $this->input->post('id_horario');		
		#$param['Table_ESPECIALIDAD_id_especialidad'] =$this->input->post('especialidad_upd');
		$param['Rango_edad'] =trim($this->input->post('rango_upd'));		
		$param['Descripcion_ge'] = trim($this->input->post('descripcion_upd'));		
		
			$result = $this->edades_m->Upd($param);
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
		$result = $this->edades_m->Delete($id);

		($result) ? $this->mensaje('success', 'Datos eliminados con éxito') : $this->mensaje('error', 'Error, no se pudo eliminar los datos');
		$this->Redirect();
	}
             
	
	public function Set_estado()
	{		
		$data['estado_edades'] = ($this->input->post('estado')==1)?'Activo':'Inactivo';		
		$data['id_edades'] = $this->input->post('id');	
		$data['fecha_modificado'] =$this->hoy();		
		$data['fecha_ult_conex'] =$this->hoy();	
		$result = $this->edades_m->Upd($data);
		
		 if($result && $data['estado_edades']=='Activo')
		{
			$this->mensaje('info', 'Se modifico el estado del edades, a estado ACTIVO');
		}
		elseif($result && $data['estado_edades']!='Activo')
		{
			$this->mensaje('info', 'Se modifico el estado del edades, a estado INACTIVO');
		}		 
		else{$this->mensaje('error', 'Error, no se pudo modificar los datos');}

		redirect(base_url().'edades');
	}

	
}

