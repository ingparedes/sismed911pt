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
$servicio_ambulancia_view = new servicio_ambulancia_view();

// Run the page
$servicio_ambulancia_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicio_ambulancia_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$servicio_ambulancia_view->isExport()) { ?>
<script>
var fservicio_ambulanciaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fservicio_ambulanciaview = currentForm = new ew.Form("fservicio_ambulanciaview", "view");
	loadjs.done("fservicio_ambulanciaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$servicio_ambulancia_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $servicio_ambulancia_view->ExportOptions->render("body") ?>
<?php $servicio_ambulancia_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $servicio_ambulancia_view->showPageHeader(); ?>
<?php
$servicio_ambulancia_view->showMessage();
?>
<form name="fservicio_ambulanciaview" id="fservicio_ambulanciaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicio_ambulancia">
<input type="hidden" name="modal" value="<?php echo (int)$servicio_ambulancia_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($servicio_ambulancia_view->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
	<tr id="r_id_servcioambulacia">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_id_servcioambulacia"><script id="tpc_servicio_ambulancia_id_servcioambulacia" type="text/html"><?php echo $servicio_ambulancia_view->id_servcioambulacia->caption() ?></script></span></td>
		<td data-name="id_servcioambulacia" <?php echo $servicio_ambulancia_view->id_servcioambulacia->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_id_servcioambulacia" type="text/html"><span id="el_servicio_ambulancia_id_servcioambulacia">
<span<?php echo $servicio_ambulancia_view->id_servcioambulacia->viewAttributes() ?>><?php echo $servicio_ambulancia_view->id_servcioambulacia->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->cod_casointerh->Visible) { // cod_casointerh ?>
	<tr id="r_cod_casointerh">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_cod_casointerh"><script id="tpc_servicio_ambulancia_cod_casointerh" type="text/html"><?php echo $servicio_ambulancia_view->cod_casointerh->caption() ?></script></span></td>
		<td data-name="cod_casointerh" <?php echo $servicio_ambulancia_view->cod_casointerh->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_cod_casointerh" type="text/html"><span id="el_servicio_ambulancia_cod_casointerh">
<span<?php echo $servicio_ambulancia_view->cod_casointerh->viewAttributes() ?>><?php echo $servicio_ambulancia_view->cod_casointerh->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->cod_ambulancia->Visible) { // cod_ambulancia ?>
	<tr id="r_cod_ambulancia">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_cod_ambulancia"><script id="tpc_servicio_ambulancia_cod_ambulancia" type="text/html"><?php echo $servicio_ambulancia_view->cod_ambulancia->caption() ?></script></span></td>
		<td data-name="cod_ambulancia" <?php echo $servicio_ambulancia_view->cod_ambulancia->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_cod_ambulancia" type="text/html"><span id="el_servicio_ambulancia_cod_ambulancia">
<span<?php echo $servicio_ambulancia_view->cod_ambulancia->viewAttributes() ?>><?php echo $servicio_ambulancia_view->cod_ambulancia->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->hora_asigna->Visible) { // hora_asigna ?>
	<tr id="r_hora_asigna">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_hora_asigna"><script id="tpc_servicio_ambulancia_hora_asigna" type="text/html"><?php echo $servicio_ambulancia_view->hora_asigna->caption() ?></script></span></td>
		<td data-name="hora_asigna" <?php echo $servicio_ambulancia_view->hora_asigna->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_hora_asigna" type="text/html"><span id="el_servicio_ambulancia_hora_asigna">
<span<?php echo $servicio_ambulancia_view->hora_asigna->viewAttributes() ?>><?php echo $servicio_ambulancia_view->hora_asigna->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->hora_llegada->Visible) { // hora_llegada ?>
	<tr id="r_hora_llegada">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_hora_llegada"><script id="tpc_servicio_ambulancia_hora_llegada" type="text/html"><?php echo $servicio_ambulancia_view->hora_llegada->caption() ?></script></span></td>
		<td data-name="hora_llegada" <?php echo $servicio_ambulancia_view->hora_llegada->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_hora_llegada" type="text/html"><span id="el_servicio_ambulancia_hora_llegada">
<span<?php echo $servicio_ambulancia_view->hora_llegada->viewAttributes() ?>><?php echo $servicio_ambulancia_view->hora_llegada->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->hora_inicio->Visible) { // hora_inicio ?>
	<tr id="r_hora_inicio">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_hora_inicio"><script id="tpc_servicio_ambulancia_hora_inicio" type="text/html"><?php echo $servicio_ambulancia_view->hora_inicio->caption() ?></script></span></td>
		<td data-name="hora_inicio" <?php echo $servicio_ambulancia_view->hora_inicio->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_hora_inicio" type="text/html"><span id="el_servicio_ambulancia_hora_inicio">
<span<?php echo $servicio_ambulancia_view->hora_inicio->viewAttributes() ?>><?php echo $servicio_ambulancia_view->hora_inicio->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->hora_destino->Visible) { // hora_destino ?>
	<tr id="r_hora_destino">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_hora_destino"><script id="tpc_servicio_ambulancia_hora_destino" type="text/html"><?php echo $servicio_ambulancia_view->hora_destino->caption() ?></script></span></td>
		<td data-name="hora_destino" <?php echo $servicio_ambulancia_view->hora_destino->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_hora_destino" type="text/html"><span id="el_servicio_ambulancia_hora_destino">
<span<?php echo $servicio_ambulancia_view->hora_destino->viewAttributes() ?>><?php echo $servicio_ambulancia_view->hora_destino->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->hora_preposicion->Visible) { // hora_preposicion ?>
	<tr id="r_hora_preposicion">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_hora_preposicion"><script id="tpc_servicio_ambulancia_hora_preposicion" type="text/html"><?php echo $servicio_ambulancia_view->hora_preposicion->caption() ?></script></span></td>
		<td data-name="hora_preposicion" <?php echo $servicio_ambulancia_view->hora_preposicion->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_hora_preposicion" type="text/html"><span id="el_servicio_ambulancia_hora_preposicion">
<span<?php echo $servicio_ambulancia_view->hora_preposicion->viewAttributes() ?>><?php echo $servicio_ambulancia_view->hora_preposicion->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->observaciones->Visible) { // observaciones ?>
	<tr id="r_observaciones">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_observaciones"><script id="tpc_servicio_ambulancia_observaciones" type="text/html"><?php echo $servicio_ambulancia_view->observaciones->caption() ?></script></span></td>
		<td data-name="observaciones" <?php echo $servicio_ambulancia_view->observaciones->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_observaciones" type="text/html"><span id="el_servicio_ambulancia_observaciones">
<span<?php echo $servicio_ambulancia_view->observaciones->viewAttributes() ?>><?php echo $servicio_ambulancia_view->observaciones->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->tipo_traslado->Visible) { // tipo_traslado ?>
	<tr id="r_tipo_traslado">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_tipo_traslado"><script id="tpc_servicio_ambulancia_tipo_traslado" type="text/html"><?php echo $servicio_ambulancia_view->tipo_traslado->caption() ?></script></span></td>
		<td data-name="tipo_traslado" <?php echo $servicio_ambulancia_view->tipo_traslado->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_tipo_traslado" type="text/html"><span id="el_servicio_ambulancia_tipo_traslado">
<span<?php echo $servicio_ambulancia_view->tipo_traslado->viewAttributes() ?>><?php echo $servicio_ambulancia_view->tipo_traslado->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->traslado_fallido->Visible) { // traslado_fallido ?>
	<tr id="r_traslado_fallido">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_traslado_fallido"><script id="tpc_servicio_ambulancia_traslado_fallido" type="text/html"><?php echo $servicio_ambulancia_view->traslado_fallido->caption() ?></script></span></td>
		<td data-name="traslado_fallido" <?php echo $servicio_ambulancia_view->traslado_fallido->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_traslado_fallido" type="text/html"><span id="el_servicio_ambulancia_traslado_fallido">
<span<?php echo $servicio_ambulancia_view->traslado_fallido->viewAttributes() ?>><?php echo $servicio_ambulancia_view->traslado_fallido->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->estado_paciente->Visible) { // estado_paciente ?>
	<tr id="r_estado_paciente">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_estado_paciente"><script id="tpc_servicio_ambulancia_estado_paciente" type="text/html"><?php echo $servicio_ambulancia_view->estado_paciente->caption() ?></script></span></td>
		<td data-name="estado_paciente" <?php echo $servicio_ambulancia_view->estado_paciente->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_estado_paciente" type="text/html"><span id="el_servicio_ambulancia_estado_paciente">
<span<?php echo $servicio_ambulancia_view->estado_paciente->viewAttributes() ?>><?php echo $servicio_ambulancia_view->estado_paciente->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->k_final->Visible) { // k_final ?>
	<tr id="r_k_final">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_k_final"><script id="tpc_servicio_ambulancia_k_final" type="text/html"><?php echo $servicio_ambulancia_view->k_final->caption() ?></script></span></td>
		<td data-name="k_final" <?php echo $servicio_ambulancia_view->k_final->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_k_final" type="text/html"><span id="el_servicio_ambulancia_k_final">
<span<?php echo $servicio_ambulancia_view->k_final->viewAttributes() ?>><?php echo $servicio_ambulancia_view->k_final->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->k_inical->Visible) { // k_inical ?>
	<tr id="r_k_inical">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_k_inical"><script id="tpc_servicio_ambulancia_k_inical" type="text/html"><?php echo $servicio_ambulancia_view->k_inical->caption() ?></script></span></td>
		<td data-name="k_inical" <?php echo $servicio_ambulancia_view->k_inical->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_k_inical" type="text/html"><span id="el_servicio_ambulancia_k_inical">
<span<?php echo $servicio_ambulancia_view->k_inical->viewAttributes() ?>><?php echo $servicio_ambulancia_view->k_inical->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->tipo_serviciosistema->Visible) { // tipo_serviciosistema ?>
	<tr id="r_tipo_serviciosistema">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_tipo_serviciosistema"><script id="tpc_servicio_ambulancia_tipo_serviciosistema" type="text/html"><?php echo $servicio_ambulancia_view->tipo_serviciosistema->caption() ?></script></span></td>
		<td data-name="tipo_serviciosistema" <?php echo $servicio_ambulancia_view->tipo_serviciosistema->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_tipo_serviciosistema" type="text/html"><span id="el_servicio_ambulancia_tipo_serviciosistema">
<span<?php echo $servicio_ambulancia_view->tipo_serviciosistema->viewAttributes() ?>><?php echo $servicio_ambulancia_view->tipo_serviciosistema->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->preposicion->Visible) { // preposicion ?>
	<tr id="r_preposicion">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_preposicion"><script id="tpc_servicio_ambulancia_preposicion" type="text/html"><?php echo $servicio_ambulancia_view->preposicion->caption() ?></script></span></td>
		<td data-name="preposicion" <?php echo $servicio_ambulancia_view->preposicion->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_preposicion" type="text/html"><span id="el_servicio_ambulancia_preposicion">
<span<?php echo $servicio_ambulancia_view->preposicion->viewAttributes() ?>><?php echo $servicio_ambulancia_view->preposicion->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->conductor->Visible) { // conductor ?>
	<tr id="r_conductor">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_conductor"><script id="tpc_servicio_ambulancia_conductor" type="text/html"><?php echo $servicio_ambulancia_view->conductor->caption() ?></script></span></td>
		<td data-name="conductor" <?php echo $servicio_ambulancia_view->conductor->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_conductor" type="text/html"><span id="el_servicio_ambulancia_conductor">
<span<?php echo $servicio_ambulancia_view->conductor->viewAttributes() ?>><?php echo $servicio_ambulancia_view->conductor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->medico->Visible) { // medico ?>
	<tr id="r_medico">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_medico"><script id="tpc_servicio_ambulancia_medico" type="text/html"><?php echo $servicio_ambulancia_view->medico->caption() ?></script></span></td>
		<td data-name="medico" <?php echo $servicio_ambulancia_view->medico->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_medico" type="text/html"><span id="el_servicio_ambulancia_medico">
<span<?php echo $servicio_ambulancia_view->medico->viewAttributes() ?>><?php echo $servicio_ambulancia_view->medico->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_ambulancia_view->paramedico->Visible) { // paramedico ?>
	<tr id="r_paramedico">
		<td class="<?php echo $servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_servicio_ambulancia_paramedico"><script id="tpc_servicio_ambulancia_paramedico" type="text/html"><?php echo $servicio_ambulancia_view->paramedico->caption() ?></script></span></td>
		<td data-name="paramedico" <?php echo $servicio_ambulancia_view->paramedico->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_paramedico" type="text/html"><span id="el_servicio_ambulancia_paramedico">
<span<?php echo $servicio_ambulancia_view->paramedico->viewAttributes() ?>><?php echo $servicio_ambulancia_view->paramedico->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_servicio_ambulanciaview" class="ew-custom-template"></div>
<script id="tpm_servicio_ambulanciaview" type="text/html">
<div id="ct_servicio_ambulancia_view">
</hr>
<div class="form-row">
	<div class="form-group col-xs-2">
	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_cod_casointerh")/}}
	</div>
	<div class="form-group col-xs-2">
	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_cod_ambulancia")/}}
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_view->hora_asigna->caption() ?></label></br>
	 <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_hora_asigna")/}}<button  onClick = 'fechaHoy(0)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	 </div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_view->hora_llegada->caption() ?></label></br>
	  <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_hora_llegada")/}}<button  onClick = 'fechaHoy(1)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_view->hora_inicio->caption() ?></label></br>
	  <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_hora_inicio")/}} <button  onClick = 'fechaHoy(2)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>	  
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_view->hora_destino->caption() ?></label></br>
	  <div class="input-group-append">{{include tmpl=~getTemplate("#tpx_servicio_ambulancia_hora_destino")/}}<button  onClick = 'fechaHoy(3)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	 </div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_view->hora_preposicion->caption() ?></label></br>
	 <div class="input-group-append">  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_hora_preposicion")/}}<button  onClick = 'fechaHoy(4)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
 </div>
<?php echo $tri_amb ?> </br>
 </hr>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_view->conductor->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_conductor")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_view->medico->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_medico")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_view->paramedico->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_paramedico")/}}
	</div>
  </div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_view->traslado_fallido->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_traslado_fallido")/}}
	</div>
	  <div class="form-group">
	 	<label><?php echo $servicio_ambulancia_view->observaciones->caption() ?></label></br>
	 	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_observaciones")/}}
	  </div>
</div>
</div>
</script>
<script type="text/html" class="servicio_ambulanciaview_js">


		function fechaHoy(boton){
			var fecha = new Date(); 
			var mes = fecha.getMonth()+1; 
			var dia = fecha.getDate(); 
			var ano = fecha.getFullYear(); 
			var hora = fecha.getHours();    
			var min = fecha.getMinutes();  
			var seg = fecha.getSeconds();
			if (hora > 12){
				hora= hora-12;
				seg = seg+" PM";				
			}else{
				seg = seg+" AM";
			}
			if(dia<10)
				dia='0'+dia; //agrega cero si el menor de 10
			if(mes<10)
				mes='0'+mes //agrega cero si el menor de 10
			if(hora<10)
				hora='0'+hora; //agrega cero si el menor de 10
			if(min<10)
				min='0'+min
			if(seg<10)
				seg='0'+seg
			fecha = dia+"/"+mes+"/"+ano+" "+hora+":"+min+":"+seg;
			if (boton == 0) 
				document.getElementById('x_hora_asigna').value= fecha
			else if (boton == 1)
				document.getElementById('x_hora_llegada').value= fecha
			else if (boton == 2)
				document.getElementById('x_hora_inicio').value= fecha
			else if (boton == 3)
				document.getElementById('x_hora_destino').value= fecha
			else if (boton == 4)
				document.getElementById('x_hora_preposicion').value= fecha
			return fecha;
		}   

</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($servicio_ambulancia->Rows) ?> };
	ew.applyTemplate("tpd_servicio_ambulanciaview", "tpm_servicio_ambulanciaview", "servicio_ambulanciaview", "<?php echo $servicio_ambulancia->CustomExport ?>", ew.templateData.rows[0]);
	$("script.servicio_ambulanciaview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$servicio_ambulancia_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$servicio_ambulancia_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$servicio_ambulancia_view->terminate();
?>