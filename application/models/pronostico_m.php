<?php
include_once(APPPATH . 'core/Main_Model.php');
class pronostico_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();		
		#$this->tabla_id='id_pronostico';		
		$this->tabla_name='table_pronostico';
	}

	
    
	public function List($medico=false,$mes_anno=false,$tipo=false)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		
		if($medico){$this->db->where('Table_MEDICO_ci_medico',$medico);}
		if($mes_anno){$this->db->where('mes_anno',$mes_anno);}
		if($tipo){$this->db->where('tipo',$tipo);}
		$s = $this->db->get();		
		return $s->result();
		
	}
			
	public function Add_Upd($param)
    {	   	
		if(!count($this->List($param['Table_MEDICO_ci_medico'],$param['mes_anno'],$param['tipo'])))
		{$this->db->insert($this->tabla_name, $param);}
		else{
			$this->db->where('Table_MEDICO_ci_medico',$param['Table_MEDICO_ci_medico']);
			$this->db->where('mes_anno',$param['mes_anno']);
			$this->db->where('tipo',$param['tipo']);
			$this->db->update($this->tabla_name, $param);
		}
		return $this->db->affected_rows();
	}
	
 
 
}