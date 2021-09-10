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
$censo_total_edit = new censo_total_edit();

// Run the page
$censo_total_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$censo_total_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcenso_totaledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fcenso_totaledit = currentForm = new ew.Form("fcenso_totaledit", "edit");

	// Validate form
	fcenso_totaledit.validate = function() {
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
			<?php if ($censo_total_edit->id_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_id_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_total_edit->id_hospital->caption(), $censo_total_edit->id_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_hospital");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($censo_total_edit->id_hospital->errorMessage()) ?>");
			<?php if ($censo_total_edit->cod_servicio->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_servicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_total_edit->cod_servicio->caption(), $censo_total_edit->cod_servicio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_servicio");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($censo_total_edit->cod_servicio->errorMessage()) ?>");
			<?php if ($censo_total_edit->cod_division->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_division");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_total_edit->cod_division->caption(), $censo_total_edit->cod_division->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_division");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($censo_total_edit->cod_division->errorMessage()) ?>");
			<?php if ($censo_total_edit->camas_ocupadas->Required) { ?>
				elm = this.getElements("x" + infix + "_camas_ocupadas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_total_edit->camas_ocupadas->caption(), $censo_total_edit->camas_ocupadas->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_camas_ocupadas");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($censo_total_edit->camas_ocupadas->errorMessage()) ?>");
			<?php if ($censo_total_edit->camas_libres->Required) { ?>
				elm = this.getElements("x" + infix + "_camas_libres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_total_edit->camas_libres->caption(), $censo_total_edit->camas_libres->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_camas_libres");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($censo_total_edit->camas_libres->errorMessage()) ?>");
			<?php if ($censo_total_edit->camas_fueraservicio->Required) { ?>
				elm = this.getElements("x" + infix + "_camas_fueraservicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_total_edit->camas_fueraservicio->caption(), $censo_total_edit->camas_fueraservicio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_camas_fueraservicio");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($censo_total_edit->camas_fueraservicio->errorMessage()) ?>");
			<?php if ($censo_total_edit->nombre_reporta->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_reporta");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_total_edit->nombre_reporta->caption(), $censo_total_edit->nombre_reporta->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_total_edit->telefono_reporta->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono_reporta");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_total_edit->telefono_reporta->caption(), $censo_total_edit->telefono_reporta->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_total_edit->fecha_reporte->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_reporte");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_total_edit->fecha_reporte->caption(), $censo_total_edit->fecha_reporte->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_reporte");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($censo_total_edit->fecha_reporte->errorMessage()) ?>");
			<?php if ($censo_total_edit->id_censo->Required) { ?>
				elm = this.getElements("x" + infix + "_id_censo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_total_edit->id_censo->caption(), $censo_total_edit->id_censo->RequiredErrorMessage)) ?>");
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
	fcenso_totaledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcenso_totaledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fcenso_totaledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $censo_total_edit->showPageHeader(); ?>
<?php
$censo_total_edit->showMessage();
?>
<form name="fcenso_totaledit" id="fcenso_totaledit" class="<?php echo $censo_total_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="censo_total">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$censo_total_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($censo_total_edit->id_hospital->Visible) { // id_hospital ?>
	<div id="r_id_hospital" class="form-group row">
		<label id="elh_censo_total_id_hospital" for="x_id_hospital" class="<?php echo $censo_total_edit->LeftColumnClass ?>"><?php echo $censo_total_edit->id_hospital->caption() ?><?php echo $censo_total_edit->id_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_total_edit->RightColumnClass ?>"><div <?php echo $censo_total_edit->id_hospital->cellAttributes() ?>>
<span id="el_censo_total_id_hospital">
<input type="text" data-table="censo_total" data-field="x_id_hospital" name="x_id_hospital" id="x_id_hospital" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($censo_total_edit->id_hospital->getPlaceHolder()) ?>" value="<?php echo $censo_total_edit->id_hospital->EditValue ?>"<?php echo $censo_total_edit->id_hospital->editAttributes() ?>>
</span>
<?php echo $censo_total_edit->id_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_total_edit->cod_servicio->Visible) { // cod_servicio ?>
	<div id="r_cod_servicio" class="form-group row">
		<label id="elh_censo_total_cod_servicio" for="x_cod_servicio" class="<?php echo $censo_total_edit->LeftColumnClass ?>"><?php echo $censo_total_edit->cod_servicio->caption() ?><?php echo $censo_total_edit->cod_servicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_total_edit->RightColumnClass ?>"><div <?php echo $censo_total_edit->cod_servicio->cellAttributes() ?>>
<span id="el_censo_total_cod_servicio">
<input type="text" data-table="censo_total" data-field="x_cod_servicio" name="x_cod_servicio" id="x_cod_servicio" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($censo_total_edit->cod_servicio->getPlaceHolder()) ?>" value="<?php echo $censo_total_edit->cod_servicio->EditValue ?>"<?php echo $censo_total_edit->cod_servicio->editAttributes() ?>>
</span>
<?php echo $censo_total_edit->cod_servicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_total_edit->cod_division->Visible) { // cod_division ?>
	<div id="r_cod_division" class="form-group row">
		<label id="elh_censo_total_cod_division" for="x_cod_division" class="<?php echo $censo_total_edit->LeftColumnClass ?>"><?php echo $censo_total_edit->cod_division->caption() ?><?php echo $censo_total_edit->cod_division->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_total_edit->RightColumnClass ?>"><div <?php echo $censo_total_edit->cod_division->cellAttributes() ?>>
<span id="el_censo_total_cod_division">
<input type="text" data-table="censo_total" data-field="x_cod_division" name="x_cod_division" id="x_cod_division" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($censo_total_edit->cod_division->getPlaceHolder()) ?>" value="<?php echo $censo_total_edit->cod_division->EditValue ?>"<?php echo $censo_total_edit->cod_division->editAttributes() ?>>
</span>
<?php echo $censo_total_edit->cod_division->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_total_edit->camas_ocupadas->Visible) { // camas_ocupadas ?>
	<div id="r_camas_ocupadas" class="form-group row">
		<label id="elh_censo_total_camas_ocupadas" for="x_camas_ocupadas" class="<?php echo $censo_total_edit->LeftColumnClass ?>"><?php echo $censo_total_edit->camas_ocupadas->caption() ?><?php echo $censo_total_edit->camas_ocupadas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_total_edit->RightColumnClass ?>"><div <?php echo $censo_total_edit->camas_ocupadas->cellAttributes() ?>>
<span id="el_censo_total_camas_ocupadas">
<input type="text" data-table="censo_total" data-field="x_camas_ocupadas" name="x_camas_ocupadas" id="x_camas_ocupadas" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($censo_total_edit->camas_ocupadas->getPlaceHolder()) ?>" value="<?php echo $censo_total_edit->camas_ocupadas->EditValue ?>"<?php echo $censo_total_edit->camas_ocupadas->editAttributes() ?>>
</span>
<?php echo $censo_total_edit->camas_ocupadas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_total_edit->camas_libres->Visible) { // camas_libres ?>
	<div id="r_camas_libres" class="form-group row">
		<label id="elh_censo_total_camas_libres" for="x_camas_libres" class="<?php echo $censo_total_edit->LeftColumnClass ?>"><?php echo $censo_total_edit->camas_libres->caption() ?><?php echo $censo_total_edit->camas_libres->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_total_edit->RightColumnClass ?>"><div <?php echo $censo_total_edit->camas_libres->cellAttributes() ?>>
<span id="el_censo_total_camas_libres">
<input type="text" data-table="censo_total" data-field="x_camas_libres" name="x_camas_libres" id="x_camas_libres" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($censo_total_edit->camas_libres->getPlaceHolder()) ?>" value="<?php echo $censo_total_edit->camas_libres->EditValue ?>"<?php echo $censo_total_edit->camas_libres->editAttributes() ?>>
</span>
<?php echo $censo_total_edit->camas_libres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_total_edit->camas_fueraservicio->Visible) { // camas_fueraservicio ?>
	<div id="r_camas_fueraservicio" class="form-group row">
		<label id="elh_censo_total_camas_fueraservicio" for="x_camas_fueraservicio" class="<?php echo $censo_total_edit->LeftColumnClass ?>"><?php echo $censo_total_edit->camas_fueraservicio->caption() ?><?php echo $censo_total_edit->camas_fueraservicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_total_edit->RightColumnClass ?>"><div <?php echo $censo_total_edit->camas_fueraservicio->cellAttributes() ?>>
<span id="el_censo_total_camas_fueraservicio">
<input type="text" data-table="censo_total" data-field="x_camas_fueraservicio" name="x_camas_fueraservicio" id="x_camas_fueraservicio" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($censo_total_edit->camas_fueraservicio->getPlaceHolder()) ?>" value="<?php echo $censo_total_edit->camas_fueraservicio->EditValue ?>"<?php echo $censo_total_edit->camas_fueraservicio->editAttributes() ?>>
</span>
<?php echo $censo_total_edit->camas_fueraservicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_total_edit->nombre_reporta->Visible) { // nombre_reporta ?>
	<div id="r_nombre_reporta" class="form-group row">
		<label id="elh_censo_total_nombre_reporta" for="x_nombre_reporta" class="<?php echo $censo_total_edit->LeftColumnClass ?>"><?php echo $censo_total_edit->nombre_reporta->caption() ?><?php echo $censo_total_edit->nombre_reporta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_total_edit->RightColumnClass ?>"><div <?php echo $censo_total_edit->nombre_reporta->cellAttributes() ?>>
<span id="el_censo_total_nombre_reporta">
<input type="text" data-table="censo_total" data-field="x_nombre_reporta" name="x_nombre_reporta" id="x_nombre_reporta" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($censo_total_edit->nombre_reporta->getPlaceHolder()) ?>" value="<?php echo $censo_total_edit->nombre_reporta->EditValue ?>"<?php echo $censo_total_edit->nombre_reporta->editAttributes() ?>>
</span>
<?php echo $censo_total_edit->nombre_reporta->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_total_edit->telefono_reporta->Visible) { // telefono_reporta ?>
	<div id="r_telefono_reporta" class="form-group row">
		<label id="elh_censo_total_telefono_reporta" for="x_telefono_reporta" class="<?php echo $censo_total_edit->LeftColumnClass ?>"><?php echo $censo_total_edit->telefono_reporta->caption() ?><?php echo $censo_total_edit->telefono_reporta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_total_edit->RightColumnClass ?>"><div <?php echo $censo_total_edit->telefono_reporta->cellAttributes() ?>>
<span id="el_censo_total_telefono_reporta">
<input type="text" data-table="censo_total" data-field="x_telefono_reporta" name="x_telefono_reporta" id="x_telefono_reporta" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($censo_total_edit->telefono_reporta->getPlaceHolder()) ?>" value="<?php echo $censo_total_edit->telefono_reporta->EditValue ?>"<?php echo $censo_total_edit->telefono_reporta->editAttributes() ?>>
</span>
<?php echo $censo_total_edit->telefono_reporta->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_total_edit->fecha_reporte->Visible) { // fecha_reporte ?>
	<div id="r_fecha_reporte" class="form-group row">
		<label id="elh_censo_total_fecha_reporte" for="x_fecha_reporte" class="<?php echo $censo_total_edit->LeftColumnClass ?>"><?php echo $censo_total_edit->fecha_reporte->caption() ?><?php echo $censo_total_edit->fecha_reporte->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_total_edit->RightColumnClass ?>"><div <?php echo $censo_total_edit->fecha_reporte->cellAttributes() ?>>
<span id="el_censo_total_fecha_reporte">
<input type="text" data-table="censo_total" data-field="x_fecha_reporte" name="x_fecha_reporte" id="x_fecha_reporte" maxlength="8" placeholder="<?php echo HtmlEncode($censo_total_edit->fecha_reporte->getPlaceHolder()) ?>" value="<?php echo $censo_total_edit->fecha_reporte->EditValue ?>"<?php echo $censo_total_edit->fecha_reporte->editAttributes() ?>>
<?php if (!$censo_total_edit->fecha_reporte->ReadOnly && !$censo_total_edit->fecha_reporte->Disabled && !isset($censo_total_edit->fecha_reporte->EditAttrs["readonly"]) && !isset($censo_total_edit->fecha_reporte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcenso_totaledit", "datetimepicker"], function() {
	ew.createDateTimePicker("fcenso_totaledit", "x_fecha_reporte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $censo_total_edit->fecha_reporte->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_total_edit->id_censo->Visible) { // id_censo ?>
	<div id="r_id_censo" class="form-group row">
		<label id="elh_censo_total_id_censo" class="<?php echo $censo_total_edit->LeftColumnClass ?>"><?php echo $censo_total_edit->id_censo->caption() ?><?php echo $censo_total_edit->id_censo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_total_edit->RightColumnClass ?>"><div <?php echo $censo_total_edit->id_censo->cellAttributes() ?>>
<span id="el_censo_total_id_censo">
<span<?php echo $censo_total_edit->id_censo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($censo_total_edit->id_censo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="censo_total" data-field="x_id_censo" name="x_id_censo" id="x_id_censo" value="<?php echo HtmlEncode($censo_total_edit->id_censo->CurrentValue) ?>">
<?php echo $censo_total_edit->id_censo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$censo_total_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $censo_total_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $censo_total_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$censo_total_edit->showPageFooter();
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
$censo_total_edit->terminate();
?>