<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller 
{
  public $data=array();
  public $data_general=array();
  //private $tokenPass='86eda54c2c25e8685615ee0ff2fe23d0';
	//private $tokenPass1='3a8ddba849f3b5a324201c460ae269c9';
  public function __construct() 
  { 
    parent::__construct(); 
    ///$this->load->library("session");
    #$this->load->model('usuario_m');
    #$this->load->model('reporte_m');
    #$this->load->model('trabajador_m');
    #$this->data_general['seccion_tiempo']= $this->TiempoDesconexion(); //return;
    #$this->data_general['cumpleannos_mes']= $this->CumpleannosEnMesActual(); //return;
  }
/* Cambio de horario 1er domingo de mayo a las 12 am se adelanta una hora */
/* Cambio de horario 1er domingo de noviembre a las 2 am se atrasa una hora */
  public function mensaje($tipo='success',$texto='success')
  {$this->session->set_flashdata($tipo, $texto);}

public function hoy(){
  date_default_timezone_set('GMT');
  $gtm = time() -$this->Cambio_Horario();  
  $hoy = getdate($gtm);
	return $hoy['year'] . "-" . $hoy['mon'] . "-" . $hoy['mday'] . " " . $hoy['hours'] . ":" . $hoy['minutes'] . ":" . $hoy['seconds'];
}
public function fechaHoy($diff=0){
  date_default_timezone_set('GMT');
  $gtm = time() -$this->Cambio_Horario()-$diff*60*60*24;  
  $hoy = getdate($gtm);  
	return $hoy['year'] . "/" . $hoy['mon'] . "/" . $hoy['mday'];
}
public function fechaHoyMod($diff=0){
  date_default_timezone_set('GMT');
  $gtm = time() -$this->Cambio_Horario()-$diff*60*60*24;  
  $hoy = getdate($gtm);  
	return $hoy['year'] . "/" . $hoy['mon'] . "/1-".$hoy['year'] . "/" . $hoy['mon'] . "/" . $hoy['mday'];
}
public function Anno(){
  date_default_timezone_set('GMT');
  $gtm = time() - $this->Cambio_Horario();  
  $hoy = getdate($gtm);
	return "Año ".($hoy['year']-1958) . " de la Revolución.";
}
public function Anno_Mes_Actual()
{
  date_default_timezone_set('GMT');
  $gtm = time() - $this->Cambio_Horario();  
  $hoy = getdate($gtm);
  switch ($hoy['mon']) {
    case 1:
      $mes="01";
      break;
    case 2:
      $mes="02";
      break;
    case 3:
      $mes="03";
      break;
    case 4:
      $mes="04";
      break;
    case 5:
      $mes="05";
      break;
    case 6:
      $mes="06";
      break;
    case 7:
      $mes="07";
      break;
    case 8:
      $mes="08";
      break; 
    case 9:
      $mes="09";
      break;
    default:
      $mes = $hoy['mon'];
      break;
  }
  return $mes."-".$hoy['year'];
}
public function Anno_Mes_Actual_Siguiente()
{
  $h = array();
  date_default_timezone_set('GMT');
  $gtm = time() - $this->Cambio_Horario();  
  $hoy = getdate($gtm);
  switch ($hoy['mon']) {
    case 1:
      $mes="01";
      break;
    case 2:
      $mes="02";
      break;
    case 3:
      $mes="03";
      break;
    case 4:
      $mes="04";
      break;
    case 5:
      $mes="05";
      break;
    case 6:
      $mes="06";
      break;
    case 7:
      $mes="07";
      break;
    case 8:
      $mes="08";
      break; 
    case 9:
      $mes="09";
      break;
    default:
      $mes = $hoy['mon'];
      break;
  }
  $h1['valor'] = $mes."-".$hoy['year'];
  $obj = (object) $h1;
	array_push($h, $obj);
  
  unset($mes);
  $mes_next = ($hoy['mon'] < 12)? intval($hoy['mon'])+1 : 0;
  switch ($mes_next) {
    case 0:  
      $mes=false;    
      break;
    case 1:
      $mes="01";
      break;
    case 2:
      $mes="02";
      break;
    case 3:
      $mes="03";
      break;
    case 4:
      $mes="04";
      break;
    case 5:
      $mes="05";
      break;
    case 6:
      $mes="06";
      break;
    case 7:
      $mes="07";
      break;
    case 8:
      $mes="08";
      break; 
    case 9:
      $mes="09";
      break;
    default:
      $mes = $mes_next;
      break;
  }
  if($mes){
  $h1['valor'] = $mes."-".$hoy['year'];
  $obj = (object) $h1;
	array_push($h, $obj);}
  echo json_encode($h);
}
public function Fecha_Larga(){
  date_default_timezone_set('GMT');
  $gtm = time() - $this->Cambio_Horario();  
  $hoy = getdate($gtm);
  switch ($hoy['mon']) {
    case 1:
      $mes="Enero";
      break;
    case 2:
      $mes="Febrero";
      break;
    case 3:
      $mes="Marzo";
      break;
    case 4:
      $mes="Abril";
      break;
    case 5:
      $mes="Mayo";
      break;
    case 6:
      $mes="Junio";
      break;
    case 7:
      $mes="Julio";
      break;
    case 8:
      $mes="Agosto";
      break; 
    case 9:
      $mes="Septiembre";
      break;
    case 10:
      $mes="Octubre";
      break;
    case 11:
      $mes="Noviembre";
      break;
    case 12:
      $mes="Diciembre";
      break;
  }
	return "Bayamo MN, ".$hoy['mday'] . " de " . $mes . " del " . $hoy['year'] . ".";
}
public function TiempoDesconexion(){
  return $this->usuario_m->TiempoDesconexion($this->hoy());	
} 
public function ControlAcceso($otro=false){ 
  $rol = $this->session->userdata('rol');
  return ($rol=="Administrador"  || $otro) ? true : false  ;
}
public function ControlConexion(){  
  return ($this->session->userdata('rol')) ? true : false  ;
}
/* protected function Fun_tokenPass($password){
 return $this->tokenPass.$password.$this->tokenPass1; 
} */


function esCumpleannos($ci,$fechaActual,$especifico=false) {
  $ci = str_split($ci);
  $aa = $ci[0].$ci[1];
  $mm = $ci[2].$ci[3];
  $dd = $ci[4].$ci[5];
  // Obtenemos el año actual de la fecha proporcionada
  $fechaActualObj = new DateTime($fechaActual);
  $añoActual = $fechaActualObj->format('Y');
  
  // Creamos la fecha del cumpleaños con el año actual
  $cumpleFecha = DateTime::createFromFormat('Y-m-d', "$añoActual-$mm-$dd");
  
  if($especifico){
    // Comparamos si la fecha del cumpleaños es la misma que la fecha actual
    $retVal = ($cumpleFecha->format('m-d') === $fechaActualObj->format('m-d')) ? true : false ;
  }
    else{
      $retVal = ($cumpleFecha->format('m') === $fechaActualObj->format('m') && $cumpleFecha->format('d') >= $fechaActualObj->format('d')) ? true : false ;      
    }
    return $retVal;
}
public function CumpleannosEnMesActual(){
  $trabajadores = $this->trabajador_m->List(0,true);
  $hoy = $this->hoy();
  $lista = array();
  $fechaActualObj = new DateTime($hoy);
  $annoActual = $fechaActualObj->format('Y');
  foreach($trabajadores as $trabajador)
  {
    if($this->esCumpleannos($trabajador->ci_trabajador,$hoy))			
    {
      $ci = str_split($trabajador->ci_trabajador);
      $sex = $ci[9];
      $dd = $ci[4].$ci[5];
      $aa =intval($ci[0].$ci[1]);
      $retVal = ($aa > 0 && $aa < 24) ? '20'.$ci[0].$ci[1] : '19'.$ci[0].$ci[1] ;
      
      $h['ci_trabajador'] = $trabajador->ci_trabajador;
      $h['trabajador'] = $trabajador->trabajador;
      $h['dia_cumpleannos'] = $dd;      
      $h['annos_cumpleannos'] = $annoActual - intval($retVal);
      $h['trabajador_sexo'] =  ($sex%2==0) ? 'male' : 'female' ;
      $obj = (object) $h;
      array_push($lista, $obj);
    }
  }
  return $this->OrdenarPorDia($lista); 
}
private function OrdenarPorDia($datos){
  if(!count($datos)){return $datos;}
  $arr = array();
  foreach($datos as $dato){
    $h['ci_trabajador'] = $dato->ci_trabajador;
    $h['trabajador'] = $dato->trabajador;
    $h['dia_cumpleannos'] = $dato->dia_cumpleannos;
    $h['annos_cumpleannos'] =$dato->annos_cumpleannos;
    $h['trabajador_sexo'] = $dato->trabajador_sexo;
    array_push($arr,$h);
  }
  usort($arr,function($a,$b){
    return $a['dia_cumpleannos'] - $b['dia_cumpleannos'];
  });
  
  $list = array();
  foreach($arr as $dat){
    $h['ci_trabajador'] = $dat['ci_trabajador'];
    $h['trabajador'] = $dat['trabajador'];
    $h['dia_cumpleannos'] = $dat['dia_cumpleannos'];
    $h['annos_cumpleannos'] =$dat['annos_cumpleannos'];
    $h['trabajador_sexo'] = $dat['trabajador_sexo'];
    $obj = (object) $h;
    array_push($list, $obj);
  }
  return $list;
}
public function Acceso_Denegado(){
      $this->Cargar_Plantilla('plantilla/error_404');
}
public function Cargar_Plantilla($dir='plantilla/error_403',$param=array()){
  $this->load->view('plantilla/header');
	$this->load->view('plantilla/menu');
	#$this->load->view('plantilla/menutop',$this->data_general);			
	$this->load->view($dir,$param);
	$this->load->view('plantilla/footer');
}
public function Redirect(){
  ($this->data_general['_redirect']) ? redirect(base_url().$this->data_general['_redirect']) : $this->Cargar_Plantilla();  
}
public function Cambio_Horario(){
  $time = time();  
  $hoy = date($time);
  $fecha = strtotime($hoy);
  $anno = date('Y',$fecha);
  $primerDomingoMayo = strtotime("first sunday of May $anno");
  $primerDomingoNoviembre = strtotime("first sunday of November $anno");
  ($fecha >= $primerDomingoMayo && $fecha<=$primerDomingoNoviembre) ? $gtm = 4: $gtm=5;
  return 60*60*$gtm;
}
public function No_Tiene_Permiso(){
  $this->mensaje('info','No cuenta con los permisos necesarios.');
  redirect(base_url().'Inicio');
}
} 