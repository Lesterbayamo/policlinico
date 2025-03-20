<?php
include_once(APPPATH . 'core/Main_Model.php');
class trabajo_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();		
		$this->tabla_id='id_grupo_trabajo';		
		$this->tabla_name='table_grupo_trabajo';
	}    
	public function List($id=0,$campo='fecha_creado',$orden='DESC',$bool=false)
	{		
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		if($id){$this->db->where($this->tabla_id,$id);}
		$s = $this->db->get();		
		return $s->result();		
	}		
	public function Add($param)
    {	   	
		$data['tabla']=$this->tabla_name;	
		$data['campo']="Nombre_gt";	
		$data['id']=$param['Nombre_gt'];	
		if(!$this->isRelacionado($data)) 
		$this->db->insert($this->tabla_name, $param);
		return $this->db->insert_id();
	}
	public function Upd($param)
    {	
		$data['tabla']=$this->tabla_name;	
		$data['campo']="Nombre_gt";	
		$data['id']=$param['Nombre_gt'];	
		if(!$this->isRelacionado($data)) {
		$this->db->where($this->tabla_id, $param[$this->tabla_id]);
		$this->db->update($this->tabla_name, $param);			
		return $this->db->affected_rows();	}else{
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