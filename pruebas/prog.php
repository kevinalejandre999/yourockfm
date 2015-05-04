<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Prueba modelo Programacion</title>
</head>
<?php 
require_once("../modelo/Programacion.php");
require_once("../dao/Conexion.php");
require_once("../dao/ProgramacionDao.php");
?>

<body>
	<?php
		## <Primer Objeto> ##
    	
		$programacion = new Programacion();
		$programacion->prog_id = 0;
		$programacion->nombre = "YouRock-Tv";
		$programacion->descripcion = "rock en tu pantalla";
		$programacion->hora_inicio = "15:30";
		$programacion->hora_fin = "16:30";
		$programacion->conductores = "Chavy y Beco";

		## </Primer Objeto> ##		
	?>
    
<form action="../api/programacion/update.php" method="post" id="formulario">
  <input type='number' name="prog_id" id="prog_id" placeholder="Codigo">
  <input name="nombre" id="nombre" placeholder="nombre">
  <input name="descripcion" id="descripcion" placeholder="descripcion">
  <input name="hora_inicio" id="hora_inicio" placeholder="hora inicio">
  <input name="hora_fin" id="hora_fin" placeholder="hora fin">
  <input name="conductores" id="conductores" placeholder="conductores">
   <input type="submit" value="insertar">
</form>
</body>
</html>