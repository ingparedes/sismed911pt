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
$censo_camas_add = new censo_camas_add();

// Run the page
$censo_camas_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$censo_camas_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcenso_camasadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fcenso_camasadd = currentForm = new ew.Form("fcenso_camasadd", "add");

	// Validate form
	fcenso_camasadd.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($censo_camas_add->id_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_id_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_add->id_hospital->caption(), $censo_camas_add->id_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_camas_add->fecha_reporte->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_reporte");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_add->fecha_reporte->caption(), $censo_camas_add->fecha_reporte->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_camas_add->nombre_reporta->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_reporta");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_add->nombre_reporta->caption(), $censo_camas_add->nombre_reporta->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_camas_add->tele_reporta->Required) { ?>
				elm = this.getElements("x" + infix + "_tele_reporta");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_add->tele_reporta->caption(), $censo_camas_add->tele_reporta->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_camas_add->id_bloque->Required) { ?>
				elm = this.getElements("x" + infix + "_id_bloque");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_add->id_bloque->caption(), $censo_camas_add->id_bloque->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fcenso_camasadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcenso_camasadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fcenso_camasadd.lists["x_id_hospital"] = <?php echo $censo_camas_add->id_hospital->Lookup->toClientList($censo_camas_add) ?>;
	fcenso_camasadd.lists["x_id_hospital"].options = <?php echo JsonEncode($censo_camas_add->id_hospital->lookupOptions()) ?>;
	loadjs.done("fcenso_camasadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $censo_camas_add->showPageHeader(); ?>
<?php
$censo_camas_add->showMessage();
?>
<form name="fcenso_camasadd" id="fcenso_camasadd" class="<?php echo $censo_camas_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="censo_camas">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$censo_camas_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($censo_camas_add->id_hospital->Visible) { // id_hospital ?>
	<div id="r_id_hospital" class="form-group row">
		<label id="elh_censo_camas_id_hospital" for="x_id_hospital" class="<?php echo $censo_camas_add->LeftColumnClass ?>"><script id="tpc_censo_camas_id_hospital" type="text/html"><?php echo $censo_camas_add->id_hospital->caption() ?><?php echo $censo_camas_add->id_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $censo_camas_add->RightColumnClass ?>"><div <?php echo $censo_camas_add->id_hospital->cellAttributes() ?>>
<script id="tpx_censo_camas_id_hospital" type="text/html"><span id="el_censo_camas_id_hospital">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_id_hospital"><?php echo EmptyValue(strval($censo_camas_add->id_hospital->ViewValue)) ? $Language->phrase("PleaseSelect") : $censo_camas_add->id_hospital->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($censo_camas_add->id_hospital->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($censo_camas_add->id_hospital->ReadOnly || $censo_camas_add->id_hospital->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_id_hospital',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $censo_camas_add->id_hospital->Lookup->getParamTag($censo_camas_add, "p_x_id_hospital") ?>
<input type="hidden" data-table="censo_camas" data-field="x_id_hospital" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $censo_camas_add->id_hospital->displayValueSeparatorAttribute() ?>" name="x_id_hospital" id="x_id_hospital" value="<?php echo $censo_camas_add->id_hospital->CurrentValue ?>"<?php echo $censo_camas_add->id_hospital->editAttributes() ?>>
</span></script>
<?php echo $censo_camas_add->id_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_camas_add->nombre_reporta->Visible) { // nombre_reporta ?>
	<div id="r_nombre_reporta" class="form-group row">
		<label id="elh_censo_camas_nombre_reporta" for="x_nombre_reporta" class="<?php echo $censo_camas_add->LeftColumnClass ?>"><script id="tpc_censo_camas_nombre_reporta" type="text/html"><?php echo $censo_camas_add->nombre_reporta->caption() ?><?php echo $censo_camas_add->nombre_reporta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $censo_camas_add->RightColumnClass ?>"><div <?php echo $censo_camas_add->nombre_reporta->cellAttributes() ?>>
<script id="tpx_censo_camas_nombre_reporta" type="text/html"><span id="el_censo_camas_nombre_reporta">
<input type="text" data-table="censo_camas" data-field="x_nombre_reporta" name="x_nombre_reporta" id="x_nombre_reporta" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($censo_camas_add->nombre_reporta->getPlaceHolder()) ?>" value="<?php echo $censo_camas_add->nombre_reporta->EditValue ?>"<?php echo $censo_camas_add->nombre_reporta->editAttributes() ?>>
</span></script>
<?php echo $censo_camas_add->nombre_reporta->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_camas_add->tele_reporta->Visible) { // tele_reporta ?>
	<div id="r_tele_reporta" class="form-group row">
		<label id="elh_censo_camas_tele_reporta" for="x_tele_reporta" class="<?php echo $censo_camas_add->LeftColumnClass ?>"><script id="tpc_censo_camas_tele_reporta" type="text/html"><?php echo $censo_camas_add->tele_reporta->caption() ?><?php echo $censo_camas_add->tele_reporta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $censo_camas_add->RightColumnClass ?>"><div <?php echo $censo_camas_add->tele_reporta->cellAttributes() ?>>
<script id="tpx_censo_camas_tele_reporta" type="text/html"><span id="el_censo_camas_tele_reporta">
<input type="text" data-table="censo_camas" data-field="x_tele_reporta" name="x_tele_reporta" id="x_tele_reporta" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($censo_camas_add->tele_reporta->getPlaceHolder()) ?>" value="<?php echo $censo_camas_add->tele_reporta->EditValue ?>"<?php echo $censo_camas_add->tele_reporta->editAttributes() ?>>
</span></script>
<?php echo $censo_camas_add->tele_reporta->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_camas_add->id_bloque->Visible) { // id_bloque ?>
	<div id="r_id_bloque" class="form-group row">
		<label id="elh_censo_camas_id_bloque" class="<?php echo $censo_camas_add->LeftColumnClass ?>"><script id="tpc_censo_camas_id_bloque" type="text/html"><?php echo $censo_camas_add->id_bloque->caption() ?><?php echo $censo_camas_add->id_bloque->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $censo_camas_add->RightColumnClass ?>"><div <?php echo $censo_camas_add->id_bloque->cellAttributes() ?>>
<script id="tpx_censo_camas_id_bloque" type="text/html"><span id="el_censo_camas_id_bloque">
<input type="text" data-table="censo_camas" data-field="x_id_bloque" name="x_id_bloque" id="x_id_bloque" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($censo_camas_add->id_bloque->getPlaceHolder()) ?>" value="<?php echo $censo_camas_add->id_bloque->EditValue ?>"<?php echo $censo_camas_add->id_bloque->editAttributes() ?>>
</span></script>
<?php echo $censo_camas_add->id_bloque->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_censo_camasadd" class="ew-custom-template"></div>
<script id="tpm_censo_camasadd" type="text/html">
<div id="ct_censo_camas_add"><?php $bloque = ExecuteRow("SELECT b.id, b.fecha_creacion from bloques_div b WHERE b.activo = TRUE;"); ?>
		<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="card card-primary">
	<div class="ew-row"><label><?php echo $censo_camas_add->fecha_reporte->caption()?> </div></label></br><input type="text" data-table="censo_camas" data-field="fecha_reporte" name="fecha_reporte" id="fecha_reporte" value ="<?php echo substr($bloque[1],0,16);?>"class="form-control" readonly >
<div class="ew-row">{{include tmpl="#tpc_censo_camas_id_hospital"/}}</div>
<label> {{include tmpl=~getTemplate("#tpx_censo_camas_id_hospital")/}}</label>
					<div class="ew-row">{{include tmpl="#tpc_censo_camas_nombre_reporta"/}}</div>
	  					<label>{{include tmpl=~getTemplate("#tpx_censo_camas_nombre_reporta")/}}</label>
					<div class="ew-row">
						{{include tmpl="#tpc_censo_camas_tele_reporta"/}} </div>
						<label>{{include tmpl=~getTemplate("#tpx_censo_camas_tele_reporta")/}}</label>
					{{include tmpl="#tpc_censo_camas_id_bloque"/}}<br>
					&nbsp;{{include tmpl=~getTemplate("#tpx_censo_camas_id_bloque")/}}
 				</div>
 			</div>
 				<!-- DESDE ACA -->
 			<div class="col-lg-6" >
 				<div class="card card-info">
					<!-- INICIO DIVISION -->
					<div class="card-header bg-success">
						<h4> <span class="username"><?php echo $camasHosp ?></span></h4>
						<span class="description"><?php echo $capIniInst ?><span class="badge badge-success"> 8 </span></span>
					</div>
					<?php
					$rs = ExecuteRows("SELECT d.id_servicio, d.descripcion, s.nombre_servicio, d.bloque, b.bloque, b.activo  FROM division_hosp d INNER JOIN servicios_division s on d.id_servicio= s.id_servicio INNER JOIN bloques_div b  on b.id = d.bloque WHERE b.id = '".$bloque[0]."' and d.id_servicio = '1';");					
					foreach($rs as $valor){ 
					?>
						<div class="card card-outline card-success">
				  			<div class="card-header ">
								<h5> <span class="username"><?php echo $camasHosp." - ".$valor["descripcion"]; ?></span></h5>	
								<div class="card-tools">
							  		<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
								</div><!-- /.card-tools -->
				 			</div>
						  	<form id="hospital">
						  	<div class="card-body">	<!-- /body  -->			  
							  	<div class="row">
								  	<div class=".col-md-4">
										<div class="input-group">
											<div class="input-group-prepend">
											</div>
											<div class="ew-row"> <?php echo $ocupadas ?></div>
											<label><input type="text" name="txt_hospital_oc[]" size="5" maxlength="5" placeholder="Ocupadas" value="" class="form-control" required> </label>
										</div>
										<!-- /input-group -->
								  	</div>
									<div class=".col-md-4">
										<div class="input-group">
										  	<div class="input-group-prepend">
											</div>
											<label><?php echo $libres ?></label> <br><br>
											<input type="text" name="txt_hospital_lb[]" size="5" maxlength="5" placeholder="Libres" value="" class="form-control" required>
										</div>
										<!-- /input-group -->
								  	</div>
									<div class=".col-md-4">
										<div class="input-group">
									  		<div class="input-group-prepend">
											</div>
											<label><?php echo $sinServ ?></label><br>
										 	<input type="text" name="txt_hospital_fs[]" size="5" maxlength="5" placeholder="Sin Servicio" value="" class="form-control" required>
										</div><!-- /input-group -->
								  	</div>	<!-- /.col-4 -->
								</div><!-- /ROW  -->	
							</div><!-- /.card-body -->
							</form>
						</div>
			<?php	} // foreach ?> <!-- FINAL DIVISION -->			  
				</div><!-- /.card -->
			</div>
			<!-- /.card -->
		<!-- </div> /.container-fluid -->
			<div class="col-lg-6">
 				<!-- DESDE ACA -->
 				<div class="card card-info">
					<div class="card-header">
						<h4> <span class="username"><?php echo $camasUCI ?></span></h4>
						<span class="description"><?php echo $capIniInst ?> <span class="badge badge-success"> 8 </span></span>
					</div>
					<!-- INICIO DIVISION -->
					<?php
					$rs = ExecuteRows("SELECT d.id_servicio, d.descripcion, s.nombre_servicio, d.bloque, b.bloque, b.activo  FROM division_hosp d INNER JOIN servicios_division s on d.id_servicio= s.id_servicio INNER JOIN bloques_div b  on b.id = d.bloque WHERE b.id = '".$bloque[0]."' and d.id_servicio = '2';");					
					foreach($rs as $valor){ 
					?>
						<div class="card card-outline card-primary">
				  			<div class="card-header">
								<h5> <span class="username"><?php echo $camasUCI." - ".$valor["descripcion"]; ?></span></h5>	
								<div class="card-tools">
							  		<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
								</div><!-- /.card-tools -->
				 			</div>
				 			<form id="uci">
						  	<div class="card-body">	<!-- /body  -->			  
							  	<div class="row">
								  	<div class="col-4">
										<div class="input-group">
											<div class="input-group-prepend">
											</div>
											<label><?php echo $ocupadas ?></label><br>
											<input type="text" name="txt_uci_oc[]" size="5" maxlength="5" placeholder="Ocupadas" value="" class="form-control" required>
										</div>
										<!-- /input-group -->
								  	</div>
									<div class="col-4">
										<div class="input-group">
										  	<div class="input-group-prepend">
											</div>
											<label><?php echo $libres ?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
										  	<input type="text" name="txt_uci_lb[]" size="5" maxlength="5" placeholder="Libres" value="" class="form-control" required>
										</div>
										<!-- /input-group -->
								  	</div>
									<div class="col-4">
										<div class="input-group">
									  		<div class="input-group-prepend">
											</div>
											<label><?php echo $sinServ ?></label><br>
										 	<input type="text" name="txt_uci_fs[]" size="5" maxlength="5" placeholder="Sin Servicio" value="" class="form-control" required>
										</div><!-- /input-group -->
								  	</div>	<!-- /.col-4 -->
								</div><!-- /ROW  -->	
							</div><!-- /.card-body -->
							</form>
						</div>
			<?php	} // foreach ?> <!-- FINAL DIVISION -->			  
				</div><!-- /.card -->
			</div>
			<!-- /.card -->
						<div class="col-lg-6">
 				<!-- DESDE ACA -->
 				<div class="card card-info">
					<div class="card-header bg-warning ">
						<h4> <span class="username"><?php echo $camasPediatria ?></span></h4>
						<span class="description"><?php echo $capIniInst ?> <span class="badge badge-success"> 8 </span></span>
					</div>
					<!-- INICIO DIVISION -->
					<?php
					$rs = ExecuteRows("SELECT d.id_servicio, d.descripcion, s.nombre_servicio, d.bloque, b.bloque, b.activo  FROM division_hosp d INNER JOIN servicios_division s on d.id_servicio= s.id_servicio INNER JOIN bloques_div b  on b.id = d.bloque WHERE b.id = '".$bloque[0]."' and d.id_servicio = '3';");					
					foreach($rs as $valor){ 
					?>
						<div class="card card-outline card-warning">
				  			<div class="card-header">
								<h5> <span class="username"><?php echo $camasPediatria." - ". $valor["descripcion"]; ?></span></h5>	
								<div class="card-tools">
							  		<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
								</div><!-- /.card-tools -->
				 			</div>
				 			<form id="pediatria">
						  	<div class="card-body">	<!-- /body  -->			  
							  	<div class="row">
								  	<div class="col-4">
										<div class="input-group">
											<div class="input-group-prepend">
											</div>
											<label><?php echo $ocupadas ?></label><br>
											<input type="text" name="txt_pediatria_oc[]" size="5" maxlength="5" placeholder="Ocupadas" value="" class="form-control" required>
										</div>
										<!-- /input-group -->
								  	</div>
									<div class="col-4">
										<div class="input-group">
										  	<div class="input-group-prepend">
											</div>
											<label><?php echo $libres ?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
										  	<input type="text" name="txt_pediatria_lb[]" size="5" maxlength="5" placeholder="Libres" value="" class="form-control" required>
										</div>
										<!-- /input-group -->
								  	</div>
									<div class="col-4">
										<div class="input-group">
									  		<div class="input-group-prepend">
											</div>
											<label><?php echo $sinServ ?></label><br>
										 	<input type="text" name="txt_pediatria_fs[]" size="5" maxlength="5" placeholder="Sin Servicio" value="" class="form-control" required>
										</div><!-- /input-group -->
								  	</div>	<!-- /.col-4 -->
								</div><!-- /ROW  -->	
							</div><!-- /.card-body -->
							</form>
						</div>
			<?php	} // foreach ?> <!-- FINAL DIVISION -->			  
			</div>
				</div><!-- /.card -->
			</div>
			<!--	<button type="button" id="btnEnviar"  class="btn btn-primary"><?php echo $enviar ?></button>				
	 </div> /.container-fluid -->
	</section>
</div>
</script>
</div>
</script>
</div>
</script>
<script type="text/html" class="censo_camasadd_js">

$(document).ready(function(){
	$('#btnEnviar').click(function(){		
		$.ajax({
			url:"valida_pge.php?tipo=censo",
			method:"POST",
			data:$("#fcenso_camasadd, #hospital, #uci, #pediatria").serialize(),
			success:function(data)
			{
				alert(data);

				//$('#add_hosptlz')[0].reset();
			}
		});
	});
});

</script>

<?php if (!$censo_camas_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $censo_camas_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $censo_camas_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($censo_camas->Rows) ?> };
	ew.applyTemplate("tpd_censo_camasadd", "tpm_censo_camasadd", "censo_camasadd", "<?php echo $censo_camas->CustomExport ?>", ew.templateData.rows[0]);
	$("script.censo_camasadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$censo_camas_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

			/*Push.create("No hay reporte",{
				body: "Porfavor reporta el censo de camas",
				icon: "images/log.png",
				timeout: 10000,
				onClick: function () {
					window.location="https://nickersoft.github.io/push.js/";
					this.close();
				}
			});
			*/
});
</script>
<?php include_once "footer.php"; ?>
<?php
$censo_camas_add->terminate();
?>