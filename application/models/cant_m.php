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
		
		return (count($resultado)) ? $resultado[0]->cant_x_ge : 0 ;	
	}
	public function List_Valor_X($identificador)
	{
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		$this->db->where('identificador',$identificador);
		
		
		$s = $this->db->get();		
		$resultado = $s->result();
		
		return $resultado;	
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
	public function SiExiste($datos)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		$this->db->where('identificador',$datos['identificador']);
		$this->db->where('id_ge',$datos['id_ge']);
		
		
		$s = $this->db->get();		
		$resultado = $s->result();
		$retVal = (count($resultado)) ? true : false ;
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
			$datos_comprobar['identificador']= $value['identificador'];
			$datos_comprobar['id_ge']=$value['id_ge'];
			$datos_comprobar['cant_x_ge']=$value['cant_x_ge'];
			if($this->SiExiste($datos_comprobar)){
				$this->db->where('identificador', $value['identificador']);
				$this->db->where('id_ge', $value['id_ge']);
				$this->db->update($this->tabla_name, $value);
				if($this->db->affected_rows()){
					$retVal = true;
				}
			}else {
				$this->db->insert($this->tabla_name, $datos_comprobar);
				$retVal = true;
			}		
			
		}
			
		return 	$retVal;
	}
}