<?php
	require_once("../../dao/ProgramacionDao.php");
	require_once("../../dao/Conexion.php");
	require_once("../../modelo/Programacion.php");
	
	header("Content-Type:application/json");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
	
	if(isset($_POST['prog_id'])){
	 	$prog_id = $_POST['prog_id'];
		$con = new Conexion();
		$pDao = new ProgramacionDao($con);
		
		echo $pDao->delete($prog_id);
	} else {
		echo "Error, no se paso el metodo POST";
	}
?>