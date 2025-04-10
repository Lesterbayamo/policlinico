<?php
/**
* 
*/
include_once(APPPATH . 'core/Main_Controller.php');

class CLogin extends Main_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mlogin');
	}

	public function index()
	{
		#$data['mensaje'] = '';
		#redirect(base_url().'Autenticacion');
		$this->login();
	}
	public function login($text="")
	{
		if($text=="")
		{$data['mensaje'] = $text;}
		elseif($text == 0)
		{$data['mensaje'] = 'Cuenta de usuario no existente. Contacte al Administrador del Sistema.';}
		elseif($text == 2)
		{$data['mensaje'] = 'Cuenta de usuario INACTIVA. Contacte al Administrador del Sistema.';}
		else
		{$data['mensaje'] = "Usuario o Contraseña incorrecta.";}
		
		$this->load->view('vlogin', $data);
	}
	public function Ingresar()
	{
		$usu = $this->input->post('xUsuario');
		$pass = md5($this->input->post('xPassword'));
		
		$res = $this->mlogin->Ingresar($usu, $pass);
       # var_dump($res);return;
		if($res == 1)
		{			
			redirect(base_url().'Inicio');				
		}
		else{
			redirect(base_url().'Autenticacion/'.$res);
		}
		
	}

	public function CerrarSesion()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function CargarPortada()
	{
		#$retVal = ($this->session->userdata('rol')) ? true : false ;
		($this->ControlConexion()) ? $this->Cargar_Plantilla('vportada') :redirect(base_url().'Autenticacion/0');
		
	}
    /* public function Grafo_Neto_Mes_Campanna()
	{   
		$this->load->model('mreporte');
		$id = $this->input->get('id');				
	    echo json_encode($this->mreporte->Grafo_Neto_Mes_Campanna($id));
	}
	public function Campanna_Actual()
	{   $this->load->model('mreporte');
		echo json_encode($this->mreporte->Campanna_Actual());		
	}
	public function Campanna_Area_Contratada()
	{   $this->load->model('mreporte');
		$id = $this->input->get('id');	
		echo json_encode($this->mreporte->Campanna_Area_Contratada($id));		
	} */
}