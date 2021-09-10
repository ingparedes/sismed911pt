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
$Dashboard2_dashboard = new Dashboard2_dashboard();

// Run the page
$Dashboard2_dashboard->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$Dashboard2_dashboard->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdashboard, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "dashboard";
	fdashboard = currentForm = new ew.Form("fdashboard", "dashboard");
	loadjs.done("fdashboard");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<!-- Content Container -->
<div id="ew-report" class="ew-report">
<div class="btn-toolbar ew-toolbar"></div>
<?php $Dashboard2_dashboard->showPageHeader(); ?>
<?php
$Dashboard2_dashboard->showMessage();
?>
<!-- Dashboard Container -->
<div id="ew-dashboard" class="container-fluid ew-dashboard ew-vertical">
  <div class="row">
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box">
			  <span class="info-box-icon bg-info elevation-1"><i class="icofont-ambulance-cross"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Cases for days</span>
				<span class="info-box-number">
				  31.2510
				</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-viruses"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Case Covid-19</span>
				<span class="info-box-number">25</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <!-- fix for small devices only -->
		  <div class="clearfix hidden-md-up"></div>
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-success elevation-1"><i class="icofont-delivery-time"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Response time</span>
				<span class="info-box-number">15:25 Min</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hospital-user"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Case in hospital</span>
				<span class="info-box-number">8</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		</div>
<div class="row">
	<div class="col-lg-4 ">
		<div class="card">
			<h3 class="card-header">Type of services</h3>
			<div class="card-body">
<?php
$r2->Tipo_servicio->Width = 200;
$r2->Tipo_servicio->Height = 200;
$r2->Tipo_servicio->setParameter("clickurl", "r2smry.php"); // Add click URL
$r2->Tipo_servicio->DrillDownUrl = ""; // No drill down for dashboard
$r2->Tipo_servicio->render("ew-chart-top");
?>
</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<h3 class="card-header">Priority</h3>
		   <div class="card-body">
<?php
$r2->Motivo_atencion->Width = 200;
$r2->Motivo_atencion->Height = 200;
$r2->Motivo_atencion->setParameter("clickurl", "r2smry.php"); // Add click URL
$r2->Motivo_atencion->DrillDownUrl = ""; // No drill down for dashboard
$r2->Motivo_atencion->render("ew-chart-top");
?>
</div>
		</div>
	</div>	
	<div class="col-lg-4">
		<div class="card">
			<h3 class="card-header">Modality</h3>
			<div class="card-body">
<?php
$interh_hospitales->Hospital_remisor->Width = 200;
$interh_hospitales->Hospital_remisor->Height = 200;
$interh_hospitales->Hospital_remisor->setParameter("clickurl", "interh_hospitalessmry.php"); // Add click URL
$interh_hospitales->Hospital_remisor->DrillDownUrl = ""; // No drill down for dashboard
$interh_hospitales->Hospital_remisor->render("ew-chart-top");
?>
</div>
		</div>
	</div>
		<div class="card">
			<h3 class="card-header">Receiving hospital</h3>
			<div class="card-body">
<?php
$r2->Casos_por_dia->Width = 600;
$r2->Casos_por_dia->Height = 200;
$r2->Casos_por_dia->setParameter("clickurl", "r2smry.php"); // Add click URL
$r2->Casos_por_dia->DrillDownUrl = ""; // No drill down for dashboard
$r2->Casos_por_dia->render("ew-chart-top");
?>
</div>
		</div>
		<div class="card">
			<h3 class="card-header">issuing hospital</h3>
			<div class="card-body"></div>
		</div>
	<div class="card">
			<h3 class="card-header">Cases per days</h3>
			<div class="card-body"></div>
		</div>
</div> 
</div>
<!-- /.ew-dashboard -->
</div>
<!-- /.ew-report -->
<?php
$Dashboard2_dashboard->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$Dashboard2_dashboard->terminate();
?>