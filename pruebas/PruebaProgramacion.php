<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Prueba modelo Programacion</title>
</head>
<?php require_once("../modelo/Programacion.php")?>
<body>
	<?php
		## <Primer Objeto> ##
    	
		$programacion = new Programacion();
		$programacion->prog_id = 34;
		$programacion->nombre = "Nacion Rock";
		$programacion->descripcion = "Lo mejor del rock nacional e internacional";
		$programacion->hora_inicio = "11:30";
		$programacion->hora_fin = "12:30";
		$programacion->en_aire = true;
		$programacion->conductores = "Gabriel Franco y Juancho";
		echo $programacion;
		
		## </Primer Objeto> ##
	?>
</body>
</html>