<?php
	require_once("../../dao/ProgramacionDao.php");
	require_once("../../dao/Conexion.php");
	require_once("../../modelo/Programacion.php");
	
	header("Content-Type:application/json");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
	
	if(isset($_POST['nombre'])){
		$pac = new Programacion();
		$pac->prog_id = (int) $_POST['prog_id'];
		$pac->nombre = $_POST['nombre'];
		$pac->descripcion = $_POST['descripcion'];
		$pac->hora_inicio = $_POST['hora_inicio'];
		$pac->hora_fin = $_POST['hora_fin'];
		$pac->conductores = $_POST['conductores'];
	 
		$con = new Conexion();
		$pDao = new ProgramacionDao($con);
		
		echo $pDao->update($pac);
	} else {
		echo "Error al crear el objeto Programacion, no se paso el metodo POST";
	}
?>