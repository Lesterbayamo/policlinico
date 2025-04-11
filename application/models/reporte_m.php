<?php
include_once(APPPATH . 'core/Main_Model.php');
class reporte_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();	
		$this->load->model('labor_m');
		$this->load->model('edades_m');
		$this->load->model('especialidad_m');
		$this->load->model('medico_m');
		$this->load->model('cant_m');
		$this->load->model('trabajo_m');
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
		if($consultorio){$this->db->where('Table_CONSULTORIO_MEDICO_id_consultorio_medico',$consultorio);}		
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
		$h1['consultorio'] = $u->Nombre_cm;	 
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
	
	
	public function List_Cumplimiento($mes_anno,$fechaRango){
		$datos = $this->medico_m->List($mes_anno);

		return $this->makeData_List_Cumplimiento($datos,$fechaRango);
	}	
	public function List_Cumplimiento_Especialidad($mes_anno,$fechaRango){
		 $especialidades = $this->especialidad_m->List();
		$valores_resultado = array();
		foreach ($especialidades as $key => $value) {
			$datos = $this->medico_m->List($mes_anno,0,$value->id_especialidad);
			# code...
			if(count($datos))			
			array_push($valores_resultado,$this->makeData_List_Cumplimiento_Especialidad($datos,$fechaRango));
		}
		return $valores_resultado;
	}	
	public function List_Cumplimiento_Grupo_Trabajo($fechaRango){
		$gt = $this->trabajo_m->List();
		$fechas = explode("-",$fechaRango);
	   $valores_resultado = array();
	   foreach ($gt as $key => $value) {
		   $consultorios = array();
		   $datos = $this->consultorio_m->List(0,$value->id_grupo_trabajo);
		   foreach ($datos as $key => $valor) {
			   array_push($consultorios,$valor->id_consultorio_medico);
			}
		   $h['consultorio'] = implode(',',$consultorios);
		   $Valores  = $this->labor_m->List(3,$fechas,0,$consultorios);
		   $suma = 0;
		   foreach ($Valores as $key => $value_x) {
			# code...
			$suma += $value_x->Cantidad_paciente;
		   }
		   $h['Cantidad'] = $suma;
		   $h['Val'] = $Valores;
		   $h['Nombre_gt'] = $value->Nombre_gt;
		   $obj = (object) $h;
		   array_push($valores_resultado,$obj);
		   #array_push($valores_resultado,$this->makeData_List_Cumplimiento_Especialidad($datos,$fechaRango));
	   }
	   return $valores_resultado;
   }	
	private function makeData_List_Cumplimiento($re,$fechaRango)
	{		
	   $h = array();   
		
	   $fechas = explode("-",$fechaRango);
	   foreach ($re  as $key => $u) {		 
		$h1['Nombre_esp'] = $u->Nombre_esp;	 
		$h1['medico'] = $u->medico;			 
		$h1['ci_medico'] = $u->ci_medico;	 
		$h1['Pronostico'] = $u->Cantidad_Pronostico;	 
			 
		if ($h1['Pronostico']!='-') {
			if ($u->Nombre_esp == '-') {
				# code...
				$cant=$this->labor_m->Labor_List_Cumplimiento($u->ci_medico,$fechas);
			}else {
				# code...
				$cant=$this->labor_m->List_X_Medico($fechas,$u->ci_medico);
			}
			$h1['Cumplimiento'] = ($cant)?$cant:0;
			$h1['Porciento_Cumplimiento'] =round(intval($cant)*100/intval($u->Cantidad_Pronostico),2);
			$obj = (object) $h1;
			array_push($h, $obj);			
		} 
	   }
	   return $h;
	}
	private function makeData_List_Cumplimiento_Especialidad($re,$fechaRango)
	{		
	   $h = array();   
		
	   $fechas = explode("-",$fechaRango);
	   foreach ($re  as $key => $u) {		 
		$h1['Nombre_esp'] = $u->Nombre_esp;	 
		$h1['medico'] = $u->medico;			 
		$h1['ci_medico'] = $u->ci_medico;	 
		$h1['Pronostico'] = $u->Cantidad_Pronostico;	 
			 
		if ($h1['Pronostico']!='-') {
			if ($u->Nombre_esp == '-') {
				# code...
				$cant=$this->labor_m->Labor_List_Cumplimiento($u->ci_medico,$fechas);
			}else {
				# code...
				$cant=$this->labor_m->List_X_Medico($fechas,$u->ci_medico);
			}
			$h1['Cumplimiento'] = ($cant)?$cant:0;
			$h1['Porciento_Cumplimiento'] =round(intval($cant)*100/intval($u->Cantidad_Pronostico),2);
			$obj = (object) $h1;
			array_push($h, $obj);			
		} 
	   }
	   $res['Pronostico'] = 0;
	   $res['Cumplimiento'] = 0;
	   foreach ($h as $key => $value) {
		   $res['Pronostico'] += $value->Pronostico;
		   $res['Cumplimiento'] += $value->Cumplimiento;
		   $res['Nombre_esp'] = $value->Nombre_esp;		
		}
		if(intval($res['Pronostico'])>0)
		$res['Porciento_Cumplimiento'] =round(intval($res['Cumplimiento'])*100/intval($res['Pronostico']),2);
		else $res['Porciento_Cumplimiento'] = 0;
	   return (object) $res;
	}
 
}