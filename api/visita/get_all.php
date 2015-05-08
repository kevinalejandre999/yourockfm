<?php
	require_once("../../dao/VisitaDao.php");
	require_once("../../dao/Conexion.php");
	require_once("../../modelo/Visita.php");
	
	header("Content-Type:application/json");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
	
	$con = new Conexion();
	$vistDao= new VisitaDao($con);
		
	echo $vistDao->get_all();
?>