<?php
include_once(APPPATH . 'core/Main_Model.php');
class edades_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();		
		$this->tabla_id='id_grupo_edad';		
		$this->tabla_name='table_grupo_edad';
	}

	
    
	public function List($id_esp=0,$id_ge=0)
	{
		if($id_esp){
		$this->db->select('Table_GRUPO_EDAD_id_grupo_edad');
		$this->db->from('table_especialidad_has_table_grupo_edad');				
		$this->db->where('Table_ESPECIALIDAD_id_especialidad',$id_esp);				
		$result=$this->db->get_compiled_select();	}	
		
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		if($id_esp){$this->db->where_in($this->tabla_id,$result,false);}
		if($id_ge){$this->db->where($this->tabla_id,$id_ge);}
		$this->db->order_by('Rango_edad','ASC');
		$s = $this->db->get();		
		return $s->result();
		
	}
	public function Edades_Especialidad($id=0)
	{
		$this->db->select('Table_GRUPO_EDAD_id_grupo_edad');
		$this->db->from('table_especialidad_has_table_grupo_edad');				
		$this->db->where('Table_ESPECIALIDAD_id_especialidad',$id);				
		$result=$this->db->get_compiled_select();		
		
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		$this->db->where_in($this->tabla_id,$result,false);
		$this->db->order_by('Rango_edad','ASC');
		$s = $this->db->get();		
		return $s->result();
		
	}
	
	
	
	public function Add($param)
    {	 
		$data['tabla']=$this->tabla_name;	
		$data['campo']="Rango_edad";	
		$data['id']=$param['Rango_edad'];	
		if(!$this->isRelacionado($data))  	
		$this->db->insert($this->tabla_name, $param);
		return $this->db->insert_id();
	}
	public function Upd($param)
    {	
		$data['tabla']=$this->tabla_name;	
		$data['campo']="Rango_edad";	
		$data['id']=$param['Rango_edad'];
		$data['clave_campo']=$this->tabla_id;
		$data['clave_valor']=$param[$this->tabla_id];	
		if(!$this->isRelacionado($data)) {
		$this->db->where($this->tabla_id, $param[$this->tabla_id]);
		$this->db->update($this->tabla_name, $param);			
		return $this->db->affected_rows();	}
		else {
			return 0;
		}
	}
		
	public function Delete($id)
	{			
		$aux = array($this->tabla_id => $id);
		$this->db->delete($this->tabla_name,$aux);
		return $this->db->affected_rows();			
	}
 
 
}