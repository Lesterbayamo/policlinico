<?php
include_once(APPPATH . 'core/Main_Model.php');
class reporte_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();	
		
		$this->tabla_name='table_consultorio_medico_has_table_medico';
	}

	
    
	public function List_Diario()
	{		
		$this->db->select('Tipo_consulta,Nombre_esp,Fecha_consulta,
		SUM(Cantidad_paciente) as cant
		');
		$this->db->from('table_consultorio_medico_has_table_medico');
		$this->db->join('table_medico','table_consultorio_medico_has_table_medico.Table_MEDICO_ci_medico=table_medico.ci_medico');
		#$this->db->join('table_consultorio_medico','table_consultorio_medico_has_table_medico.Table_CONSULTORIO_MEDICO_id_consultorio_medico=table_consultorio_medico.id_consultorio_medico','LEFT');
		$this->db->join('table_especialidad','table_medico.Table_ESPECIALIDAD_id_especialidad=table_especialidad.id_especialidad');
		$this->db->group_by('Fecha_consulta');		
		$this->db->group_by('Nombre_esp');		
		$this->db->group_by('Tipo_consulta');		
		
		$s = $this->db->get();		
		#return $this->makeData($s->result());
		return $s->result();
		
	}
	
	/* private function makeData($re)
	{		
	   $h = array();	   
		
		$this->load->model('edades_m');
	   foreach ($re  as $key => $u) {
		$h1['id_especialidad'] = $u->id_especialidad;	 
		$h1['Nombre_esp'] = $u->Nombre_esp;	 
		$h1['Siglas_esp'] = $u->Siglas_esp;	 
		$h1['Descripcion_esp'] = $u->Descripcion_esp;	 
			 
		$edades = $this->edades_m->Edades_Especialidad($u->id_especialidad);
		$h_edades = array();
		foreach ($edades as $key => $val) {
			# code...
		  array_push($h_edades,$val->Rango_edad);
		}
		
		$h1['edades'] = implode(', ',$h_edades);	 
		
		$obj = (object) $h1;
		array_push($h, $obj);
	   }
	   return $h;
	} */
	
	
		
	
 
 
}