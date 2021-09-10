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
$inicio = new inicio();

// Run the page
$inicio->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<div class="card">
	<div class="card-header">
		<h5 class="m-0">SISMED911</h5>
	</div>
	<div class="card-body">
	
	
<!-- Comentario Agregado por David Paredes. -->
<?php

$idiomas = CurrentLanguageID();


if ($idiomas == 'es') {?>
	 		<p class="card-text" align="center" > <img src="images/sismed911_logo.png"  width="642" height="153" class="img-responsive" /></p>
	 <p class="card-text" align="center" ><img src="images/paho_es.png" width="583" height="120" class="img-responsive"/></p>

<?php } if ($idiomas == 'en') {?>
	 		<p class="card-text" align="center" > <img src="images/SISMED911_logo_en.png"  width="642" height="153" class="img-responsive" /></p>
	 <p class="card-text" align="center" ><img src="images/paho_en.png" width="583" height="120" class="img-responsive"/></p>
	 
	 
<?php } if ($idiomas == 'fr') {?>
<p class="card-text" align="center" > <img src="images/SISMED911_logo_en.png"  width="642" height="153" class="img-responsive" /></p>
	 <p class="card-text" align="center" ><img src="images/paho_fr.png" width="583" height="120"  class="img-responsive"/></p>
  <?php } if ($idiomas == 'pt') {?>
  <p class="card-text" align="center" > <img src="images/SISMED911_logo_en.png"  width="642" height="153" class="img-responsive" /></p>
<p class="card-text" align="center" ><img src="images/paho_pr.png" width="583" height="120"  class="img-responsive"/></p>
  <?php }?>

	</div>
</div>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$inicio->terminate();
?>