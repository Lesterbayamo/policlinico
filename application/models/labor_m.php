<?php
include_once(APPPATH . 'core/Main_Model.php');
class labor_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();		
		#$this->tabla_id='id_especialidad';		
		$this->tabla_name='table_consultorio_medico_has_table_medico';
		$this->load->model('cant_m');
	}

	
    
	public function List($vista,$fechas=array(),$id_especialidad=0,$consultorios=array())
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*,Table_CONSULTORIO_MEDICO_id_consultorio_medico as consult,concat(Nombre_medico," ",Apellido_medico) as medico');
		$this->db->from($this->tabla_name);
		$this->db->join('table_medico','table_consultorio_medico_has_table_medico.Table_MEDICO_ci_medico=table_medico.ci_medico');
		$this->db->join('table_consultorio_medico','table_consultorio_medico_has_table_medico.Table_CONSULTORIO_MEDICO_id_consultorio_medico=table_consultorio_medico.id_consultorio_medico','LEFT');
		if($vista=="2"){
			$this->db->join('table_especialidad','table_medico.Table_ESPECIALIDAD_id_especialidad=table_especialidad.id_especialidad');
		}elseif($vista=="1"){
			$this->db->where('table_medico.Table_ESPECIALIDAD_id_especialidad',0);
		}else {
			$this->db->join('table_especialidad','table_medico.Table_ESPECIALIDAD_id_especialidad=table_especialidad.id_especialidad','LEFT');
		}		
		if ($id_especialidad) {
			$this->db->where('id_especialidad',$id_especialidad);	
		}
		if ($consultorios) {
			$this->db->where_in('Table_CONSULTORIO_MEDICO_id_consultorio_medico',$consultorios,false);	
		}
		if (count($fechas)) {
			$this->db->where('Fecha_consulta >= ',$fechas[0]);		
			$this->db->where('Fecha_consulta <= ',$fechas[1]);		
		}
		$s = $this->db->get();		
		return $this->makeData($s->result(),$vista);
		#return $s->result();		
	}
	public function List_X_Medico($fechas=array(),$ci)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*,Table_CONSULTORIO_MEDICO_id_consultorio_medico as consult,concat(Nombre_medico," ",Apellido_medico) as medico');
		$this->db->from($this->tabla_name);
		$this->db->join('table_medico','table_consultorio_medico_has_table_medico.Table_MEDICO_ci_medico=table_medico.ci_medico');
		$this->db->join('table_consultorio_medico','table_consultorio_medico_has_table_medico.Table_CONSULTORIO_MEDICO_id_consultorio_medico=table_consultorio_medico.id_consultorio_medico','LEFT');
		$this->db->join('table_especialidad','table_medico.Table_ESPECIALIDAD_id_especialidad=table_especialidad.id_especialidad');
		$this->db->where('ci_medico',$ci);	
		$this->db->where('Fecha_consulta >= ',$fechas[0]);		
		$this->db->where('Fecha_consulta <= ',$fechas[1]);		
		
		$s = $this->db->get();		
		$variable= $this->makeData_X_Medico($s->result());
		$cant = 0;
		foreach ($variable as $key => $value) {
			# code...
			$cant +=intval($value->Cantidad_paciente);
		}
		return $cant;		
	}
	private function makeData_X_Medico($re)
	{		
	   $h = array();		
	   foreach ($re  as $key => $u) {
		$h1['consult'] = $u->consult;	 			 
		$h1['ci_medico'] = $u->ci_medico;	 			 
		$h1['Fecha_consulta'] = $u->Fecha_consulta;	 			 
		$h1['Tipo_consulta'] = $u->Tipo_consulta;				 
		$identificador=md5($h1['consult'].$h1['ci_medico'].$h1['Fecha_consulta'].$h1['Tipo_consulta']);	 
		$h1['Cantidad_paciente'] = $this->cant_m->List($identificador);	 			 
		$obj = (object) $h1;
		array_push($h, $obj);
	   }
	   return $h;
	}
	private function makeData($re,$vista)
	{		
	   $h = array();		
	   foreach ($re  as $key => $u) {
		$h1['consult'] = $u->consult;	 			 
		$h1['Telefono_medico'] = $u->Telefono_medico;	 			 
		$h1['Tipo_consulta'] = $u->Tipo_consulta;
		$h1['ci_medico'] = $u->ci_medico;	 			 
		$h1['Fecha_consulta'] = $u->Fecha_consulta;	 			 
		$h1['medico'] = $u->medico;	 			 
		$h1['Nombre_cm'] = ($u->Nombre_cm)?$u->Nombre_cm:'-';
		$h1['id_especialidad'] =null;
		$h1['Cantidad_paciente'] = $u->Cantidad_paciente;
		if($vista !="1"){
			$h1['Nombre_esp'] = $u->Nombre_esp;	 			 
			$h1['id_especialidad'] = $u->id_especialidad;	 			 
			$identificador=md5($h1['consult'].$h1['ci_medico'].$h1['Fecha_consulta'].$h1['Tipo_consulta']);	 
			$h1['Cantidad_paciente'] = (!$u->Cantidad_paciente)?$this->cant_m->List($identificador):$u->Cantidad_paciente;	 			 
		}	 			 
			
		
		$obj = (object) $h1;
		array_push($h, $obj);
	   }
	   return $h;
	}
	private function isExiste($param)
	{
		//Para saber si esta relacionado con otra tabla, retorna 1 o 0
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		$this->db->where('Table_MEDICO_ci_medico', $param['Table_MEDICO_ci_medico']);
		$this->db->where('Fecha_consulta', $param['Fecha_consulta']);
		$this->db->where('Table_CONSULTORIO_MEDICO_id_consultorio_medico', $param['Table_CONSULTORIO_MEDICO_id_consultorio_medico']);
		$this->db->where('Tipo_consulta', $param['Tipo_consulta']);
		
		$this->db->limit(1);
		$s = $this->db->get();
		return count($s->result());
	}
	public function Add($param)
    {	   	
		if(!$this->isExiste($param)){
		$this->db->insert($this->tabla_name, $param);
		return $this->db->affected_rows();}else {
			return 0;
		}	
	}
	public function Upd($param)
    {	
		$this->db->where('Table_MEDICO_ci_medico', $param['Table_MEDICO_ci_medico']);
		$this->db->where('Fecha_consulta', $param['Fecha_consulta']);
		$this->db->where('Table_CONSULTORIO_MEDICO_id_consultorio_medico', $param['Table_CONSULTORIO_MEDICO_id_consultorio_medico']);
		$this->db->where('Tipo_consulta', $param['Tipo_consulta']);
		$this->db->update($this->tabla_name, $param);			
		return $this->db->affected_rows();	
	}
		
	public function Labor_List_Cumplimiento($ci,$fechas){
		$this->db->select('sum(Cantidad_paciente) as cant');
		$this->db->from($this->tabla_name);
		$this->db->where('Table_MEDICO_ci_medico',$ci);
		$this->db->where('Fecha_consulta >= ',$fechas[0]);		
		$this->db->where('Fecha_consulta <= ',$fechas[1]);	
		$s = $this->db->get();		
		$respuesta = $s->result();
		return  (count($respuesta)) ? $respuesta[0]->cant : 0 ;
	}
	public function Delete($id)
	{			
		$aux = array($this->tabla_id => $id);
		$this->db->delete($this->tabla_name,$aux);
		return $this->db->affected_rows();			
	}
 
 
}