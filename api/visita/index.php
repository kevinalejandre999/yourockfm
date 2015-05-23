<?php
	/*para la duracion de las sesiones - el tiempo esta en segundos*/
	ini_set("session.cookie_lifetime","3600");
	ini_set("session.gc_maxlifetime","3600");
	session_start();
	
	require_once("../../dao/VisitaDao.php");
	require_once("../../dao/Conexion.php");
	require_once("../../modelo/Visita.php");
	
	header("Content-Type:application/json");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
	
	if(!isset($_SESSION['sesion_id'])){
		
		$_SESSION['sesion_id'] = session_id();
		
		$v = new Visita();
		$v->anio = date('Y');
		$v->mes = date('m');
		$v->dia = date('d');
		$v->hora = date('h');
		$v->minuto = date('i');
		$v->segundo = date('s');
		$v->ip = getenv('REMOTE_ADDR');
		$v->navegador = $_SERVER['HTTP_USER_AGENT'];
		$v->sesion_id = $_SESSION['sesion_id'];
		
		$con = new Conexion();
		$vDao = new VisitaDao($con);
		echo $vDao->insert($v);
	
	} else {
		$v = array('sesion_iniciada'=>true, 'sesion_id'=>$_SESSION['sesion_id']);
		echo json_encode($v);
	}	
		
?>