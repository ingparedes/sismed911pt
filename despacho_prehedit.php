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
$despacho_preh_edit = new despacho_preh_edit();

// Run the page
$despacho_preh_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$despacho_preh_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdespacho_prehedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fdespacho_prehedit = currentForm = new ew.Form("fdespacho_prehedit", "edit");

	// Validate form
	fdespacho_prehedit.validate = function() {
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
			<?php if ($despacho_preh_edit->id_despacho->Required) { ?>
				elm = this.getElements("x" + infix + "_id_despacho");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $despacho_preh_edit->id_despacho->caption(), $despacho_preh_edit->id_despacho->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($despacho_preh_edit->fechahoradespacho->Required) { ?>
				elm = this.getElements("x" + infix + "_fechahoradespacho");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $despacho_preh_edit->fechahoradespacho->caption(), $despacho_preh_edit->fechahoradespacho->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($despacho_preh_edit->cod_caso->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_caso");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $despacho_preh_edit->cod_caso->caption(), $despacho_preh_edit->cod_caso->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($despacho_preh_edit->sede->Required) { ?>
				elm = this.getElements("x" + infix + "_sede");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $despacho_preh_edit->sede->caption(), $despacho_preh_edit->sede->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sede");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($despacho_preh_edit->sede->errorMessage()) ?>");
			<?php if ($despacho_preh_edit->nota->Required) { ?>
				elm = this.getElements("x" + infix + "_nota");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $despacho_preh_edit->nota->caption(), $despacho_preh_edit->nota->RequiredErrorMessage)) ?>");
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
	fdespacho_prehedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdespacho_prehedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fdespacho_prehedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $despacho_preh_edit->showPageHeader(); ?>
<?php
$despacho_preh_edit->showMessage();
?>
<form name="fdespacho_prehedit" id="fdespacho_prehedit" class="<?php echo $despacho_preh_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="despacho_preh">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$despacho_preh_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($despacho_preh_edit->id_despacho->Visible) { // id_despacho ?>
	<div id="r_id_despacho" class="form-group row">
		<label id="elh_despacho_preh_id_despacho" class="<?php echo $despacho_preh_edit->LeftColumnClass ?>"><?php echo $despacho_preh_edit->id_despacho->caption() ?><?php echo $despacho_preh_edit->id_despacho->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $despacho_preh_edit->RightColumnClass ?>"><div <?php echo $despacho_preh_edit->id_despacho->cellAttributes() ?>>
<span id="el_despacho_preh_id_despacho">
<span<?php echo $despacho_preh_edit->id_despacho->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($despacho_preh_edit->id_despacho->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="despacho_preh" data-field="x_id_despacho" name="x_id_despacho" id="x_id_despacho" value="<?php echo HtmlEncode($despacho_preh_edit->id_despacho->CurrentValue) ?>">
<?php echo $despacho_preh_edit->id_despacho->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($despacho_preh_edit->sede->Visible) { // sede ?>
	<div id="r_sede" class="form-group row">
		<label id="elh_despacho_preh_sede" for="x_sede" class="<?php echo $despacho_preh_edit->LeftColumnClass ?>"><?php echo $despacho_preh_edit->sede->caption() ?><?php echo $despacho_preh_edit->sede->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $despacho_preh_edit->RightColumnClass ?>"><div <?php echo $despacho_preh_edit->sede->cellAttributes() ?>>
<span id="el_despacho_preh_sede">
<input type="text" data-table="despacho_preh" data-field="x_sede" name="x_sede" id="x_sede" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($despacho_preh_edit->sede->getPlaceHolder()) ?>" value="<?php echo $despacho_preh_edit->sede->EditValue ?>"<?php echo $despacho_preh_edit->sede->editAttributes() ?>>
</span>
<?php echo $despacho_preh_edit->sede->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($despacho_preh_edit->nota->Visible) { // nota ?>
	<div id="r_nota" class="form-group row">
		<label id="elh_despacho_preh_nota" for="x_nota" class="<?php echo $despacho_preh_edit->LeftColumnClass ?>"><?php echo $despacho_preh_edit->nota->caption() ?><?php echo $despacho_preh_edit->nota->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $despacho_preh_edit->RightColumnClass ?>"><div <?php echo $despacho_preh_edit->nota->cellAttributes() ?>>
<span id="el_despacho_preh_nota">
<textarea data-table="despacho_preh" data-field="x_nota" name="x_nota" id="x_nota" cols="35" rows="4" placeholder="<?php echo HtmlEncode($despacho_preh_edit->nota->getPlaceHolder()) ?>"<?php echo $despacho_preh_edit->nota->editAttributes() ?>><?php echo $despacho_preh_edit->nota->EditValue ?></textarea>
</span>
<?php echo $despacho_preh_edit->nota->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<span id="el_despacho_preh_cod_caso">
<input type="hidden" data-table="despacho_preh" data-field="x_cod_caso" name="x_cod_caso" id="x_cod_caso" value="<?php echo HtmlEncode($despacho_preh_edit->cod_caso->CurrentValue) ?>">
</span>
<?php if (!$despacho_preh_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $despacho_preh_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $despacho_preh_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$despacho_preh_edit->showPageFooter();
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
$despacho_preh_edit->terminate();
?>