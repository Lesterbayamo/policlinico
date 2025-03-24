<?php
include_once(APPPATH . 'core/Main_Model.php');
class medico_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();		
		$this->tabla_id='ci_medico';		
		$this->tabla_name='table_medico';
	}

	private function makeData($mes_anno,$re)
	{		
	   $h = array();	   
		
		$this->load->model('pronostico_m');
	   foreach ($re  as $key => $u) {
		$h1['id_especialidad'] = $u->id_especialidad;	 
		$h1['Nombre_esp'] = ($u->Nombre_esp)?$u->Nombre_esp:"";	 
		$h1['medico'] = $u->medico;	 
		$h1['Siglas_esp'] = $u->Siglas_esp;	 
		$h1['Descripcion_esp'] = $u->Descripcion_esp;	 
		$h1['ci_medico'] = $u->ci_medico;	 
		$h1['Nombre_medico'] = $u->Nombre_medico;	 
		$h1['Apellido_medico'] = $u->Apellido_medico;	 
		$h1['Telefono_medico'] = $u->Telefono_medico;	 
		
		$pronostico = $this->pronostico_m->List($u->ci_medico,$mes_anno);
		$h_pronostico = array();
		foreach ($pronostico as $key => $val) {
			#	# code...
			$tipo = ($val->tipo == "Policlinico")? "Policlínico":"Terreno";
			  array_push($h_pronostico,$tipo." : ".$val->cantidad);
			}
			
			#$h1['edades'] = implode(',',$h_pronostico);	 
			$h1['Pronostico'] = implode(', ',$h_pronostico);	 
		
		$obj = (object) $h1;
		array_push($h, $obj);
	   }
	   return $h;
	}
    
	public function List($mes_anno,$id=0,$campo='fecha_creado',$orden='DESC',$bool=false)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*,concat(Nombre_medico," ",Apellido_medico) as medico');
		$this->db->from($this->tabla_name);
		$this->db->join('table_especialidad','table_especialidad.id_especialidad = table_medico.Table_ESPECIALIDAD_id_especialidad','LEFT');
		if($id){$this->db->where($this->tabla_id,$id);}
		$this->db->order_by('Apellido_medico');
		$s = $this->db->get();		
		return $this->makeData($mes_anno,$s->result());
		
	}
	public function List_Labor($mes_anno,$vista)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*,concat(Nombre_medico," ",Apellido_medico) as medico');
		$this->db->from($this->tabla_name);
		if($vista=="2"){
			$this->db->join('table_especialidad','table_medico.Table_ESPECIALIDAD_id_especialidad=table_especialidad.id_especialidad');
		}elseif($vista=="1"){
			$this->db->where('table_medico.Table_ESPECIALIDAD_id_especialidad',0);
		}else {
			$this->db->join('table_especialidad','table_medico.Table_ESPECIALIDAD_id_especialidad=table_especialidad.id_especialidad','LEFT');
		}	
		$this->db->order_by('Apellido_medico');
		$s = $this->db->get();		
		$result = $s->result();

		$h = array();	   
		
		$this->load->model('pronostico_m');
	   foreach ($result  as $key => $u) {	
		if($vista!="1")		 
		{$h1['Nombre_esp'] = ($u->Nombre_esp)?" - ".$u->Nombre_esp:"";}	
		else 
		{$h1['Nombre_esp'] = "";}	 
		$h1['medico'] = $u->medico;	 		 
		$h1['ci_medico'] = $u->ci_medico;
		/* $pronostico = $this->pronostico_m->List($u->ci_medico,$mes_anno);
		$h_pronostico = array();
		foreach ($pronostico as $key => $val) {
			#	# code...
			$tipo = ($val->tipo == "Policlinico")? "Policlínico":"Terreno";
			  array_push($h_pronostico,$tipo." : ".$val->cantidad);
			} */
			
			#$h1['edades'] = implode(',',$h_pronostico);	 
			#$h1['Pronostico'] = implode(', ',$h_pronostico);	 
		
		$obj = (object) $h1;
		#if(count($h_pronostico))
		array_push($h, $obj);
	   }
	   return $h;
		
	}
	
	
	
	public function Add($param)
    {	  
		$data['tabla']= $this->tabla_name;
		$data['campo']= $this->tabla_id;
		$data['id']=$param[$this->tabla_id];
		if(!$this->isRelacionado($data)) {	
		$this->db->insert($this->tabla_name, $param);
		return $this->db->affected_rows();
		}else{return 0;}
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