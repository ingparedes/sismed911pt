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
$preh_evaluacionclinica_edit = new preh_evaluacionclinica_edit();

// Run the page
$preh_evaluacionclinica_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_evaluacionclinica_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_evaluacionclinicaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpreh_evaluacionclinicaedit = currentForm = new ew.Form("fpreh_evaluacionclinicaedit", "edit");

	// Validate form
	fpreh_evaluacionclinicaedit.validate = function() {
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
			<?php if ($preh_evaluacionclinica_edit->id_evaluacionclinica->Required) { ?>
				elm = this.getElements("x" + infix + "_id_evaluacionclinica");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->id_evaluacionclinica->caption(), $preh_evaluacionclinica_edit->id_evaluacionclinica->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->cod_casopreh->caption(), $preh_evaluacionclinica_edit->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->fecha_horaevaluacion->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_horaevaluacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->fecha_horaevaluacion->caption(), $preh_evaluacionclinica_edit->fecha_horaevaluacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->cod_paciente->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_paciente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->cod_paciente->caption(), $preh_evaluacionclinica_edit->cod_paciente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->cod_diag_cie->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_diag_cie");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->cod_diag_cie->caption(), $preh_evaluacionclinica_edit->cod_diag_cie->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->diagnos_txt->Required) { ?>
				elm = this.getElements("x" + infix + "_diagnos_txt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->diagnos_txt->caption(), $preh_evaluacionclinica_edit->diagnos_txt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->triage->Required) { ?>
				elm = this.getElements("x" + infix + "_triage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->triage->caption(), $preh_evaluacionclinica_edit->triage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->c_clinico->Required) { ?>
				elm = this.getElements("x" + infix + "_c_clinico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->c_clinico->caption(), $preh_evaluacionclinica_edit->c_clinico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->examen_fisico->Required) { ?>
				elm = this.getElements("x" + infix + "_examen_fisico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->examen_fisico->caption(), $preh_evaluacionclinica_edit->examen_fisico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->tratamiento->Required) { ?>
				elm = this.getElements("x" + infix + "_tratamiento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->tratamiento->caption(), $preh_evaluacionclinica_edit->tratamiento->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->antecedentes->Required) { ?>
				elm = this.getElements("x" + infix + "_antecedentes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->antecedentes->caption(), $preh_evaluacionclinica_edit->antecedentes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->paraclinicos->Required) { ?>
				elm = this.getElements("x" + infix + "_paraclinicos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->paraclinicos->caption(), $preh_evaluacionclinica_edit->paraclinicos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->sv_tx->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_tx");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->sv_tx->caption(), $preh_evaluacionclinica_edit->sv_tx->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->sv_fc->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_fc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->sv_fc->caption(), $preh_evaluacionclinica_edit->sv_fc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->sv_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->sv_fr->caption(), $preh_evaluacionclinica_edit->sv_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->sv_temp->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_temp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->sv_temp->caption(), $preh_evaluacionclinica_edit->sv_temp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->sv_gl->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_gl");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->sv_gl->caption(), $preh_evaluacionclinica_edit->sv_gl->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->peso->Required) { ?>
				elm = this.getElements("x" + infix + "_peso");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->peso->caption(), $preh_evaluacionclinica_edit->peso->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->talla->Required) { ?>
				elm = this.getElements("x" + infix + "_talla");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->talla->caption(), $preh_evaluacionclinica_edit->talla->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->sv_fcf->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_fcf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->sv_fcf->caption(), $preh_evaluacionclinica_edit->sv_fcf->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->sv_satO2->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_satO2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->sv_satO2->caption(), $preh_evaluacionclinica_edit->sv_satO2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->sv_apgar->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_apgar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->sv_apgar->caption(), $preh_evaluacionclinica_edit->sv_apgar->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->sv_gli->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_gli");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->sv_gli->caption(), $preh_evaluacionclinica_edit->sv_gli->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->tipo_paciente->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_paciente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->tipo_paciente->caption(), $preh_evaluacionclinica_edit->tipo_paciente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->usu_sede->Required) { ?>
				elm = this.getElements("x" + infix + "_usu_sede");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->usu_sede->caption(), $preh_evaluacionclinica_edit->usu_sede->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->tiempo_enfermedad->Required) { ?>
				elm = this.getElements("x" + infix + "_tiempo_enfermedad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->tiempo_enfermedad->caption(), $preh_evaluacionclinica_edit->tiempo_enfermedad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->tipo_enfermedad->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_enfermedad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->tipo_enfermedad->caption(), $preh_evaluacionclinica_edit->tipo_enfermedad->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tipo_enfermedad");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_evaluacionclinica_edit->tipo_enfermedad->errorMessage()) ?>");
			<?php if ($preh_evaluacionclinica_edit->ap_med_paciente->Required) { ?>
				elm = this.getElements("x" + infix + "_ap_med_paciente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->ap_med_paciente->caption(), $preh_evaluacionclinica_edit->ap_med_paciente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->ap_diabetes->Required) { ?>
				elm = this.getElements("x" + infix + "_ap_diabetes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->ap_diabetes->caption(), $preh_evaluacionclinica_edit->ap_diabetes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->ap_cardiop->Required) { ?>
				elm = this.getElements("x" + infix + "_ap_cardiop");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->ap_cardiop->caption(), $preh_evaluacionclinica_edit->ap_cardiop->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->ap_convul->Required) { ?>
				elm = this.getElements("x" + infix + "_ap_convul");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->ap_convul->caption(), $preh_evaluacionclinica_edit->ap_convul->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->ap_asma->Required) { ?>
				elm = this.getElements("x" + infix + "_ap_asma");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->ap_asma->caption(), $preh_evaluacionclinica_edit->ap_asma->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->ap_acv->Required) { ?>
				elm = this.getElements("x" + infix + "_ap_acv");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->ap_acv->caption(), $preh_evaluacionclinica_edit->ap_acv->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->ap_has->Required) { ?>
				elm = this.getElements("x" + infix + "_ap_has");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->ap_has->caption(), $preh_evaluacionclinica_edit->ap_has->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->ap_alergia->Required) { ?>
				elm = this.getElements("x" + infix + "_ap_alergia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->ap_alergia->caption(), $preh_evaluacionclinica_edit->ap_alergia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_evaluacionclinica_edit->ap_otros->Required) { ?>
				elm = this.getElements("x" + infix + "_ap_otros");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_evaluacionclinica_edit->ap_otros->caption(), $preh_evaluacionclinica_edit->ap_otros->RequiredErrorMessage)) ?>");
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
	fpreh_evaluacionclinicaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpreh_evaluacionclinicaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpreh_evaluacionclinicaedit.lists["x_cod_diag_cie"] = <?php echo $preh_evaluacionclinica_edit->cod_diag_cie->Lookup->toClientList($preh_evaluacionclinica_edit) ?>;
	fpreh_evaluacionclinicaedit.lists["x_cod_diag_cie"].options = <?php echo JsonEncode($preh_evaluacionclinica_edit->cod_diag_cie->lookupOptions()) ?>;
	fpreh_evaluacionclinicaedit.lists["x_triage"] = <?php echo $preh_evaluacionclinica_edit->triage->Lookup->toClientList($preh_evaluacionclinica_edit) ?>;
	fpreh_evaluacionclinicaedit.lists["x_triage"].options = <?php echo JsonEncode($preh_evaluacionclinica_edit->triage->lookupOptions()) ?>;
	loadjs.done("fpreh_evaluacionclinicaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $preh_evaluacionclinica_edit->showPageHeader(); ?>
<?php
$preh_evaluacionclinica_edit->showMessage();
?>
<form name="fpreh_evaluacionclinicaedit" id="fpreh_evaluacionclinicaedit" class="<?php echo $preh_evaluacionclinica_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_evaluacionclinica">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$preh_evaluacionclinica_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($preh_evaluacionclinica_edit->id_evaluacionclinica->Visible) { // id_evaluacionclinica ?>
	<div id="r_id_evaluacionclinica" class="form-group row">
		<label id="elh_preh_evaluacionclinica_id_evaluacionclinica" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->id_evaluacionclinica->caption() ?><?php echo $preh_evaluacionclinica_edit->id_evaluacionclinica->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->id_evaluacionclinica->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_id_evaluacionclinica">
<span<?php echo $preh_evaluacionclinica_edit->id_evaluacionclinica->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($preh_evaluacionclinica_edit->id_evaluacionclinica->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="preh_evaluacionclinica" data-field="x_id_evaluacionclinica" name="x_id_evaluacionclinica" id="x_id_evaluacionclinica" value="<?php echo HtmlEncode($preh_evaluacionclinica_edit->id_evaluacionclinica->CurrentValue) ?>">
<?php echo $preh_evaluacionclinica_edit->id_evaluacionclinica->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->cod_paciente->Visible) { // cod_paciente ?>
	<div id="r_cod_paciente" class="form-group row">
		<label id="elh_preh_evaluacionclinica_cod_paciente" for="x_cod_paciente" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->cod_paciente->caption() ?><?php echo $preh_evaluacionclinica_edit->cod_paciente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->cod_paciente->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_cod_paciente">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_cod_paciente" name="x_cod_paciente" id="x_cod_paciente" size="30" maxlength="32" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->cod_paciente->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->cod_paciente->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->cod_paciente->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->cod_paciente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->cod_diag_cie->Visible) { // cod_diag_cie ?>
	<div id="r_cod_diag_cie" class="form-group row">
		<label id="elh_preh_evaluacionclinica_cod_diag_cie" for="x_cod_diag_cie" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->cod_diag_cie->caption() ?><?php echo $preh_evaluacionclinica_edit->cod_diag_cie->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->cod_diag_cie->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_cod_diag_cie">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($preh_evaluacionclinica_edit->cod_diag_cie->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $preh_evaluacionclinica_edit->cod_diag_cie->ViewValue ?></button>
		<div id="dsl_x_cod_diag_cie" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden; min-width: 100px; max-height: 200px; overflow-y: auto;">
<?php echo $preh_evaluacionclinica_edit->cod_diag_cie->radioButtonListHtml(TRUE, "x_cod_diag_cie") ?>
			</div><!-- /.ew-items -->
		</div><!-- /.dropdown-menu -->
		<div id="tp_x_cod_diag_cie" class="ew-template"><input type="radio" class="custom-control-input" data-table="preh_evaluacionclinica" data-field="x_cod_diag_cie" data-value-separator="<?php echo $preh_evaluacionclinica_edit->cod_diag_cie->displayValueSeparatorAttribute() ?>" name="x_cod_diag_cie" id="x_cod_diag_cie" value="{value}"<?php echo $preh_evaluacionclinica_edit->cod_diag_cie->editAttributes() ?>></div>
	</div><!-- /.btn-group -->
	<?php if (!$preh_evaluacionclinica_edit->cod_diag_cie->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fas fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list -->
<?php echo $preh_evaluacionclinica_edit->cod_diag_cie->Lookup->getParamTag($preh_evaluacionclinica_edit, "p_x_cod_diag_cie") ?>
</span>
<?php echo $preh_evaluacionclinica_edit->cod_diag_cie->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->diagnos_txt->Visible) { // diagnos_txt ?>
	<div id="r_diagnos_txt" class="form-group row">
		<label id="elh_preh_evaluacionclinica_diagnos_txt" for="x_diagnos_txt" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->diagnos_txt->caption() ?><?php echo $preh_evaluacionclinica_edit->diagnos_txt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->diagnos_txt->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_diagnos_txt">
<textarea data-table="preh_evaluacionclinica" data-field="x_diagnos_txt" name="x_diagnos_txt" id="x_diagnos_txt" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->diagnos_txt->getPlaceHolder()) ?>"<?php echo $preh_evaluacionclinica_edit->diagnos_txt->editAttributes() ?>><?php echo $preh_evaluacionclinica_edit->diagnos_txt->EditValue ?></textarea>
</span>
<?php echo $preh_evaluacionclinica_edit->diagnos_txt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->triage->Visible) { // triage ?>
	<div id="r_triage" class="form-group row">
		<label id="elh_preh_evaluacionclinica_triage" for="x_triage" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->triage->caption() ?><?php echo $preh_evaluacionclinica_edit->triage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->triage->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_triage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="preh_evaluacionclinica" data-field="x_triage" data-value-separator="<?php echo $preh_evaluacionclinica_edit->triage->displayValueSeparatorAttribute() ?>" id="x_triage" name="x_triage"<?php echo $preh_evaluacionclinica_edit->triage->editAttributes() ?>>
			<?php echo $preh_evaluacionclinica_edit->triage->selectOptionListHtml("x_triage") ?>
		</select>
</div>
<?php echo $preh_evaluacionclinica_edit->triage->Lookup->getParamTag($preh_evaluacionclinica_edit, "p_x_triage") ?>
</span>
<?php echo $preh_evaluacionclinica_edit->triage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->c_clinico->Visible) { // c_clinico ?>
	<div id="r_c_clinico" class="form-group row">
		<label id="elh_preh_evaluacionclinica_c_clinico" for="x_c_clinico" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->c_clinico->caption() ?><?php echo $preh_evaluacionclinica_edit->c_clinico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->c_clinico->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_c_clinico">
<textarea data-table="preh_evaluacionclinica" data-field="x_c_clinico" name="x_c_clinico" id="x_c_clinico" cols="20" rows="4" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->c_clinico->getPlaceHolder()) ?>"<?php echo $preh_evaluacionclinica_edit->c_clinico->editAttributes() ?>><?php echo $preh_evaluacionclinica_edit->c_clinico->EditValue ?></textarea>
</span>
<?php echo $preh_evaluacionclinica_edit->c_clinico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->examen_fisico->Visible) { // examen_fisico ?>
	<div id="r_examen_fisico" class="form-group row">
		<label id="elh_preh_evaluacionclinica_examen_fisico" for="x_examen_fisico" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->examen_fisico->caption() ?><?php echo $preh_evaluacionclinica_edit->examen_fisico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->examen_fisico->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_examen_fisico">
<textarea data-table="preh_evaluacionclinica" data-field="x_examen_fisico" name="x_examen_fisico" id="x_examen_fisico" cols="20" rows="4" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->examen_fisico->getPlaceHolder()) ?>"<?php echo $preh_evaluacionclinica_edit->examen_fisico->editAttributes() ?>><?php echo $preh_evaluacionclinica_edit->examen_fisico->EditValue ?></textarea>
</span>
<?php echo $preh_evaluacionclinica_edit->examen_fisico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->tratamiento->Visible) { // tratamiento ?>
	<div id="r_tratamiento" class="form-group row">
		<label id="elh_preh_evaluacionclinica_tratamiento" for="x_tratamiento" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->tratamiento->caption() ?><?php echo $preh_evaluacionclinica_edit->tratamiento->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->tratamiento->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_tratamiento">
<textarea data-table="preh_evaluacionclinica" data-field="x_tratamiento" name="x_tratamiento" id="x_tratamiento" cols="20" rows="4" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->tratamiento->getPlaceHolder()) ?>"<?php echo $preh_evaluacionclinica_edit->tratamiento->editAttributes() ?>><?php echo $preh_evaluacionclinica_edit->tratamiento->EditValue ?></textarea>
</span>
<?php echo $preh_evaluacionclinica_edit->tratamiento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->antecedentes->Visible) { // antecedentes ?>
	<div id="r_antecedentes" class="form-group row">
		<label id="elh_preh_evaluacionclinica_antecedentes" for="x_antecedentes" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->antecedentes->caption() ?><?php echo $preh_evaluacionclinica_edit->antecedentes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->antecedentes->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_antecedentes">
<textarea data-table="preh_evaluacionclinica" data-field="x_antecedentes" name="x_antecedentes" id="x_antecedentes" cols="20" rows="4" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->antecedentes->getPlaceHolder()) ?>"<?php echo $preh_evaluacionclinica_edit->antecedentes->editAttributes() ?>><?php echo $preh_evaluacionclinica_edit->antecedentes->EditValue ?></textarea>
</span>
<?php echo $preh_evaluacionclinica_edit->antecedentes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->paraclinicos->Visible) { // paraclinicos ?>
	<div id="r_paraclinicos" class="form-group row">
		<label id="elh_preh_evaluacionclinica_paraclinicos" for="x_paraclinicos" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->paraclinicos->caption() ?><?php echo $preh_evaluacionclinica_edit->paraclinicos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->paraclinicos->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_paraclinicos">
<textarea data-table="preh_evaluacionclinica" data-field="x_paraclinicos" name="x_paraclinicos" id="x_paraclinicos" cols="20" rows="4" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->paraclinicos->getPlaceHolder()) ?>"<?php echo $preh_evaluacionclinica_edit->paraclinicos->editAttributes() ?>><?php echo $preh_evaluacionclinica_edit->paraclinicos->EditValue ?></textarea>
</span>
<?php echo $preh_evaluacionclinica_edit->paraclinicos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->sv_tx->Visible) { // sv_tx ?>
	<div id="r_sv_tx" class="form-group row">
		<label id="elh_preh_evaluacionclinica_sv_tx" for="x_sv_tx" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->sv_tx->caption() ?><?php echo $preh_evaluacionclinica_edit->sv_tx->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->sv_tx->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_tx">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_sv_tx" name="x_sv_tx" id="x_sv_tx" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->sv_tx->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->sv_tx->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->sv_tx->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->sv_tx->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->sv_fc->Visible) { // sv_fc ?>
	<div id="r_sv_fc" class="form-group row">
		<label id="elh_preh_evaluacionclinica_sv_fc" for="x_sv_fc" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->sv_fc->caption() ?><?php echo $preh_evaluacionclinica_edit->sv_fc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->sv_fc->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_fc">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_sv_fc" name="x_sv_fc" id="x_sv_fc" size="6" maxlength="5" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->sv_fc->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->sv_fc->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->sv_fc->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->sv_fc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->sv_fr->Visible) { // sv_fr ?>
	<div id="r_sv_fr" class="form-group row">
		<label id="elh_preh_evaluacionclinica_sv_fr" for="x_sv_fr" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->sv_fr->caption() ?><?php echo $preh_evaluacionclinica_edit->sv_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->sv_fr->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_fr">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_sv_fr" name="x_sv_fr" id="x_sv_fr" size="6" maxlength="5" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->sv_fr->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->sv_fr->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->sv_fr->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->sv_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->sv_temp->Visible) { // sv_temp ?>
	<div id="r_sv_temp" class="form-group row">
		<label id="elh_preh_evaluacionclinica_sv_temp" for="x_sv_temp" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->sv_temp->caption() ?><?php echo $preh_evaluacionclinica_edit->sv_temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->sv_temp->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_temp">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_sv_temp" name="x_sv_temp" id="x_sv_temp" size="6" maxlength="5" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->sv_temp->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->sv_temp->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->sv_temp->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->sv_temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->sv_gl->Visible) { // sv_gl ?>
	<div id="r_sv_gl" class="form-group row">
		<label id="elh_preh_evaluacionclinica_sv_gl" for="x_sv_gl" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->sv_gl->caption() ?><?php echo $preh_evaluacionclinica_edit->sv_gl->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->sv_gl->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_gl">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_sv_gl" name="x_sv_gl" id="x_sv_gl" size="6" maxlength="5" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->sv_gl->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->sv_gl->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->sv_gl->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->sv_gl->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->peso->Visible) { // peso ?>
	<div id="r_peso" class="form-group row">
		<label id="elh_preh_evaluacionclinica_peso" for="x_peso" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->peso->caption() ?><?php echo $preh_evaluacionclinica_edit->peso->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->peso->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_peso">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_peso" name="x_peso" id="x_peso" size="6" maxlength="5" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->peso->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->peso->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->peso->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->peso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->talla->Visible) { // talla ?>
	<div id="r_talla" class="form-group row">
		<label id="elh_preh_evaluacionclinica_talla" for="x_talla" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->talla->caption() ?><?php echo $preh_evaluacionclinica_edit->talla->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->talla->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_talla">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_talla" name="x_talla" id="x_talla" size="6" maxlength="5" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->talla->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->talla->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->talla->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->talla->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->sv_fcf->Visible) { // sv_fcf ?>
	<div id="r_sv_fcf" class="form-group row">
		<label id="elh_preh_evaluacionclinica_sv_fcf" for="x_sv_fcf" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->sv_fcf->caption() ?><?php echo $preh_evaluacionclinica_edit->sv_fcf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->sv_fcf->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_fcf">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_sv_fcf" name="x_sv_fcf" id="x_sv_fcf" size="6" maxlength="5" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->sv_fcf->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->sv_fcf->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->sv_fcf->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->sv_fcf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->sv_satO2->Visible) { // sv_satO2 ?>
	<div id="r_sv_satO2" class="form-group row">
		<label id="elh_preh_evaluacionclinica_sv_satO2" for="x_sv_satO2" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->sv_satO2->caption() ?><?php echo $preh_evaluacionclinica_edit->sv_satO2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->sv_satO2->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_satO2">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_sv_satO2" name="x_sv_satO2" id="x_sv_satO2" size="6" maxlength="5" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->sv_satO2->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->sv_satO2->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->sv_satO2->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->sv_satO2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->sv_apgar->Visible) { // sv_apgar ?>
	<div id="r_sv_apgar" class="form-group row">
		<label id="elh_preh_evaluacionclinica_sv_apgar" for="x_sv_apgar" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->sv_apgar->caption() ?><?php echo $preh_evaluacionclinica_edit->sv_apgar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->sv_apgar->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_apgar">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_sv_apgar" name="x_sv_apgar" id="x_sv_apgar" size="6" maxlength="5" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->sv_apgar->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->sv_apgar->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->sv_apgar->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->sv_apgar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->sv_gli->Visible) { // sv_gli ?>
	<div id="r_sv_gli" class="form-group row">
		<label id="elh_preh_evaluacionclinica_sv_gli" for="x_sv_gli" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->sv_gli->caption() ?><?php echo $preh_evaluacionclinica_edit->sv_gli->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->sv_gli->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_gli">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_sv_gli" name="x_sv_gli" id="x_sv_gli" size="6" maxlength="5" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->sv_gli->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->sv_gli->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->sv_gli->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->sv_gli->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->tipo_paciente->Visible) { // tipo_paciente ?>
	<div id="r_tipo_paciente" class="form-group row">
		<label id="elh_preh_evaluacionclinica_tipo_paciente" for="x_tipo_paciente" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->tipo_paciente->caption() ?><?php echo $preh_evaluacionclinica_edit->tipo_paciente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->tipo_paciente->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_tipo_paciente">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_tipo_paciente" name="x_tipo_paciente" id="x_tipo_paciente" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->tipo_paciente->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->tipo_paciente->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->tipo_paciente->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->tipo_paciente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->usu_sede->Visible) { // usu_sede ?>
	<div id="r_usu_sede" class="form-group row">
		<label id="elh_preh_evaluacionclinica_usu_sede" for="x_usu_sede" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->usu_sede->caption() ?><?php echo $preh_evaluacionclinica_edit->usu_sede->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->usu_sede->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_usu_sede">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_usu_sede" name="x_usu_sede" id="x_usu_sede" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->usu_sede->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->usu_sede->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->usu_sede->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->usu_sede->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->tiempo_enfermedad->Visible) { // tiempo_enfermedad ?>
	<div id="r_tiempo_enfermedad" class="form-group row">
		<label id="elh_preh_evaluacionclinica_tiempo_enfermedad" for="x_tiempo_enfermedad" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->tiempo_enfermedad->caption() ?><?php echo $preh_evaluacionclinica_edit->tiempo_enfermedad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->tiempo_enfermedad->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_tiempo_enfermedad">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_tiempo_enfermedad" name="x_tiempo_enfermedad" id="x_tiempo_enfermedad" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->tiempo_enfermedad->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->tiempo_enfermedad->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->tiempo_enfermedad->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->tiempo_enfermedad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->tipo_enfermedad->Visible) { // tipo_enfermedad ?>
	<div id="r_tipo_enfermedad" class="form-group row">
		<label id="elh_preh_evaluacionclinica_tipo_enfermedad" for="x_tipo_enfermedad" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->tipo_enfermedad->caption() ?><?php echo $preh_evaluacionclinica_edit->tipo_enfermedad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->tipo_enfermedad->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_tipo_enfermedad">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_tipo_enfermedad" name="x_tipo_enfermedad" id="x_tipo_enfermedad" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->tipo_enfermedad->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->tipo_enfermedad->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->tipo_enfermedad->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->tipo_enfermedad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->ap_med_paciente->Visible) { // ap_med_paciente ?>
	<div id="r_ap_med_paciente" class="form-group row">
		<label id="elh_preh_evaluacionclinica_ap_med_paciente" for="x_ap_med_paciente" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->ap_med_paciente->caption() ?><?php echo $preh_evaluacionclinica_edit->ap_med_paciente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->ap_med_paciente->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_med_paciente">
<textarea data-table="preh_evaluacionclinica" data-field="x_ap_med_paciente" name="x_ap_med_paciente" id="x_ap_med_paciente" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->ap_med_paciente->getPlaceHolder()) ?>"<?php echo $preh_evaluacionclinica_edit->ap_med_paciente->editAttributes() ?>><?php echo $preh_evaluacionclinica_edit->ap_med_paciente->EditValue ?></textarea>
</span>
<?php echo $preh_evaluacionclinica_edit->ap_med_paciente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->ap_diabetes->Visible) { // ap_diabetes ?>
	<div id="r_ap_diabetes" class="form-group row">
		<label id="elh_preh_evaluacionclinica_ap_diabetes" for="x_ap_diabetes" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->ap_diabetes->caption() ?><?php echo $preh_evaluacionclinica_edit->ap_diabetes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->ap_diabetes->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_diabetes">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_ap_diabetes" name="x_ap_diabetes" id="x_ap_diabetes" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->ap_diabetes->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->ap_diabetes->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->ap_diabetes->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->ap_diabetes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->ap_cardiop->Visible) { // ap_cardiop ?>
	<div id="r_ap_cardiop" class="form-group row">
		<label id="elh_preh_evaluacionclinica_ap_cardiop" for="x_ap_cardiop" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->ap_cardiop->caption() ?><?php echo $preh_evaluacionclinica_edit->ap_cardiop->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->ap_cardiop->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_cardiop">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_ap_cardiop" name="x_ap_cardiop" id="x_ap_cardiop" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->ap_cardiop->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->ap_cardiop->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->ap_cardiop->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->ap_cardiop->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->ap_convul->Visible) { // ap_convul ?>
	<div id="r_ap_convul" class="form-group row">
		<label id="elh_preh_evaluacionclinica_ap_convul" for="x_ap_convul" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->ap_convul->caption() ?><?php echo $preh_evaluacionclinica_edit->ap_convul->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->ap_convul->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_convul">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_ap_convul" name="x_ap_convul" id="x_ap_convul" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->ap_convul->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->ap_convul->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->ap_convul->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->ap_convul->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->ap_asma->Visible) { // ap_asma ?>
	<div id="r_ap_asma" class="form-group row">
		<label id="elh_preh_evaluacionclinica_ap_asma" for="x_ap_asma" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->ap_asma->caption() ?><?php echo $preh_evaluacionclinica_edit->ap_asma->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->ap_asma->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_asma">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_ap_asma" name="x_ap_asma" id="x_ap_asma" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->ap_asma->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->ap_asma->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->ap_asma->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->ap_asma->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->ap_acv->Visible) { // ap_acv ?>
	<div id="r_ap_acv" class="form-group row">
		<label id="elh_preh_evaluacionclinica_ap_acv" for="x_ap_acv" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->ap_acv->caption() ?><?php echo $preh_evaluacionclinica_edit->ap_acv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->ap_acv->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_acv">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_ap_acv" name="x_ap_acv" id="x_ap_acv" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->ap_acv->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->ap_acv->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->ap_acv->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->ap_acv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->ap_has->Visible) { // ap_has ?>
	<div id="r_ap_has" class="form-group row">
		<label id="elh_preh_evaluacionclinica_ap_has" for="x_ap_has" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->ap_has->caption() ?><?php echo $preh_evaluacionclinica_edit->ap_has->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->ap_has->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_has">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_ap_has" name="x_ap_has" id="x_ap_has" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->ap_has->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->ap_has->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->ap_has->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->ap_has->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->ap_alergia->Visible) { // ap_alergia ?>
	<div id="r_ap_alergia" class="form-group row">
		<label id="elh_preh_evaluacionclinica_ap_alergia" for="x_ap_alergia" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->ap_alergia->caption() ?><?php echo $preh_evaluacionclinica_edit->ap_alergia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->ap_alergia->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_alergia">
<input type="text" data-table="preh_evaluacionclinica" data-field="x_ap_alergia" name="x_ap_alergia" id="x_ap_alergia" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->ap_alergia->getPlaceHolder()) ?>" value="<?php echo $preh_evaluacionclinica_edit->ap_alergia->EditValue ?>"<?php echo $preh_evaluacionclinica_edit->ap_alergia->editAttributes() ?>>
</span>
<?php echo $preh_evaluacionclinica_edit->ap_alergia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_evaluacionclinica_edit->ap_otros->Visible) { // ap_otros ?>
	<div id="r_ap_otros" class="form-group row">
		<label id="elh_preh_evaluacionclinica_ap_otros" for="x_ap_otros" class="<?php echo $preh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $preh_evaluacionclinica_edit->ap_otros->caption() ?><?php echo $preh_evaluacionclinica_edit->ap_otros->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $preh_evaluacionclinica_edit->ap_otros->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_otros">
<textarea data-table="preh_evaluacionclinica" data-field="x_ap_otros" name="x_ap_otros" id="x_ap_otros" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_evaluacionclinica_edit->ap_otros->getPlaceHolder()) ?>"<?php echo $preh_evaluacionclinica_edit->ap_otros->editAttributes() ?>><?php echo $preh_evaluacionclinica_edit->ap_otros->EditValue ?></textarea>
</span>
<?php echo $preh_evaluacionclinica_edit->ap_otros->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<span id="el_preh_evaluacionclinica_cod_casopreh">
<input type="hidden" data-table="preh_evaluacionclinica" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" value="<?php echo HtmlEncode($preh_evaluacionclinica_edit->cod_casopreh->CurrentValue) ?>">
</span>
<?php if (!$preh_evaluacionclinica_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $preh_evaluacionclinica_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_evaluacionclinica_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$preh_evaluacionclinica_edit->showPageFooter();
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
$preh_evaluacionclinica_edit->terminate();
?>