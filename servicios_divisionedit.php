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
$servicios_division_edit = new servicios_division_edit();

// Run the page
$servicios_division_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicios_division_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fservicios_divisionedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fservicios_divisionedit = currentForm = new ew.Form("fservicios_divisionedit", "edit");

	// Validate form
	fservicios_divisionedit.validate = function() {
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
			<?php if ($servicios_division_edit->nombre_servicio->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_servicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicios_division_edit->nombre_servicio->caption(), $servicios_division_edit->nombre_servicio->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicios_division_edit->id_servicio->Required) { ?>
				elm = this.getElements("x" + infix + "_id_servicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicios_division_edit->id_servicio->caption(), $servicios_division_edit->id_servicio->RequiredErrorMessage)) ?>");
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
	fservicios_divisionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fservicios_divisionedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fservicios_divisionedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $servicios_division_edit->showPageHeader(); ?>
<?php
$servicios_division_edit->showMessage();
?>
<form name="fservicios_divisionedit" id="fservicios_divisionedit" class="<?php echo $servicios_division_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicios_division">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$servicios_division_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($servicios_division_edit->nombre_servicio->Visible) { // nombre_servicio ?>
	<div id="r_nombre_servicio" class="form-group row">
		<label id="elh_servicios_division_nombre_servicio" for="x_nombre_servicio" class="<?php echo $servicios_division_edit->LeftColumnClass ?>"><?php echo $servicios_division_edit->nombre_servicio->caption() ?><?php echo $servicios_division_edit->nombre_servicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $servicios_division_edit->RightColumnClass ?>"><div <?php echo $servicios_division_edit->nombre_servicio->cellAttributes() ?>>
<span id="el_servicios_division_nombre_servicio">
<input type="text" data-table="servicios_division" data-field="x_nombre_servicio" name="x_nombre_servicio" id="x_nombre_servicio" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($servicios_division_edit->nombre_servicio->getPlaceHolder()) ?>" value="<?php echo $servicios_division_edit->nombre_servicio->EditValue ?>"<?php echo $servicios_division_edit->nombre_servicio->editAttributes() ?>>
</span>
<?php echo $servicios_division_edit->nombre_servicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicios_division_edit->id_servicio->Visible) { // id_servicio ?>
	<div id="r_id_servicio" class="form-group row">
		<label id="elh_servicios_division_id_servicio" class="<?php echo $servicios_division_edit->LeftColumnClass ?>"><?php echo $servicios_division_edit->id_servicio->caption() ?><?php echo $servicios_division_edit->id_servicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $servicios_division_edit->RightColumnClass ?>"><div <?php echo $servicios_division_edit->id_servicio->cellAttributes() ?>>
<span id="el_servicios_division_id_servicio">
<span<?php echo $servicios_division_edit->id_servicio->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($servicios_division_edit->id_servicio->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="servicios_division" data-field="x_id_servicio" name="x_id_servicio" id="x_id_servicio" value="<?php echo HtmlEncode($servicios_division_edit->id_servicio->CurrentValue) ?>">
<?php echo $servicios_division_edit->id_servicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$servicios_division_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $servicios_division_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $servicios_division_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$servicios_division_edit->showPageFooter();
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
$servicios_division_edit->terminate();
?>