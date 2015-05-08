<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        $.ajax({
			type: 'GET',
			url: "../api/visita",
			success: function(data){
				$('#res').text(data['ip']+" "+data['navegador']);
			},
			error: function(){
				console.log("Error");
			}	
		});
    });
</script>
</head>  
<body>
	<?php
		require_once("../modelo/Visita.php");
		require_once("../dao/Conexion.php");
		require_once("../dao/VisitaDao.php");
		
		$con = new Conexion();
		$vistDao= new VisitaDao($con);
		
		echo $vistDao->get_all();
		
	?>
	<div id="res"></div>
</body>
</html>