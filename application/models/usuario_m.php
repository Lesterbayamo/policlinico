<?php
include_once(APPPATH . 'core/Main_Model.php');
class usuario_m extends Main_Model
{
	function __construct()
	{
		parent::__construct();		
		$this->tabla_id='id_usuario';		
		$this->tabla_name='table_usuario';
	}

	
    
	public function List($id=0,$campo='fecha_creado',$orden='DESC',$bool=false)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		if($id){$this->db->where($this->tabla_id,$id);}
		$s = $this->db->get();		
		return $s->result();
		
	}
	private function List_Nombre($id=0)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('nombre_usuario');
		$this->db->from($this->tabla_name);
		$this->db->where($this->tabla_id,$id);
		$s = $this->db->get();		
		$nom = $s->result();
		return $nom[0]->nombre_usuario;
		
	}
	public function List_No_Root($id=0,$campo='fecha_creado',$orden='DESC',$bool=false)
	{
		//Retorna todos los registros en caso que no se le pase un id especifico
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		$this->db->where($this->tabla_id.'!=1 ');
		#$this->db->order_by($campo,$orden);
		$s = $this->db->get();		
		return $this->makeData($s->result());
		
	}
	private function makeData($re)
	{
	   $h = array();	   
   
	   foreach ($re  as $key => $u) {  	  
		  
		$h1['id_usuario'] = $u->id_usuario;	 
		$h1['usuario'] = $u->usuario;
		$h1['rol'] = $u->rol;
		$h1['nombre_usuario'] = $u->nombre_usuario;
		$h1['fecha_creado'] = $u->fecha_creado;
		$h1['fecha_modificado'] = $u->fecha_modificado;
		$h1['fecha_ult_conex'] = $u->fecha_ult_conex;		
		$h1['estado'] = ($u->estado_usuario == 'Activo')? 1:0;		
		$h1['creado'] = $this->List_Nombre($u->creado_por);
		$obj = (object) $h1;			
		array_push($h, $obj);
	   }
	   return $h;
	}
	///////////////////////////////////////////////////////////////////////////
	public function List_Filtro($id)
	{
		//Retorna todos los usuarios que han creado algun reporte
		$this->db->select('id_usuario,concat(tb_trabajador.nombre_trabajador," ",tb_trabajador.primer_apellido," ",tb_trabajador.segundo_apellido) AS trabajador');
		$this->db->from($this->tabla_name);
		$this->db->join('tb_trabajador',$this->tabla_name.'.TB_TRABAJADOR_ci_trabajador=tb_trabajador.ci_trabajador');							
		$this->db->where_in($this->tabla_id,$id,false);
		$s = $this->db->get();		
		return $s->result();
		
	}
	
	public function Existe($param)
	{
		//Retorna todos los usuarios que han creado algun reporte
		$this->db->select('*');
		$this->db->from($this->tabla_name);
		$this->db->where('usuario',$param['usuario']);
		$s = $this->db->get();		
		return count($s->result());
		
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
 public function TiempoDesconexion($hoy){
	return $usuarios = $this->makeDataList($this->List(0,'fecha_seccion','ASC',true),$hoy);
	
 }
 private function makeDataList($re,$hoy)
 {
	$h = array();	   

	foreach ($re  as $key => $u) {
		if(!$u->estado)continue;
		if($u->rol == "Administrador")continue;
	   
	 $h1['id_usuario'] = $u->id_usuario;	 
	 $h1['fecha_seccion'] = $u->fecha_seccion;
	 $h1['trabajador'] = $u->trabajador;
	 //$h1['estado'] = $u->estado;

	 $date1 = new DateTime($u->fecha_seccion);
	 $date2 = new DateTime($hoy);
	


	 $diferencia= $date2->diff($date1);
	 $h1['dias_inactivo'] = $diferencia->d;
	 $dif ="";

	 	 
	 if($diferencia->m){		
		$h1['dias_inactivo'] +=$diferencia->m*30;
	 }

	 if($diferencia->d){
		 $dias=" día";
		 if($diferencia->d > 1){
			$dias = " días";
		 }
		 $dif= $dif." ".$diferencia->d." ".$dias;
	 } 
	
	
	 $h1['tiempo_inactivo'] = $dif;
	 $obj = (object) $h1;
	 if($diferencia->m){
		$dato['id_usuario']= $u->id_usuario;		
		$dato['estado']= 0;		
		$this->Upd($dato);
		continue;
	 }
	 if($h1['dias_inactivo'])
	 array_push($h, $obj);
	}
	return $h;
 }
}