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
		//$this->db->order_by('Nombre_esp','ASC');	
		return $this->makeData($s->result());
		#return $s->result();
		
	}
	
	public function List_Esp_X_Ge_Not($id_ge){
		$this->db->select('Table_ESPECIALIDAD_id_especialidad');
		$this->db->from('table_especialidad_has_table_grupo_edad');				
		$this->db->where('Table_GRUPO_EDAD_id_grupo_edad',$id_ge);				
		$result=$this->db->get_compiled_select();		
		
		
		$this->db->select('*');
		$this->db->from($this->tabla_name);		
		$this->db->where_not_in($this->tabla_id,$result,false);//PARA QUE NO SE LISTE EL TRABAJADOR QUE TIENE CUENTA DE USUARIO
				
		$this->db->order_by('Nombre_esp','ASC');		
		$s = $this->db->get();		
		return $s->result();	
	}
	public function List_Esp_X_Ge_In($id_ge){
		$this->db->select('Table_ESPECIALIDAD_id_especialidad');
		$this->db->from('table_especialidad_has_table_grupo_edad');				
		$this->db->where('Table_GRUPO_EDAD_id_grupo_edad',$id_ge);				
		$result=$this->db->get_compiled_select();		
		
		
		$this->db->select('*');
		$this->db->from($this->tabla_name);		
		$this->db->where_in($this->tabla_id,$result,false);//PARA QUE NO SE LISTE EL TRABAJADOR QUE TIENE CUENTA DE USUARIO
				
		$this->db->order_by('Nombre_esp','ASC');		
		$s = $this->db->get();		
		return $s->result();	
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
		$data['clave_campo']=$this->tabla_id;
		$data['clave_valor']=$param[$this->tabla_id];
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