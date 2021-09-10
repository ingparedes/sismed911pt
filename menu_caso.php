<?php
namespace PHPMaker2020\sismed911;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$menu_caso = new menu_caso();

// Run the page
$menu_caso->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Menu Caso Interhospitalario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" >
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
<?php
	$caso = $_GET['cod_casointerh'];
	$datosCaso = ExecuteRow("SELECT m.cod_casointerh, m.fechahorainterh, m.prioridadinterh FROM interh_maestro m where m.cod_casointerh = '".$caso."';");
	$row = ExecuteScalar("SELECT cod_ambulancia FROM servicio_ambulancia WHERE cod_casointerh = '".$_GET['cod_casointerh']."'"); //Consulta quien tiene servicio de ambulancia
	$cierre = ExecuteScalar("SELECT cierreinterh FROM interh_maestro WHERE cod_casointerh = '".Get('cod_casointerh')."'"); //Consulta quien tiene caso sin cerrar
	
	?>	
	<div>
	<table class="table table-bordered"><tr><th class="bg-info" scope="col">Codigo Caso:</th><td><?php echo $datosCaso[0]; ?></td><th class="bg-info" scope="col">Fecha:</th><td><?php echo $datosCaso[1]; ?></td><th class="bg-info" scope="col">Prioridad:</th><td><?php echo $datosCaso[2]; ?></td></tr> </table>
	</div>

  <!-- class="disabled"-->
  <ul class="nav nav-tabs">
	<li class="active" style="font-size: 24px;"><a class="fas fa-user-alt" data-toggle="tab" href="#home"></a></li>
	<li style="font-size: 24px;"><a class="fas fa-heartbeat" data-toggle="tab" href="#menu1"></a></li>
	<li style="font-size: 24px;"><a class="fas fa-ambulance" data-toggle="tab" href="#menu2"></a></li>
	<li style="font-size: 24px;"><a class="fas fa-hospital" data-toggle="tab" href="#menu3"></a></li>
	<li style="font-size: 24px;"><a class="fas fa-file-medical-alt" data-toggle="tab" href="#menu4"></a></li>
	<?php
	if ($cierre =='0') { 
		echo "<li style=\"font-size: 24px;\"><a class=\"far fa-window-close\" data-toggle=\"tab\" href=\"#menu5\"></a></li>";
	}else{
		echo "<li style=\"font-size: 24px;\" class=\"disabled\" ><a class=\"far fa-window-close\" href=\"#menu5\"></a></li>";
	}
	?>
	<button type="button" style="font-size: 24px;" class="btn btn-light" onclick="window.location.href='interh_maestrolist.php'"><i class="fas fa-reply"></i></button>
  </ul>

  <div class="tab-content">
	<div id="home" class="tab-pane fade in active">
	  <h3>Paciente</h3>
	  <p>
	  <?php  	  	
		echo "<iframe width=\"100%\" height = \"800\" src=\"pacientegeneraledit.php?cod_casointerh=$caso&id_paciente=$caso&cod_pacienteinterh=$caso\" frameborder=\"0\" allowfullscreen></iframe>";
	   ?>
	  </p>	 	  
	</div>
	<div id="menu1" class="tab-pane fade">
	  <h3>Evaluación Clínica</h3>      
	  <p>
	  <?php  	  	
		echo "<iframe width=\"100%\" height = \"500\" src=\"interh_evaluacionclinicaadd.php?cod_casointerh=$caso\" frameborder=\"0\" allowfullscreen></iframe>";       
	   ?>
	  </p>
	</div>
	<div id="menu2" class="tab-pane fade">
	  <h3>Ambulacia</h3>
	  <p>
	  <?php
	  if ($row == ""){
	  	$ruta = "asigna_ambulancialist.php?cod_casointerh=".$_GET['cod_casointerh']."&id_maestrointerh=".$_GET['cod_casointerh'];
	  }else{
	  		$row = str_replace(" ", "+", $row);
	  		$ruta ="servicio_ambulanciaedit.php?cod_ambulancia=".$row."&cod_casointerh=".$_GET['cod_casointerh'];
	  }
	  echo "<iframe width=\"100%\" height = \"800\" src=\"$ruta\" frameborder=\"0\" allowfullscreen></iframe> ";
	  ?>	  	  
	  </p>
	</div>
	<div id="menu3" class="tab-pane fade">
	  <h3>Hospital</h3>
	  <p>	  	
	  	<?php
		  echo "<iframe width=\"100%\" height = \"500\" src=\"interh_maestroedit.php?cod_casointerh=$caso \" frameborder=\"0\" allowfullscreen></iframe>";
		?>
	  </p>
	</div>
	<div id="menu4" class="tab-pane fade">
	  <h3>Seguiemiento de Caso</h3>
	  <p>	  	
	  <?php
		  echo "<iframe width=\"100%\" height = \"500\" src=\"interh_seguimientoadd.php?preh=0&cod_casointerh=$caso&cod_pacienteinterh=$caso\" frameborder=\"0\" allowfullscreen></iframe>";
		?>
	  </p>
	</div>
	<div id="menu5" class="tab-pane fade">
	  <h3>Cierre Caso</h3>
	  <p>	  	
	  	<?php
	  		if ($cierre=='0'){
	  			echo "<iframe width=\"100%\" height = \"500\" src=\"interh_cierreadd.php?cod_pacienteinterh=$caso&cod_casointerh=$caso \" frameborder=\"0\" allowfullscreen></iframe>";		  			  			
	  		}
		?>
	  </p>
	</div>
	
  </div>  
</div>

</body>
</html>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$menu_caso->terminate();
?>