<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH . 'core/Main_Controller.php');

class medico_c extends Main_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('medico_m');	
		$this->data_general['_redirect']='Medico';
	}
   
	public function inicio_950124()		
	{  
		if($this->ControlAcceso('Director,Especialista,Jefe Departamento')){
			$this->Cargar_Plantilla('Estructura/vmedico');		
		} else{
			if($this->ControlConexion()){
				$this->No_Tiene_Permiso();
			} 
			else{redirect(base_url());}
		}
	}
	
	
	public function List()
	{		if(isset($_POST['valor'])){
		$id=$_POST['valor'];
	}else{$id=0;}
		echo json_encode($this->medico_m->List($this->Anno_Mes_Actual(),$id));
	}
	public function List_Labor()
	{		
		$vista = $this->input->post('num');
		echo json_encode($this->medico_m->List_Labor($this->Anno_Mes_Actual(),$vista));
	}
	public function Add(){
		$param['ci_medico'] = $this->input->post('ci_medico_add');		
		$param['Table_ESPECIALIDAD_id_especialidad'] = $this->input->post('especialidad_add');		
		$param['Nombre_medico'] = $this->input->post('nombre_add');		
		$param['Apellido_medico'] = $this->input->post('apellidos_add');		
		$param['Telefono_medico'] = $this->input->post('telefono_add');		
			
		$result = $this->medico_m->Add($param);
		($result) ? $this->mensaje('success', 'Datos agregados con éxito'):$this->mensaje('error', 'Error, no se pudo agregar los datos');
		$this->Redirect();	
	}

	public function Upd(){
		$param['ci_medico'] = $this->input->post('ci_medico_upd');		
		$param['Table_ESPECIALIDAD_id_especialidad'] = $this->input->post('especialidad_upd');		
		$param['Nombre_medico'] = $this->input->post('nombre_upd');		
		$param['Apellido_medico'] = $this->input->post('apellido_upd');		
		$param['Telefono_medico'] = $this->input->post('telefono_upd');		
		
			$result = $this->medico_m->Upd($param);
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
		$result = $this->medico_m->Delete($id);

		($result) ? $this->mensaje('success', 'Datos eliminados con éxito') : $this->mensaje('error', 'Error, no se pudo eliminar los datos');
		$this->Redirect();
	}
             
	
	public function Set_pronostico()
	{		
		$data['Table_MEDICO_ci_medico'] = $this->input->post('medico');	
		$data['mes_anno'] = $this->input->post('mes');	
		$data['tipo'] = $this->input->post('tipo');	
		$data['cantidad'] = $this->input->post('cantidad');	
				
		$this->load->model('pronostico_m');	
		
		$result = $this->pronostico_m->Add_Upd($data);
		
		 if($result)
		{
			$this->mensaje('info', 'Operación completada con éxito.');
		}				 
		else{$this->mensaje('error', 'Error, no se pudo completar la operación');}

		$this->Redirect();
	}

	
}

