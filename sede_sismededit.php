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
$sede_sismed_edit = new sede_sismed_edit();

// Run the page
$sede_sismed_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sede_sismed_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsede_sismededit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fsede_sismededit = currentForm = new ew.Form("fsede_sismededit", "edit");

	// Validate form
	fsede_sismededit.validate = function() {
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
			<?php if ($sede_sismed_edit->id_sede->Required) { ?>
				elm = this.getElements("x" + infix + "_id_sede");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sede_sismed_edit->id_sede->caption(), $sede_sismed_edit->id_sede->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sede_sismed_edit->nombre_sede->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_sede");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sede_sismed_edit->nombre_sede->caption(), $sede_sismed_edit->nombre_sede->RequiredErrorMessage)) ?>");
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
	fsede_sismededit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsede_sismededit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fsede_sismededit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sede_sismed_edit->showPageHeader(); ?>
<?php
$sede_sismed_edit->showMessage();
?>
<form name="fsede_sismededit" id="fsede_sismededit" class="<?php echo $sede_sismed_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sede_sismed">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sede_sismed_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sede_sismed_edit->id_sede->Visible) { // id_sede ?>
	<div id="r_id_sede" class="form-group row">
		<label id="elh_sede_sismed_id_sede" class="<?php echo $sede_sismed_edit->LeftColumnClass ?>"><?php echo $sede_sismed_edit->id_sede->caption() ?><?php echo $sede_sismed_edit->id_sede->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sede_sismed_edit->RightColumnClass ?>"><div <?php echo $sede_sismed_edit->id_sede->cellAttributes() ?>>
<span id="el_sede_sismed_id_sede">
<span<?php echo $sede_sismed_edit->id_sede->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($sede_sismed_edit->id_sede->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="sede_sismed" data-field="x_id_sede" name="x_id_sede" id="x_id_sede" value="<?php echo HtmlEncode($sede_sismed_edit->id_sede->CurrentValue) ?>">
<?php echo $sede_sismed_edit->id_sede->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sede_sismed_edit->nombre_sede->Visible) { // nombre_sede ?>
	<div id="r_nombre_sede" class="form-group row">
		<label id="elh_sede_sismed_nombre_sede" for="x_nombre_sede" class="<?php echo $sede_sismed_edit->LeftColumnClass ?>"><?php echo $sede_sismed_edit->nombre_sede->caption() ?><?php echo $sede_sismed_edit->nombre_sede->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sede_sismed_edit->RightColumnClass ?>"><div <?php echo $sede_sismed_edit->nombre_sede->cellAttributes() ?>>
<span id="el_sede_sismed_nombre_sede">
<input type="text" data-table="sede_sismed" data-field="x_nombre_sede" name="x_nombre_sede" id="x_nombre_sede" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($sede_sismed_edit->nombre_sede->getPlaceHolder()) ?>" value="<?php echo $sede_sismed_edit->nombre_sede->EditValue ?>"<?php echo $sede_sismed_edit->nombre_sede->editAttributes() ?>>
</span>
<?php echo $sede_sismed_edit->nombre_sede->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sede_sismed_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sede_sismed_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sede_sismed_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sede_sismed_edit->showPageFooter();
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
$sede_sismed_edit->terminate();
?>