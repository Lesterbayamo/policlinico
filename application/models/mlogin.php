<?php
/**
* 
*/
class MLogin extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_m');
	}

	

	public function Ingresar($usu, $pass,$fecha)
	{
		$this->db->select('*');
		$this->db->from('table_usuario');
		$this->db->where('usuario', $usu);
		$this->db->where('contrasenna', $pass);

		$resultado = $this->db->get();
		$r = $resultado->result();
		if (count($r))
		{
			$dato = $r[0];
			#return $dato->estado_usuario;
			if($dato->estado_usuario != 'Activo'){return 2;}
			else{
				$s_usuario = array(
					'usuario' => $dato->usuario,
					'rol' => $dato->rol,
					'id_usuario' => $dato->id_usuario,
					'nombre_usuario'=>$dato->nombre_usuario
				);
				$this->session->set_userdata($s_usuario);	
				$this->usuario_m->Upd(array(					
					'id_usuario' => $dato->id_usuario,
					'fecha_ult_conex'=>$fecha
				));		
				return 1;
			}
		} else{
			return 0;
		}	
	}
	
}