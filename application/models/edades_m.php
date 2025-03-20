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

	
    
	public function List($id=0,$campo='fecha_creado',$orden='DESC',$bool=false)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		$this->db->join('table_especialidad','table_grupo_edad.Table_ESPECIALIDAD_id_especialidad=table_especialidad.id_especialidad');
		if($id){$this->db->where('Table_ESPECIALIDAD_id_especialidad',$id);}
		$this->db->order_by('Rango_edad','ASC');
		$s = $this->db->get();		
		return $s->result();
		
	}
	public function Edades_Especialidad($id=0)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('Rango_edad');
		$this->db->from($this->tabla_name);
		if($id){$this->db->where('Table_ESPECIALIDAD_id_especialidad',$id);}
		$this->db->order_by('Rango_edad','ASC');
		$s = $this->db->get();		
		return $s->result();
		
	}
	
	
	
	public function Add($param)
    {	   	
		$this->db->insert($this->tabla_name, $param);
		return $this->db->insert_id();
	}
	public function Upd($param)
    {	
		$this->db->where($this->tabla_id, $param[$this->tabla_id]);
		$this->db->update($this->tabla_name, $param);			
		return $this->db->affected_rows();	
	}
		
	public function Delete($id)
	{			
		$aux = array($this->tabla_id => $id);
		$this->db->delete($this->tabla_name,$aux);
		return $this->db->affected_rows();			
	}
 
 
}