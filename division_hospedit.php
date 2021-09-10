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
$division_hosp_edit = new division_hosp_edit();

// Run the page
$division_hosp_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$division_hosp_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdivision_hospedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fdivision_hospedit = currentForm = new ew.Form("fdivision_hospedit", "edit");

	// Validate form
	fdivision_hospedit.validate = function() {
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
			<?php if ($division_hosp_edit->descripcion->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $division_hosp_edit->descripcion->caption(), $division_hosp_edit->descripcion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($division_hosp_edit->id_servicio->Required) { ?>
				elm = this.getElements("x" + infix + "_id_servicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $division_hosp_edit->id_servicio->caption(), $division_hosp_edit->id_servicio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_servicio");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($division_hosp_edit->id_servicio->errorMessage()) ?>");
			<?php if ($division_hosp_edit->bloque->Required) { ?>
				elm = this.getElements("x" + infix + "_bloque");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $division_hosp_edit->bloque->caption(), $division_hosp_edit->bloque->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bloque");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($division_hosp_edit->bloque->errorMessage()) ?>");
			<?php if ($division_hosp_edit->id_division->Required) { ?>
				elm = this.getElements("x" + infix + "_id_division");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $division_hosp_edit->id_division->caption(), $division_hosp_edit->id_division->RequiredErrorMessage)) ?>");
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
	fdivision_hospedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdivision_hospedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fdivision_hospedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $division_hosp_edit->showPageHeader(); ?>
<?php
$division_hosp_edit->showMessage();
?>
<form name="fdivision_hospedit" id="fdivision_hospedit" class="<?php echo $division_hosp_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="division_hosp">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$division_hosp_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($division_hosp_edit->descripcion->Visible) { // descripcion ?>
	<div id="r_descripcion" class="form-group row">
		<label id="elh_division_hosp_descripcion" for="x_descripcion" class="<?php echo $division_hosp_edit->LeftColumnClass ?>"><?php echo $division_hosp_edit->descripcion->caption() ?><?php echo $division_hosp_edit->descripcion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $division_hosp_edit->RightColumnClass ?>"><div <?php echo $division_hosp_edit->descripcion->cellAttributes() ?>>
<span id="el_division_hosp_descripcion">
<input type="text" data-table="division_hosp" data-field="x_descripcion" name="x_descripcion" id="x_descripcion" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($division_hosp_edit->descripcion->getPlaceHolder()) ?>" value="<?php echo $division_hosp_edit->descripcion->EditValue ?>"<?php echo $division_hosp_edit->descripcion->editAttributes() ?>>
</span>
<?php echo $division_hosp_edit->descripcion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($division_hosp_edit->id_servicio->Visible) { // id_servicio ?>
	<div id="r_id_servicio" class="form-group row">
		<label id="elh_division_hosp_id_servicio" for="x_id_servicio" class="<?php echo $division_hosp_edit->LeftColumnClass ?>"><?php echo $division_hosp_edit->id_servicio->caption() ?><?php echo $division_hosp_edit->id_servicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $division_hosp_edit->RightColumnClass ?>"><div <?php echo $division_hosp_edit->id_servicio->cellAttributes() ?>>
<span id="el_division_hosp_id_servicio">
<input type="text" data-table="division_hosp" data-field="x_id_servicio" name="x_id_servicio" id="x_id_servicio" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($division_hosp_edit->id_servicio->getPlaceHolder()) ?>" value="<?php echo $division_hosp_edit->id_servicio->EditValue ?>"<?php echo $division_hosp_edit->id_servicio->editAttributes() ?>>
</span>
<?php echo $division_hosp_edit->id_servicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($division_hosp_edit->bloque->Visible) { // bloque ?>
	<div id="r_bloque" class="form-group row">
		<label id="elh_division_hosp_bloque" for="x_bloque" class="<?php echo $division_hosp_edit->LeftColumnClass ?>"><?php echo $division_hosp_edit->bloque->caption() ?><?php echo $division_hosp_edit->bloque->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $division_hosp_edit->RightColumnClass ?>"><div <?php echo $division_hosp_edit->bloque->cellAttributes() ?>>
<span id="el_division_hosp_bloque">
<input type="text" data-table="division_hosp" data-field="x_bloque" name="x_bloque" id="x_bloque" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($division_hosp_edit->bloque->getPlaceHolder()) ?>" value="<?php echo $division_hosp_edit->bloque->EditValue ?>"<?php echo $division_hosp_edit->bloque->editAttributes() ?>>
</span>
<?php echo $division_hosp_edit->bloque->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($division_hosp_edit->id_division->Visible) { // id_division ?>
	<div id="r_id_division" class="form-group row">
		<label id="elh_division_hosp_id_division" class="<?php echo $division_hosp_edit->LeftColumnClass ?>"><?php echo $division_hosp_edit->id_division->caption() ?><?php echo $division_hosp_edit->id_division->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $division_hosp_edit->RightColumnClass ?>"><div <?php echo $division_hosp_edit->id_division->cellAttributes() ?>>
<span id="el_division_hosp_id_division">
<span<?php echo $division_hosp_edit->id_division->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($division_hosp_edit->id_division->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="division_hosp" data-field="x_id_division" name="x_id_division" id="x_id_division" value="<?php echo HtmlEncode($division_hosp_edit->id_division->CurrentValue) ?>">
<?php echo $division_hosp_edit->id_division->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$division_hosp_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $division_hosp_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $division_hosp_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$division_hosp_edit->showPageFooter();
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
$division_hosp_edit->terminate();
?>