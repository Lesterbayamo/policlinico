<?php
include_once(APPPATH . 'core/Main_Model.php');
class consultorio_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();		
		$this->tabla_id='id_consultorio_medico';		
		$this->tabla_name='table_consultorio_medico';
	}

	
    
	public function List($id=0,$gt=0)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		$this->db->join('table_grupo_trabajo','table_grupo_trabajo.id_grupo_trabajo = table_consultorio_medico.Table_GRUPO_TRABAJO_id_grupo_trabajo');
		if($id){$this->db->where($this->tabla_id,$id);}
		if($gt){$this->db->where('Table_GRUPO_TRABAJO_id_grupo_trabajo',$gt);}
		$s = $this->db->get();		
		return $s->result();
		
	}
	
	
	
	
	public function Add($param)
    {	   
		$data['tabla']=$this->tabla_name;	
		$data['campo']="Nombre_cm";	
		$data['id']=$param['Nombre_cm'];	
		if(!$this->isRelacionado($data))
		$this->db->insert($this->tabla_name, $param);
		return $this->db->insert_id();
	}
	public function Upd($param)
    {	
		$data['tabla']=$this->tabla_name;	
		$data['campo']="Nombre_cm";	
		$data['id']=$param['Nombre_cm'];
		$data['clave_campo']=$this->tabla_id;
		$data['clave_valor']=$param[$this->tabla_id];	
		if(!$this->isRelacionado($data)){
		$this->db->where($this->tabla_id, $param[$this->tabla_id]);
		$this->db->update($this->tabla_name, $param);	
		return $this->db->affected_rows();	
		}		else {
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