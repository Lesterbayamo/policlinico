<?php
include_once(APPPATH . 'core/Main_Model.php');
class especialidad_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();		
		$this->tabla_id='id_especialidad';		
		$this->tabla_name='table_especialidad';
	}

	
    
	public function List($id=0,$campo='fecha_creado',$orden='DESC',$bool=false)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		if($id){$this->db->where($this->tabla_id,$id);}
		$s = $this->db->get();		
		return $this->makeData($s->result());
		#return $s->result();
		
	}
	
	private function makeData($re)
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
	}
	
	public function Add($param)
    {	  
		$data['tabla']=$this->tabla_name;	
		$data['campo']="Nombre_esp";	
		$data['id']=$param['Nombre_esp'];	
		if(!$this->isRelacionado($data)) 	
		$this->db->insert($this->tabla_name, $param);
		return $this->db->insert_id();
	}
	public function Upd($param)
    {	
		$data['tabla']=$this->tabla_name;	
		$data['campo']="Nombre_esp";	
		$data['id']=$param['Nombre_esp'];	
		if(!$this->isRelacionado($data)) {
		$this->db->where($this->tabla_id, $param[$this->tabla_id]);
		$this->db->update($this->tabla_name, $param);			
		return $this->db->affected_rows();	}else{return 0;}
	}
		
	public function Delete($id)
	{			
		$aux = array($this->tabla_id => $id);
		$this->db->delete($this->tabla_name,$aux);
		return $this->db->affected_rows();			
	}
 
 
}