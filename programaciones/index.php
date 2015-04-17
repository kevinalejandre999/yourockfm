<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion de Programaciones</title>
<link rel="stylesheet" type="text/css" href="../css/gestprog.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script src="../fonts/cufon/cufon-yui.js"></script>
<script src="../fonts/cufon/capture-it.cufonfonts.js"></script>
</head>
<body class="container borde">
<header>
    <nav>
    	<img id="logo" src="../img/slogo.png">
        <div class="navbar navbar-inverse">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle borde" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a id="fcap" class="navbar-brand" href="#" style="font-size:22px">YouRock-Fm 88.9</a>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#contact">Contact</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li class="dropdown-header">Nav header</li>
                      <li><a href="#">Separated link</a></li>
                      <li><a href="#">One more separated link</a></li>
                    </ul>
                  </li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
        </div>    
    </nav>
</header>
<section class="borde">
	<form id="formulario" class="form-inline" action="procesar.php" method="POST">
    	<fieldset>
            <legend id="fcap" style="font-size:24px;color:#CCC;">
                Programaciones
            </legend>
            <input type="text" placeholder="Nombre" class="form-control">
            <input type="text" placeholder="Descripcion" class="form-control">
            <input type="text" placeholder="Hora de Inicio" class="form-control">
            <input type="text" placeholder="Hora de Fin" class="form-control">
            <input type="text" placeholder="Conductores" class="form-control">
            <input type="button" class="btn" value="Insertar">
        </fieldset>    
    </form>
</section>
</body>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-button.js"></script>
<script type="text/javascript">
    	Cufon.replace('#fcap', { fontFamily: 'Capture it', hover: true }); 
</script>
</html>