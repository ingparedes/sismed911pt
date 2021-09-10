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
$interh_evaluacionclinica_edit = new interh_evaluacionclinica_edit();

// Run the page
$interh_evaluacionclinica_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_evaluacionclinica_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_evaluacionclinicaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	finterh_evaluacionclinicaedit = currentForm = new ew.Form("finterh_evaluacionclinicaedit", "edit");

	// Validate form
	finterh_evaluacionclinicaedit.validate = function() {
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
			<?php if ($interh_evaluacionclinica_edit->id_evaluacionclinica->Required) { ?>
				elm = this.getElements("x" + infix + "_id_evaluacionclinica");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->id_evaluacionclinica->caption(), $interh_evaluacionclinica_edit->id_evaluacionclinica->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->cod_casointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->cod_casointerh->caption(), $interh_evaluacionclinica_edit->cod_casointerh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->fecha_horaevaluacion->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_horaevaluacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->fecha_horaevaluacion->caption(), $interh_evaluacionclinica_edit->fecha_horaevaluacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->cod_diag_cie->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_diag_cie");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->cod_diag_cie->caption(), $interh_evaluacionclinica_edit->cod_diag_cie->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->diagnos_txt->Required) { ?>
				elm = this.getElements("x" + infix + "_diagnos_txt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->diagnos_txt->caption(), $interh_evaluacionclinica_edit->diagnos_txt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->triage->Required) { ?>
				elm = this.getElements("x" + infix + "_triage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->triage->caption(), $interh_evaluacionclinica_edit->triage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->c_clinico->Required) { ?>
				elm = this.getElements("x" + infix + "_c_clinico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->c_clinico->caption(), $interh_evaluacionclinica_edit->c_clinico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->examen_fisico->Required) { ?>
				elm = this.getElements("x" + infix + "_examen_fisico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->examen_fisico->caption(), $interh_evaluacionclinica_edit->examen_fisico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->tratamiento->Required) { ?>
				elm = this.getElements("x" + infix + "_tratamiento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->tratamiento->caption(), $interh_evaluacionclinica_edit->tratamiento->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->antecedentes->Required) { ?>
				elm = this.getElements("x" + infix + "_antecedentes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->antecedentes->caption(), $interh_evaluacionclinica_edit->antecedentes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->paraclinicos->Required) { ?>
				elm = this.getElements("x" + infix + "_paraclinicos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->paraclinicos->caption(), $interh_evaluacionclinica_edit->paraclinicos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->sv_tx->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_tx");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->sv_tx->caption(), $interh_evaluacionclinica_edit->sv_tx->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->sv_fc->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_fc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->sv_fc->caption(), $interh_evaluacionclinica_edit->sv_fc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->sv_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->sv_fr->caption(), $interh_evaluacionclinica_edit->sv_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->sv_temp->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_temp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->sv_temp->caption(), $interh_evaluacionclinica_edit->sv_temp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->sv_gl->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_gl");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->sv_gl->caption(), $interh_evaluacionclinica_edit->sv_gl->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->peso->Required) { ?>
				elm = this.getElements("x" + infix + "_peso");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->peso->caption(), $interh_evaluacionclinica_edit->peso->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->talla->Required) { ?>
				elm = this.getElements("x" + infix + "_talla");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->talla->caption(), $interh_evaluacionclinica_edit->talla->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->sv_fcf->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_fcf");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->sv_fcf->caption(), $interh_evaluacionclinica_edit->sv_fcf->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->sv_satO2->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_satO2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->sv_satO2->caption(), $interh_evaluacionclinica_edit->sv_satO2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->sv_apgar->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_apgar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->sv_apgar->caption(), $interh_evaluacionclinica_edit->sv_apgar->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_evaluacionclinica_edit->sv_gli->Required) { ?>
				elm = this.getElements("x" + infix + "_sv_gli");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_evaluacionclinica_edit->sv_gli->caption(), $interh_evaluacionclinica_edit->sv_gli->RequiredErrorMessage)) ?>");
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
	finterh_evaluacionclinicaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		  var $qty = $(this).fields("sv_tx"); // Get a field as jQuery object by field name
		if ($qty.toNumber() != 0) // Assume Qty is a textbox         
			return this.onError($qty, "errorr"); // Return false if invalid
		return true;
	}

	// Use JavaScript validation or not
	finterh_evaluacionclinicaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Multi-Page
	finterh_evaluacionclinicaedit.multiPage = new ew.MultiPage("finterh_evaluacionclinicaedit");

	// Dynamic selection lists
	finterh_evaluacionclinicaedit.lists["x_cod_diag_cie"] = <?php echo $interh_evaluacionclinica_edit->cod_diag_cie->Lookup->toClientList($interh_evaluacionclinica_edit) ?>;
	finterh_evaluacionclinicaedit.lists["x_cod_diag_cie"].options = <?php echo JsonEncode($interh_evaluacionclinica_edit->cod_diag_cie->lookupOptions()) ?>;
	finterh_evaluacionclinicaedit.lists["x_triage"] = <?php echo $interh_evaluacionclinica_edit->triage->Lookup->toClientList($interh_evaluacionclinica_edit) ?>;
	finterh_evaluacionclinicaedit.lists["x_triage"].options = <?php echo JsonEncode($interh_evaluacionclinica_edit->triage->lookupOptions()) ?>;
	loadjs.done("finterh_evaluacionclinicaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $interh_evaluacionclinica_edit->showPageHeader(); ?>
<?php
$interh_evaluacionclinica_edit->showMessage();
?>
<form name="finterh_evaluacionclinicaedit" id="finterh_evaluacionclinicaedit" class="<?php echo $interh_evaluacionclinica_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_evaluacionclinica">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$interh_evaluacionclinica_edit->IsModal ?>">
<div class="ew-multi-page"><!-- multi-page -->
<div class="ew-nav-tabs" id="interh_evaluacionclinica_edit"><!-- multi-page tabs -->
	<ul class="<?php echo $interh_evaluacionclinica_edit->MultiPages->navStyle() ?>">
		<li class="nav-item"><a class="nav-link<?php echo $interh_evaluacionclinica_edit->MultiPages->pageStyle(1) ?>" href="#tab_interh_evaluacionclinica1" data-toggle="tab"><?php echo $interh_evaluacionclinica->pageCaption(1) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $interh_evaluacionclinica_edit->MultiPages->pageStyle(2) ?>" href="#tab_interh_evaluacionclinica2" data-toggle="tab"><?php echo $interh_evaluacionclinica->pageCaption(2) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $interh_evaluacionclinica_edit->MultiPages->pageStyle(3) ?>" href="#tab_interh_evaluacionclinica3" data-toggle="tab"><?php echo $interh_evaluacionclinica->pageCaption(3) ?></a></li>
	</ul>
	<div class="tab-content"><!-- multi-page tabs .tab-content -->
		<div class="tab-pane<?php echo $interh_evaluacionclinica_edit->MultiPages->pageStyle(1) ?>" id="tab_interh_evaluacionclinica1"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($interh_evaluacionclinica_edit->id_evaluacionclinica->Visible) { // id_evaluacionclinica ?>
	<div id="r_id_evaluacionclinica" class="form-group row">
		<label id="elh_interh_evaluacionclinica_id_evaluacionclinica" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->id_evaluacionclinica->caption() ?><?php echo $interh_evaluacionclinica_edit->id_evaluacionclinica->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->id_evaluacionclinica->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_id_evaluacionclinica">
<span<?php echo $interh_evaluacionclinica_edit->id_evaluacionclinica->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($interh_evaluacionclinica_edit->id_evaluacionclinica->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="interh_evaluacionclinica" data-field="x_id_evaluacionclinica" data-page="1" name="x_id_evaluacionclinica" id="x_id_evaluacionclinica" value="<?php echo HtmlEncode($interh_evaluacionclinica_edit->id_evaluacionclinica->CurrentValue) ?>">
<?php echo $interh_evaluacionclinica_edit->id_evaluacionclinica->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->triage->Visible) { // triage ?>
	<div id="r_triage" class="form-group row">
		<label id="elh_interh_evaluacionclinica_triage" for="x_triage" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->triage->caption() ?><?php echo $interh_evaluacionclinica_edit->triage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->triage->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_triage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="interh_evaluacionclinica" data-field="x_triage" data-page="1" data-value-separator="<?php echo $interh_evaluacionclinica_edit->triage->displayValueSeparatorAttribute() ?>" id="x_triage" name="x_triage"<?php echo $interh_evaluacionclinica_edit->triage->editAttributes() ?>>
			<?php echo $interh_evaluacionclinica_edit->triage->selectOptionListHtml("x_triage") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "triage") && !$interh_evaluacionclinica_edit->triage->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_triage" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $interh_evaluacionclinica_edit->triage->caption() ?>" data-title="<?php echo $interh_evaluacionclinica_edit->triage->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_triage',url:'triageaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $interh_evaluacionclinica_edit->triage->Lookup->getParamTag($interh_evaluacionclinica_edit, "p_x_triage") ?>
</span>
<?php echo $interh_evaluacionclinica_edit->triage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->sv_tx->Visible) { // sv_tx ?>
	<div id="r_sv_tx" class="form-group row">
		<label id="elh_interh_evaluacionclinica_sv_tx" for="x_sv_tx" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->sv_tx->caption() ?><?php echo $interh_evaluacionclinica_edit->sv_tx->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->sv_tx->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_sv_tx">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_sv_tx" data-page="1" name="x_sv_tx" id="x_sv_tx" size="3" maxlength="7" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->sv_tx->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->sv_tx->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->sv_tx->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->sv_tx->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->sv_fc->Visible) { // sv_fc ?>
	<div id="r_sv_fc" class="form-group row">
		<label id="elh_interh_evaluacionclinica_sv_fc" for="x_sv_fc" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->sv_fc->caption() ?><?php echo $interh_evaluacionclinica_edit->sv_fc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->sv_fc->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_sv_fc">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_sv_fc" data-page="1" name="x_sv_fc" id="x_sv_fc" size="3" maxlength="6" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->sv_fc->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->sv_fc->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->sv_fc->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->sv_fc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->sv_fr->Visible) { // sv_fr ?>
	<div id="r_sv_fr" class="form-group row">
		<label id="elh_interh_evaluacionclinica_sv_fr" for="x_sv_fr" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->sv_fr->caption() ?><?php echo $interh_evaluacionclinica_edit->sv_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->sv_fr->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_sv_fr">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_sv_fr" data-page="1" name="x_sv_fr" id="x_sv_fr" size="3" maxlength="6" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->sv_fr->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->sv_fr->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->sv_fr->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->sv_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->sv_temp->Visible) { // sv_temp ?>
	<div id="r_sv_temp" class="form-group row">
		<label id="elh_interh_evaluacionclinica_sv_temp" for="x_sv_temp" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->sv_temp->caption() ?><?php echo $interh_evaluacionclinica_edit->sv_temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->sv_temp->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_sv_temp">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_sv_temp" data-page="1" name="x_sv_temp" id="x_sv_temp" size="3" maxlength="6" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->sv_temp->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->sv_temp->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->sv_temp->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->sv_temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->sv_gl->Visible) { // sv_gl ?>
	<div id="r_sv_gl" class="form-group row">
		<label id="elh_interh_evaluacionclinica_sv_gl" for="x_sv_gl" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->sv_gl->caption() ?><?php echo $interh_evaluacionclinica_edit->sv_gl->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->sv_gl->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_sv_gl">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_sv_gl" data-page="1" name="x_sv_gl" id="x_sv_gl" size="3" maxlength="6" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->sv_gl->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->sv_gl->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->sv_gl->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->sv_gl->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->peso->Visible) { // peso ?>
	<div id="r_peso" class="form-group row">
		<label id="elh_interh_evaluacionclinica_peso" for="x_peso" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->peso->caption() ?><?php echo $interh_evaluacionclinica_edit->peso->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->peso->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_peso">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_peso" data-page="1" name="x_peso" id="x_peso" size="3" maxlength="6" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->peso->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->peso->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->peso->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->peso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->talla->Visible) { // talla ?>
	<div id="r_talla" class="form-group row">
		<label id="elh_interh_evaluacionclinica_talla" for="x_talla" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->talla->caption() ?><?php echo $interh_evaluacionclinica_edit->talla->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->talla->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_talla">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_talla" data-page="1" name="x_talla" id="x_talla" size="3" maxlength="6" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->talla->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->talla->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->talla->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->talla->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->sv_fcf->Visible) { // sv_fcf ?>
	<div id="r_sv_fcf" class="form-group row">
		<label id="elh_interh_evaluacionclinica_sv_fcf" for="x_sv_fcf" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->sv_fcf->caption() ?><?php echo $interh_evaluacionclinica_edit->sv_fcf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->sv_fcf->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_sv_fcf">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_sv_fcf" data-page="1" name="x_sv_fcf" id="x_sv_fcf" size="3" maxlength="6" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->sv_fcf->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->sv_fcf->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->sv_fcf->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->sv_fcf->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->sv_satO2->Visible) { // sv_satO2 ?>
	<div id="r_sv_satO2" class="form-group row">
		<label id="elh_interh_evaluacionclinica_sv_satO2" for="x_sv_satO2" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->sv_satO2->caption() ?><?php echo $interh_evaluacionclinica_edit->sv_satO2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->sv_satO2->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_sv_satO2">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_sv_satO2" data-page="1" name="x_sv_satO2" id="x_sv_satO2" size="3" maxlength="6" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->sv_satO2->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->sv_satO2->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->sv_satO2->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->sv_satO2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->sv_apgar->Visible) { // sv_apgar ?>
	<div id="r_sv_apgar" class="form-group row">
		<label id="elh_interh_evaluacionclinica_sv_apgar" for="x_sv_apgar" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->sv_apgar->caption() ?><?php echo $interh_evaluacionclinica_edit->sv_apgar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->sv_apgar->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_sv_apgar">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_sv_apgar" data-page="1" name="x_sv_apgar" id="x_sv_apgar" size="3" maxlength="6" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->sv_apgar->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->sv_apgar->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->sv_apgar->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->sv_apgar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->sv_gli->Visible) { // sv_gli ?>
	<div id="r_sv_gli" class="form-group row">
		<label id="elh_interh_evaluacionclinica_sv_gli" for="x_sv_gli" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->sv_gli->caption() ?><?php echo $interh_evaluacionclinica_edit->sv_gli->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->sv_gli->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_sv_gli">
<input type="text" data-table="interh_evaluacionclinica" data-field="x_sv_gli" data-page="1" name="x_sv_gli" id="x_sv_gli" size="3" maxlength="6" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->sv_gli->getPlaceHolder()) ?>" value="<?php echo $interh_evaluacionclinica_edit->sv_gli->EditValue ?>"<?php echo $interh_evaluacionclinica_edit->sv_gli->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->sv_gli->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $interh_evaluacionclinica_edit->MultiPages->pageStyle(2) ?>" id="tab_interh_evaluacionclinica2"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($interh_evaluacionclinica_edit->c_clinico->Visible) { // c_clinico ?>
	<div id="r_c_clinico" class="form-group row">
		<label id="elh_interh_evaluacionclinica_c_clinico" for="x_c_clinico" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->c_clinico->caption() ?><?php echo $interh_evaluacionclinica_edit->c_clinico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->c_clinico->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_c_clinico">
<textarea data-table="interh_evaluacionclinica" data-field="x_c_clinico" data-page="2" name="x_c_clinico" id="x_c_clinico" cols="20" rows="4" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->c_clinico->getPlaceHolder()) ?>"<?php echo $interh_evaluacionclinica_edit->c_clinico->editAttributes() ?>><?php echo $interh_evaluacionclinica_edit->c_clinico->EditValue ?></textarea>
</span>
<?php echo $interh_evaluacionclinica_edit->c_clinico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->examen_fisico->Visible) { // examen_fisico ?>
	<div id="r_examen_fisico" class="form-group row">
		<label id="elh_interh_evaluacionclinica_examen_fisico" for="x_examen_fisico" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->examen_fisico->caption() ?><?php echo $interh_evaluacionclinica_edit->examen_fisico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->examen_fisico->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_examen_fisico">
<textarea data-table="interh_evaluacionclinica" data-field="x_examen_fisico" data-page="2" name="x_examen_fisico" id="x_examen_fisico" cols="20" rows="4" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->examen_fisico->getPlaceHolder()) ?>"<?php echo $interh_evaluacionclinica_edit->examen_fisico->editAttributes() ?>><?php echo $interh_evaluacionclinica_edit->examen_fisico->EditValue ?></textarea>
</span>
<?php echo $interh_evaluacionclinica_edit->examen_fisico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->tratamiento->Visible) { // tratamiento ?>
	<div id="r_tratamiento" class="form-group row">
		<label id="elh_interh_evaluacionclinica_tratamiento" for="x_tratamiento" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->tratamiento->caption() ?><?php echo $interh_evaluacionclinica_edit->tratamiento->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->tratamiento->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_tratamiento">
<textarea data-table="interh_evaluacionclinica" data-field="x_tratamiento" data-page="2" name="x_tratamiento" id="x_tratamiento" cols="20" rows="4" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->tratamiento->getPlaceHolder()) ?>"<?php echo $interh_evaluacionclinica_edit->tratamiento->editAttributes() ?>><?php echo $interh_evaluacionclinica_edit->tratamiento->EditValue ?></textarea>
</span>
<?php echo $interh_evaluacionclinica_edit->tratamiento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->antecedentes->Visible) { // antecedentes ?>
	<div id="r_antecedentes" class="form-group row">
		<label id="elh_interh_evaluacionclinica_antecedentes" for="x_antecedentes" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->antecedentes->caption() ?><?php echo $interh_evaluacionclinica_edit->antecedentes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->antecedentes->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_antecedentes">
<textarea data-table="interh_evaluacionclinica" data-field="x_antecedentes" data-page="2" name="x_antecedentes" id="x_antecedentes" cols="20" rows="5" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->antecedentes->getPlaceHolder()) ?>"<?php echo $interh_evaluacionclinica_edit->antecedentes->editAttributes() ?>><?php echo $interh_evaluacionclinica_edit->antecedentes->EditValue ?></textarea>
</span>
<?php echo $interh_evaluacionclinica_edit->antecedentes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->paraclinicos->Visible) { // paraclinicos ?>
	<div id="r_paraclinicos" class="form-group row">
		<label id="elh_interh_evaluacionclinica_paraclinicos" for="x_paraclinicos" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->paraclinicos->caption() ?><?php echo $interh_evaluacionclinica_edit->paraclinicos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->paraclinicos->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_paraclinicos">
<textarea data-table="interh_evaluacionclinica" data-field="x_paraclinicos" data-page="2" name="x_paraclinicos" id="x_paraclinicos" cols="20" rows="5" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->paraclinicos->getPlaceHolder()) ?>"<?php echo $interh_evaluacionclinica_edit->paraclinicos->editAttributes() ?>><?php echo $interh_evaluacionclinica_edit->paraclinicos->EditValue ?></textarea>
</span>
<?php echo $interh_evaluacionclinica_edit->paraclinicos->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $interh_evaluacionclinica_edit->MultiPages->pageStyle(3) ?>" id="tab_interh_evaluacionclinica3"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($interh_evaluacionclinica_edit->cod_diag_cie->Visible) { // cod_diag_cie ?>
	<div id="r_cod_diag_cie" class="form-group row">
		<label id="elh_interh_evaluacionclinica_cod_diag_cie" for="x_cod_diag_cie" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->cod_diag_cie->caption() ?><?php echo $interh_evaluacionclinica_edit->cod_diag_cie->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->cod_diag_cie->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_cod_diag_cie">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_cod_diag_cie"><?php echo EmptyValue(strval($interh_evaluacionclinica_edit->cod_diag_cie->ViewValue)) ? $Language->phrase("PleaseSelect") : $interh_evaluacionclinica_edit->cod_diag_cie->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($interh_evaluacionclinica_edit->cod_diag_cie->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($interh_evaluacionclinica_edit->cod_diag_cie->ReadOnly || $interh_evaluacionclinica_edit->cod_diag_cie->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_cod_diag_cie',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $interh_evaluacionclinica_edit->cod_diag_cie->Lookup->getParamTag($interh_evaluacionclinica_edit, "p_x_cod_diag_cie") ?>
<input type="hidden" data-table="interh_evaluacionclinica" data-field="x_cod_diag_cie" data-page="3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $interh_evaluacionclinica_edit->cod_diag_cie->displayValueSeparatorAttribute() ?>" name="x_cod_diag_cie" id="x_cod_diag_cie" value="<?php echo $interh_evaluacionclinica_edit->cod_diag_cie->CurrentValue ?>"<?php echo $interh_evaluacionclinica_edit->cod_diag_cie->editAttributes() ?>>
</span>
<?php echo $interh_evaluacionclinica_edit->cod_diag_cie->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_evaluacionclinica_edit->diagnos_txt->Visible) { // diagnos_txt ?>
	<div id="r_diagnos_txt" class="form-group row">
		<label id="elh_interh_evaluacionclinica_diagnos_txt" for="x_diagnos_txt" class="<?php echo $interh_evaluacionclinica_edit->LeftColumnClass ?>"><?php echo $interh_evaluacionclinica_edit->diagnos_txt->caption() ?><?php echo $interh_evaluacionclinica_edit->diagnos_txt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_evaluacionclinica_edit->RightColumnClass ?>"><div <?php echo $interh_evaluacionclinica_edit->diagnos_txt->cellAttributes() ?>>
<span id="el_interh_evaluacionclinica_diagnos_txt">
<textarea data-table="interh_evaluacionclinica" data-field="x_diagnos_txt" data-page="3" name="x_diagnos_txt" id="x_diagnos_txt" cols="35" rows="4" placeholder="<?php echo HtmlEncode($interh_evaluacionclinica_edit->diagnos_txt->getPlaceHolder()) ?>"<?php echo $interh_evaluacionclinica_edit->diagnos_txt->editAttributes() ?>><?php echo $interh_evaluacionclinica_edit->diagnos_txt->EditValue ?></textarea>
</span>
<?php echo $interh_evaluacionclinica_edit->diagnos_txt->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
	</div><!-- /multi-page tabs .tab-content -->
</div><!-- /multi-page tabs -->
</div><!-- /multi-page -->
<span id="el_interh_evaluacionclinica_cod_casointerh">
<input type="hidden" data-table="interh_evaluacionclinica" data-field="x_cod_casointerh" data-page="1" name="x_cod_casointerh" id="x_cod_casointerh" value="<?php echo HtmlEncode($interh_evaluacionclinica_edit->cod_casointerh->CurrentValue) ?>">
</span>
<?php if (!$interh_evaluacionclinica_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $interh_evaluacionclinica_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_evaluacionclinica_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$interh_evaluacionclinica_edit->showPageFooter();
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
$interh_evaluacionclinica_edit->terminate();
?>