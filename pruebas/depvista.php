<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
	/*$(document).ready(function() {
        $.ajax({
			type: 'POST',
			url: "../api/visita",
			success: function(data){
				$('#res').text(data['ip']+" "+data['navegador']);
			},
			error: function(){
				console.log("Error");
			}	
		});
    });*/
</script>
</head>  
<body>
	<?php
		require_once("../modelo/Visita.php");
		require_once("../dao/Conexion.php");
		require_once("../dao/VisitaDao.php");
		
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
		$resp= $vDao->insert($v);
		echo $resp;
		
	?>
</body>
</html>