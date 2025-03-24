<?php
include_once(APPPATH . 'core/Main_Model.php');
class ge_esp_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();		
		$this->tabla_ge='Table_GRUPO_EDAD_id_grupo_edad';		
		$this->tabla_esp='Table_ESPECIALIDAD_id_especialidad';		
		$this->tabla_name='table_especialidad_has_table_grupo_edad';
	}

	
    
	public function List($ge=0)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		if($ge){$this->db->where($this->tabla_ge,$ge);}
		$s = $this->db->get();		
		#return $this->makeData($s->result());
		return $s->result();
		
	}
	
	private function makeData($re)
	{		
	   $h = array();	   
		
		#$this->load->model('edades_m');
	   foreach ($re  as $key => $u) {
		$h1['id_especialidad'] = $u->id_especialidad;	 
		$h1['Nombre_esp'] = $u->Nombre_esp;	 
		$h1['Siglas_esp'] = $u->Siglas_esp;	 
		$h1['Descripcion_esp'] = $u->Descripcion_esp;	 
			 
		#$edades = $this->edades_m->Edades_Especialidad($u->id_especialidad);
		#$h_edades = array();
		#foreach ($edades as $key => $val) {
			# code...
		#  array_push($h_edades,$val->Rango_edad);
		#}
		
		#$h1['edades'] = implode(', ',$h_edades);	 
		$h1['edades'] = "";	 
		
		$obj = (object) $h1;
		array_push($h, $obj);
	   }
	   return $h;
	}
	
	public function Add($param)
    {	  			
		$this->db->insert($this->tabla_name, $param);
		return $this->db->affected_rows();
	}
	
		
	public function Delete($param)
	{			
		#$aux = array($this->tabla_id => $id);
		$aux[$this->tabla_ge]= $param[$this->tabla_ge];
		$aux[$this->tabla_esp]= $param[$this->tabla_esp];
		
		$this->db->delete($this->tabla_name,$aux);
		return $this->db->affected_rows();			
	}
 
 
}