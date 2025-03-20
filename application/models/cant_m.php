<?php
include_once(APPPATH . 'core/Main_Model.php');
class cant_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();		
		#$this->tabla_id='id_pronostico';		
		$this->tabla_name='table_cant_x_ge';
	}

	
    
	public function List_Valor_X_RE($identificador,$grupo)
	{
		$this->db->select('cant_x_ge');
		$this->db->from($this->tabla_name);
		$this->db->where('identificador',$identificador);
		$this->db->where('id_ge',$grupo);
		
		$s = $this->db->get();		
		$resultado = $s->result();
		
		return $resultado[0]->cant_x_ge;
	}
	public function List($identf)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('SUM(cant_x_ge) as cant');
		$this->db->from($this->tabla_name);
		$this->db->where('identificador',$identf);
		
		
		$s = $this->db->get();		
		$resultado = $s->result();
		$retVal = (count($resultado)) ? $resultado[0]->cant : 0 ;
		return $retVal;
	}
			
	public function Add($param)
    {	  
		foreach ($param as $key => $value) {
		# code...
		$this->db->insert($this->tabla_name, $value);		
	}
		return $this->db->affected_rows();
	}
	
 
	public function Upd($param)
    {	
		$retVal = false;
		foreach ($param as $key => $value) {
			# code...
			$this->db->where('identificador', $value['identificador']);
			$this->db->where('id_ge', $value['id_ge']);
			$this->db->update($this->tabla_name, $value);
			if($this->db->affected_rows()){
				$retVal = true;
			}		
		}
			
		return 	$retVal;
	}
}