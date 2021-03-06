<?php
	require_once("../../dao/ProgramacionDao.php");
	require_once("../../dao/Conexion.php");
	require_once("../../modelo/Programacion.php");
	
	header("Content-Type:application/json");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
	
	if(isset($_POST['nombre'])){
		$pac = new Programacion();
		$pac->nombre = $_POST['nombre'];
		$pac->descripcion = $_POST['descripcion'];
		$pac->hora_inicio = $_POST['hora_inicio'];
		$pac->hora_fin = $_POST['hora_fin'];
		$pac->conductores = $_POST['conductores'];
		$pac->prog_img = $_POST['prog_img'];
	 	$pac->cond_img = $_POST['cond_img'];
	 
		$con = new Conexion();
		$pDao = new ProgramacionDao($con);
		
		echo $pDao->insert($pac);
	} else {
		echo "Error al crear el objeto Programacion, no se paso el metodo POST";
	}
?>