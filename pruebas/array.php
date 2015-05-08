<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<?php
	$ar= array('delete'=>true,'error'=>'');
	echo json_encode($ar,JSON_PRETTY_PRINT);
	$ar['error'] = "Error";
	$ar['delete'] = false;
	echo json_encode($ar,JSON_PRETTY_PRINT);
?>
<body>
</body>
</html>