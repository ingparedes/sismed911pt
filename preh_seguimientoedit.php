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
$preh_seguimiento_edit = new preh_seguimiento_edit();

// Run the page
$preh_seguimiento_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_seguimiento_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_seguimientoedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpreh_seguimientoedit = currentForm = new ew.Form("fpreh_seguimientoedit", "edit");

	// Validate form
	fpreh_seguimientoedit.validate = function() {
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
			<?php if ($preh_seguimiento_edit->id_seguimiento->Required) { ?>
				elm = this.getElements("x" + infix + "_id_seguimiento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_seguimiento_edit->id_seguimiento->caption(), $preh_seguimiento_edit->id_seguimiento->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_seguimiento_edit->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_seguimiento_edit->cod_casopreh->caption(), $preh_seguimiento_edit->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_seguimiento_edit->seguimento->Required) { ?>
				elm = this.getElements("x" + infix + "_seguimento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_seguimiento_edit->seguimento->caption(), $preh_seguimiento_edit->seguimento->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_seguimiento_edit->fecha_seguimento->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_seguimento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_seguimiento_edit->fecha_seguimento->caption(), $preh_seguimiento_edit->fecha_seguimento->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_seguimiento_edit->despacho->Required) { ?>
				elm = this.getElements("x" + infix + "_despacho");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_seguimiento_edit->despacho->caption(), $preh_seguimiento_edit->despacho->RequiredErrorMessage)) ?>");
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
	fpreh_seguimientoedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpreh_seguimientoedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpreh_seguimientoedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $preh_seguimiento_edit->showPageHeader(); ?>
<?php
$preh_seguimiento_edit->showMessage();
?>
<form name="fpreh_seguimientoedit" id="fpreh_seguimientoedit" class="<?php echo $preh_seguimiento_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_seguimiento">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$preh_seguimiento_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($preh_seguimiento_edit->id_seguimiento->Visible) { // id_seguimiento ?>
	<div id="r_id_seguimiento" class="form-group row">
		<label id="elh_preh_seguimiento_id_seguimiento" class="<?php echo $preh_seguimiento_edit->LeftColumnClass ?>"><?php echo $preh_seguimiento_edit->id_seguimiento->caption() ?><?php echo $preh_seguimiento_edit->id_seguimiento->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_seguimiento_edit->RightColumnClass ?>"><div <?php echo $preh_seguimiento_edit->id_seguimiento->cellAttributes() ?>>
<span id="el_preh_seguimiento_id_seguimiento">
<span<?php echo $preh_seguimiento_edit->id_seguimiento->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($preh_seguimiento_edit->id_seguimiento->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="preh_seguimiento" data-field="x_id_seguimiento" name="x_id_seguimiento" id="x_id_seguimiento" value="<?php echo HtmlEncode($preh_seguimiento_edit->id_seguimiento->CurrentValue) ?>">
<?php echo $preh_seguimiento_edit->id_seguimiento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_seguimiento_edit->seguimento->Visible) { // seguimento ?>
	<div id="r_seguimento" class="form-group row">
		<label id="elh_preh_seguimiento_seguimento" for="x_seguimento" class="<?php echo $preh_seguimiento_edit->LeftColumnClass ?>"><?php echo $preh_seguimiento_edit->seguimento->caption() ?><?php echo $preh_seguimiento_edit->seguimento->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_seguimiento_edit->RightColumnClass ?>"><div <?php echo $preh_seguimiento_edit->seguimento->cellAttributes() ?>>
<span id="el_preh_seguimiento_seguimento">
<textarea data-table="preh_seguimiento" data-field="x_seguimento" name="x_seguimento" id="x_seguimento" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_seguimiento_edit->seguimento->getPlaceHolder()) ?>"<?php echo $preh_seguimiento_edit->seguimento->editAttributes() ?>><?php echo $preh_seguimiento_edit->seguimento->EditValue ?></textarea>
</span>
<?php echo $preh_seguimiento_edit->seguimento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_seguimiento_edit->despacho->Visible) { // despacho ?>
	<div id="r_despacho" class="form-group row">
		<label id="elh_preh_seguimiento_despacho" for="x_despacho" class="<?php echo $preh_seguimiento_edit->LeftColumnClass ?>"><?php echo $preh_seguimiento_edit->despacho->caption() ?><?php echo $preh_seguimiento_edit->despacho->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_seguimiento_edit->RightColumnClass ?>"><div <?php echo $preh_seguimiento_edit->despacho->cellAttributes() ?>>
<span id="el_preh_seguimiento_despacho">
<input type="text" data-table="preh_seguimiento" data-field="x_despacho" name="x_despacho" id="x_despacho" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($preh_seguimiento_edit->despacho->getPlaceHolder()) ?>" value="<?php echo $preh_seguimiento_edit->despacho->EditValue ?>"<?php echo $preh_seguimiento_edit->despacho->editAttributes() ?>>
</span>
<?php echo $preh_seguimiento_edit->despacho->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<span id="el_preh_seguimiento_cod_casopreh">
<input type="hidden" data-table="preh_seguimiento" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" value="<?php echo HtmlEncode($preh_seguimiento_edit->cod_casopreh->CurrentValue) ?>">
</span>
<?php if (!$preh_seguimiento_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $preh_seguimiento_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_seguimiento_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$preh_seguimiento_edit->showPageFooter();
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
$preh_seguimiento_edit->terminate();
?>