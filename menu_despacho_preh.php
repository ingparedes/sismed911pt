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
$menu_despacho_preh = new menu_despacho_preh();

// Run the page
$menu_despacho_preh->run();

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
	<title>Menu Despacho Prehospitalario</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<script>
		function resizeIframe(obj) {
			obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
			console.log(obj.style.height);
		}
	</script>
</head>

<body>

	<div class="container">
		<?php
		$caso = $_GET['cod_casopreh'];
		//
		$datosCaso = ExecuteRow("SELECT m.cod_casopreh, m.fecha, m.prioridad, m.incidente FROM preh_maestro m where m.cod_casopreh = '" . $caso . "';");
		$row = ExecuteScalar("SELECT cod_ambulancia FROM preh_servicio_ambulancia WHERE cod_casopreh = '" . $caso . "'"); //Consulta quien tiene servicio de ambulancia
		$cierre = ExecuteScalar("SELECT cierre FROM preh_maestro WHERE cod_casopreh = '" . $caso . "'"); //Consulta quien tiene caso sin cerrar

		?>
<div class="container">
		   <div class="card-group">
	   				 <div class="card">
							<div class="card-body">
								<div class="h1 text-muted text-right mb-4">
									<i class="fas fa-viruses"></i>
								</div>
								<div class="h4 mb-0"><?php echo $datosCaso[0]; ?></div>
								<small class="text-muted text-uppercase font-weight-bold"><?php echo $nmroCaso ?> </small>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="h1 text-muted text-right mb-4">
									<i class="icofont-clock-time"></i>
								</div>
								<div class="h4 mb-0"><?php echo $datosCaso[1]; ?></div>
								<small class="text-muted text-uppercase font-weight-bold"><?php echo $fechaCreacion ?></small>

							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="h1 text-muted text-right mb-4">
									<i class="icofont-bulb-alt"></i>
								</div>
								<div class="h4 mb-0"><?php echo $datosCaso[2]; ?></div>
								<small class="text-muted text-uppercase font-weight-bold"><?php echo $prioridad ?></small>
								
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="h1 text-muted text-right mb-4">
								<i class="icofont-ambulance"></i>
								</div>
								<div class="h4 mb-0"><?php echo $row ?></div>
								<small class="text-muted text-uppercase font-weight-bold"><?php echo $ambulancia ?></small>
							
							</div>
						</div>
					</div>
				</div>
				<div>
				<p>
				</div>

		
		<div class=class="nav nav-tabs">
			<!-- multi-page -->
			<div class="ew-nav-tabs" id="interh_evaluacionclinica_add">
				<!-- class="disabled"-->
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link" href="#menu2" data-toggle="tab"><?php echo $ambulancia ?></a></li>
					<li class="nav-item"><a class="nav-link" href="#menu4" data-toggle="tab"><?php echo $seguimiento ?></a></li>
					<?php
					if ($cierre == '0') {
						echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#menu5\" data-toggle=\"tab\">$cerrar</a></li>";
					} else {
						echo "<li class=\"nav-item disabled\"><a class=\"nav-link\" href=\"#menu5\" data-toggle=\"tab\">$cerrar</a></li>";
					}
					?>
					<button type="button" style="font-size: 24px;" class="btn btn-light" onclick="window.location.href='preh_despacholist.php'"><i class="fas fa-reply"></i></button>
				</ul>

				<div class="tab-content">

					<div id="menu2" class="tab-pane active show">
						<h3><?php echo $ambulancia ?></h3>
						<p>
							<?php
							if ($row == "") {
								$ruta = "asigna_ambulancialist.php?preh=1&cod_casopreh=" . $caso . "&id_maestrointerh=" . $caso;
							} else {
								$row = str_replace(" ", "+", $row);
								$ruta = "preh_servicio_ambulanciaedit.php?id_maestrointerh=" . $caso . "&cod_ambulancia=" . $row . "&cod_casopreh=" . $caso;
							}
							echo "<iframe width=\"100%\" height =\"1500px\" src=\"$ruta\" frameborder=\"0\" scrolling=\"no\" onload=\"resizeIframe(this)\" ></iframe> ";
							?>
						</p>
					</div>

					<div id="menu4" class="tab-pane fade">
						<h3><?php echo $seguimiento ?></h3>
						<p>
							<?php
							echo "<iframe width=\"100%\" height = \"500\" src=\"preh_seguimientoadd.php?preh=1&tipo=0&cod_casopreh=$caso&cod_pacientepreh=$caso\" frameborder=\"0\" allowfullscreen></iframe>";
							?>
						</p>
					</div>
					<div id="menu5" class="tab-pane fade">
						<h3><?php echo $cerrar ?></h3>
						<p>
							<?php
							if ($cierre == '0') {
								echo "<iframe width=\"100%\" height = \"500\" src=\"preh_cierreadd.php?cod_pacientepreh=$caso&cod_casopreh=$caso \" frameborder=\"0\" allowfullscreen></iframe>";
							}
							?>
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>

</body>

</html>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$menu_despacho_preh->terminate();
?>