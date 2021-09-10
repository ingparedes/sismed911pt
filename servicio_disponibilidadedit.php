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
$servicio_disponibilidad_edit = new servicio_disponibilidad_edit();

// Run the page
$servicio_disponibilidad_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicio_disponibilidad_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fservicio_disponibilidadedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fservicio_disponibilidadedit = currentForm = new ew.Form("fservicio_disponibilidadedit", "edit");

	// Validate form
	fservicio_disponibilidadedit.validate = function() {
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
			<?php if ($servicio_disponibilidad_edit->servicio_disponabilidad->Required) { ?>
				elm = this.getElements("x" + infix + "_servicio_disponabilidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_disponibilidad_edit->servicio_disponabilidad->caption(), $servicio_disponibilidad_edit->servicio_disponabilidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_disponibilidad_edit->nombre_serv_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_serv_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_disponibilidad_edit->nombre_serv_es->caption(), $servicio_disponibilidad_edit->nombre_serv_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_disponibilidad_edit->nombre_serv_en->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_serv_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_disponibilidad_edit->nombre_serv_en->caption(), $servicio_disponibilidad_edit->nombre_serv_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_disponibilidad_edit->nombre_serv_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_serv_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_disponibilidad_edit->nombre_serv_pr->caption(), $servicio_disponibilidad_edit->nombre_serv_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_disponibilidad_edit->nombre_serv_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_serv_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_disponibilidad_edit->nombre_serv_fr->caption(), $servicio_disponibilidad_edit->nombre_serv_fr->RequiredErrorMessage)) ?>");
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
	fservicio_disponibilidadedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fservicio_disponibilidadedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fservicio_disponibilidadedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $servicio_disponibilidad_edit->showPageHeader(); ?>
<?php
$servicio_disponibilidad_edit->showMessage();
?>
<form name="fservicio_disponibilidadedit" id="fservicio_disponibilidadedit" class="<?php echo $servicio_disponibilidad_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicio_disponibilidad">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$servicio_disponibilidad_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($servicio_disponibilidad_edit->servicio_disponabilidad->Visible) { // servicio_disponabilidad ?>
	<div id="r_servicio_disponabilidad" class="form-group row">
		<label id="elh_servicio_disponibilidad_servicio_disponabilidad" class="<?php echo $servicio_disponibilidad_edit->LeftColumnClass ?>"><?php echo $servicio_disponibilidad_edit->servicio_disponabilidad->caption() ?><?php echo $servicio_disponibilidad_edit->servicio_disponabilidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $servicio_disponibilidad_edit->RightColumnClass ?>"><div <?php echo $servicio_disponibilidad_edit->servicio_disponabilidad->cellAttributes() ?>>
<span id="el_servicio_disponibilidad_servicio_disponabilidad">
<span<?php echo $servicio_disponibilidad_edit->servicio_disponabilidad->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($servicio_disponibilidad_edit->servicio_disponabilidad->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="servicio_disponibilidad" data-field="x_servicio_disponabilidad" name="x_servicio_disponabilidad" id="x_servicio_disponabilidad" value="<?php echo HtmlEncode($servicio_disponibilidad_edit->servicio_disponabilidad->CurrentValue) ?>">
<?php echo $servicio_disponibilidad_edit->servicio_disponabilidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_disponibilidad_edit->nombre_serv_es->Visible) { // nombre_serv_es ?>
	<div id="r_nombre_serv_es" class="form-group row">
		<label id="elh_servicio_disponibilidad_nombre_serv_es" for="x_nombre_serv_es" class="<?php echo $servicio_disponibilidad_edit->LeftColumnClass ?>"><?php echo $servicio_disponibilidad_edit->nombre_serv_es->caption() ?><?php echo $servicio_disponibilidad_edit->nombre_serv_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $servicio_disponibilidad_edit->RightColumnClass ?>"><div <?php echo $servicio_disponibilidad_edit->nombre_serv_es->cellAttributes() ?>>
<span id="el_servicio_disponibilidad_nombre_serv_es">
<input type="text" data-table="servicio_disponibilidad" data-field="x_nombre_serv_es" name="x_nombre_serv_es" id="x_nombre_serv_es" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($servicio_disponibilidad_edit->nombre_serv_es->getPlaceHolder()) ?>" value="<?php echo $servicio_disponibilidad_edit->nombre_serv_es->EditValue ?>"<?php echo $servicio_disponibilidad_edit->nombre_serv_es->editAttributes() ?>>
</span>
<?php echo $servicio_disponibilidad_edit->nombre_serv_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_disponibilidad_edit->nombre_serv_en->Visible) { // nombre_serv_en ?>
	<div id="r_nombre_serv_en" class="form-group row">
		<label id="elh_servicio_disponibilidad_nombre_serv_en" for="x_nombre_serv_en" class="<?php echo $servicio_disponibilidad_edit->LeftColumnClass ?>"><?php echo $servicio_disponibilidad_edit->nombre_serv_en->caption() ?><?php echo $servicio_disponibilidad_edit->nombre_serv_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $servicio_disponibilidad_edit->RightColumnClass ?>"><div <?php echo $servicio_disponibilidad_edit->nombre_serv_en->cellAttributes() ?>>
<span id="el_servicio_disponibilidad_nombre_serv_en">
<input type="text" data-table="servicio_disponibilidad" data-field="x_nombre_serv_en" name="x_nombre_serv_en" id="x_nombre_serv_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($servicio_disponibilidad_edit->nombre_serv_en->getPlaceHolder()) ?>" value="<?php echo $servicio_disponibilidad_edit->nombre_serv_en->EditValue ?>"<?php echo $servicio_disponibilidad_edit->nombre_serv_en->editAttributes() ?>>
</span>
<?php echo $servicio_disponibilidad_edit->nombre_serv_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_disponibilidad_edit->nombre_serv_pr->Visible) { // nombre_serv_pr ?>
	<div id="r_nombre_serv_pr" class="form-group row">
		<label id="elh_servicio_disponibilidad_nombre_serv_pr" for="x_nombre_serv_pr" class="<?php echo $servicio_disponibilidad_edit->LeftColumnClass ?>"><?php echo $servicio_disponibilidad_edit->nombre_serv_pr->caption() ?><?php echo $servicio_disponibilidad_edit->nombre_serv_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $servicio_disponibilidad_edit->RightColumnClass ?>"><div <?php echo $servicio_disponibilidad_edit->nombre_serv_pr->cellAttributes() ?>>
<span id="el_servicio_disponibilidad_nombre_serv_pr">
<input type="text" data-table="servicio_disponibilidad" data-field="x_nombre_serv_pr" name="x_nombre_serv_pr" id="x_nombre_serv_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($servicio_disponibilidad_edit->nombre_serv_pr->getPlaceHolder()) ?>" value="<?php echo $servicio_disponibilidad_edit->nombre_serv_pr->EditValue ?>"<?php echo $servicio_disponibilidad_edit->nombre_serv_pr->editAttributes() ?>>
</span>
<?php echo $servicio_disponibilidad_edit->nombre_serv_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_disponibilidad_edit->nombre_serv_fr->Visible) { // nombre_serv_fr ?>
	<div id="r_nombre_serv_fr" class="form-group row">
		<label id="elh_servicio_disponibilidad_nombre_serv_fr" for="x_nombre_serv_fr" class="<?php echo $servicio_disponibilidad_edit->LeftColumnClass ?>"><?php echo $servicio_disponibilidad_edit->nombre_serv_fr->caption() ?><?php echo $servicio_disponibilidad_edit->nombre_serv_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $servicio_disponibilidad_edit->RightColumnClass ?>"><div <?php echo $servicio_disponibilidad_edit->nombre_serv_fr->cellAttributes() ?>>
<span id="el_servicio_disponibilidad_nombre_serv_fr">
<input type="text" data-table="servicio_disponibilidad" data-field="x_nombre_serv_fr" name="x_nombre_serv_fr" id="x_nombre_serv_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($servicio_disponibilidad_edit->nombre_serv_fr->getPlaceHolder()) ?>" value="<?php echo $servicio_disponibilidad_edit->nombre_serv_fr->EditValue ?>"<?php echo $servicio_disponibilidad_edit->nombre_serv_fr->editAttributes() ?>>
</span>
<?php echo $servicio_disponibilidad_edit->nombre_serv_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$servicio_disponibilidad_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $servicio_disponibilidad_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $servicio_disponibilidad_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$servicio_disponibilidad_edit->showPageFooter();
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
$servicio_disponibilidad_edit->terminate();
?>