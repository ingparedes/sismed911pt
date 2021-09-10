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
$interh_seguimiento_edit = new interh_seguimiento_edit();

// Run the page
$interh_seguimiento_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_seguimiento_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_seguimientoedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	finterh_seguimientoedit = currentForm = new ew.Form("finterh_seguimientoedit", "edit");

	// Validate form
	finterh_seguimientoedit.validate = function() {
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
			<?php if ($interh_seguimiento_edit->fecha_seguimento->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_seguimento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_seguimiento_edit->fecha_seguimento->caption(), $interh_seguimiento_edit->fecha_seguimento->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_seguimiento_edit->cod_casointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_seguimiento_edit->cod_casointerh->caption(), $interh_seguimiento_edit->cod_casointerh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_seguimiento_edit->seguimento->Required) { ?>
				elm = this.getElements("x" + infix + "_seguimento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_seguimiento_edit->seguimento->caption(), $interh_seguimiento_edit->seguimento->RequiredErrorMessage)) ?>");
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
	finterh_seguimientoedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_seguimientoedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("finterh_seguimientoedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $interh_seguimiento_edit->showPageHeader(); ?>
<?php
$interh_seguimiento_edit->showMessage();
?>
<form name="finterh_seguimientoedit" id="finterh_seguimientoedit" class="<?php echo $interh_seguimiento_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_seguimiento">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$interh_seguimiento_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($interh_seguimiento_edit->seguimento->Visible) { // seguimento ?>
	<div id="r_seguimento" class="form-group row">
		<label id="elh_interh_seguimiento_seguimento" for="x_seguimento" class="<?php echo $interh_seguimiento_edit->LeftColumnClass ?>"><?php echo $interh_seguimiento_edit->seguimento->caption() ?><?php echo $interh_seguimiento_edit->seguimento->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_seguimiento_edit->RightColumnClass ?>"><div <?php echo $interh_seguimiento_edit->seguimento->cellAttributes() ?>>
<span id="el_interh_seguimiento_seguimento">
<textarea data-table="interh_seguimiento" data-field="x_seguimento" name="x_seguimento" id="x_seguimento" cols="35" rows="5" placeholder="<?php echo HtmlEncode($interh_seguimiento_edit->seguimento->getPlaceHolder()) ?>"<?php echo $interh_seguimiento_edit->seguimento->editAttributes() ?>><?php echo $interh_seguimiento_edit->seguimento->EditValue ?></textarea>
</span>
<?php echo $interh_seguimiento_edit->seguimento->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<span id="el_interh_seguimiento_cod_casointerh">
<input type="hidden" data-table="interh_seguimiento" data-field="x_cod_casointerh" name="x_cod_casointerh" id="x_cod_casointerh" value="<?php echo HtmlEncode($interh_seguimiento_edit->cod_casointerh->CurrentValue) ?>">
</span>
	<input type="hidden" data-table="interh_seguimiento" data-field="x_id_seguimiento" name="x_id_seguimiento" id="x_id_seguimiento" value="<?php echo HtmlEncode($interh_seguimiento_edit->id_seguimiento->CurrentValue) ?>">
<?php if (!$interh_seguimiento_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $interh_seguimiento_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_seguimiento_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$interh_seguimiento_edit->showPageFooter();
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
$interh_seguimiento_edit->terminate();
?>