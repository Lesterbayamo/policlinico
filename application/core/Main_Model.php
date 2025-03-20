<?php
class Main_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		
	}

	public function isRelacionado($data)
	{
		//Para saber si esta relacionado con otra tabla, retorna 1 o 0
		$this->db->select('*');
		$this->db->from($data['tabla']);
		$this->db->where($data['campo'], $data['id']);
		$this->db->limit(1);
		$s = $this->db->get();
		return count($s->result());
	}
    
	public function ListarEnum($data)
	{
		$sql = 'SHOW COLUMNS FROM '.$data['tabla'].' WHERE FIELD= "'.$data['campo'].'"';
		$data = $this->db->query($sql)->result();		
		return $this->makeData(explode(',',str_replace("'","",substr($data[0]->Type,6,-1))));
	}
	private function makeData($values)
   {
      $h = array();
      $h1 = array();

      foreach ($values  as $v) {         
         $h1['valor'] = $v;
         
         $obj = (object) $h1;
         array_push($h, $obj);
      }
      return $h;
   }
}