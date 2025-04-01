<?php
include_once(APPPATH . 'core/Main_Model.php');
class reporte_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();	
		$this->load->model('labor_m');
		$this->load->model('edades_m');
		$this->load->model('cant_m');
		$this->tabla_name='table_consultorio_medico_has_table_medico';
	}

	
    
	public function List_Diario($rangoFecha,$tipo,$consultorio)
	{		
		$fechas = explode("-",$rangoFecha);//return $fechas; 
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		$this->db->join('table_medico','table_consultorio_medico_has_table_medico.Table_MEDICO_ci_medico=table_medico.ci_medico');
		$this->db->join('table_consultorio_medico','table_consultorio_medico_has_table_medico.Table_CONSULTORIO_MEDICO_id_consultorio_medico=table_consultorio_medico.id_consultorio_medico',$tipo);
		$this->db->join('table_especialidad','table_medico.Table_ESPECIALIDAD_id_especialidad=table_especialidad.id_especialidad');
		$this->db->where('Fecha_consulta >= ',$fechas[0]);		
		$this->db->where('Fecha_consulta <= ',$fechas[1]);		
		if($consultorio){$this->db->where('table_consultorio_medico_has_table_medico',$consultorio);}		
		$this->db->group_by('Fecha_consulta');		
		$this->db->group_by('Nombre_esp');		
		$this->db->group_by('Tipo_consulta');
		$this->db->order_by('Fecha_consulta','ASC');		
		$this->db->order_by('Nombre_esp','ASC');		
		$this->db->order_by('Tipo_consulta','ASC');		
		
		$s = $this->db->get();		
		return $this->makeData($s->result(),$fechas);
		#return $s->result();
		
		
	}
	
	private function makeData($re,$fechas)
	{		
	   $h = array();	   
		
		
	   foreach ($re  as $key => $u) {
		$h1['Tipo_consulta'] = $u->Tipo_consulta;	 
		$h1['Nombre_esp'] = $u->Nombre_esp;	 
		$h1['Fecha_consulta'] = $u->Fecha_consulta;	 
		$sumaTotal=0;
		$sumaTotalGE=array();
		$valores = $this->labor_m->List(2,$fechas,$u->id_especialidad);
		foreach ($valores as $key => $value) {			
			if ($u->Fecha_consulta == $value->Fecha_consulta && $u->Tipo_consulta == $value->Tipo_consulta) {
				$sumaTotal += intval( $value->Cantidad_paciente);
				$identificador=md5($value->consult.$value->ci_medico.$value->Fecha_consulta.$value->Tipo_consulta);
				array_push($sumaTotalGE,"'".$identificador."'");
			}			
		}	
		
		$sumaTotalGE=$this->cant_m->List_Valor_X($sumaTotalGE);
		$h1['Total_Atendido'] = $sumaTotal;	 
		$h1['Total_GE'] = $sumaTotalGE;	 
		
		$edades = $this->edades_m->List();
		$h_edades = array();
		#foreach ($edades as $key => $val) {
			# code...
		#  array_push($h_edades,$val->Rango_edad);
		#}
		
		#$h1['edades'] = implode(', ',$h_edades);	 
		#$h2 = array_merge($h1,$h_edades);
		$obj = (object) $h1;
		array_push($h, $obj);
	   }
	   return $h;
	}
	
	
		
	
 
 
}