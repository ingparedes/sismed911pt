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
$explo_fisica_edit = new explo_fisica_edit();

// Run the page
$explo_fisica_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_fisica_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fexplo_fisicaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fexplo_fisicaedit = currentForm = new ew.Form("fexplo_fisicaedit", "edit");

	// Validate form
	fexplo_fisicaedit.validate = function() {
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
			<?php if ($explo_fisica_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_fisica_edit->id->caption(), $explo_fisica_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($explo_fisica_edit->nombre->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_fisica_edit->nombre->caption(), $explo_fisica_edit->nombre->RequiredErrorMessage)) ?>");
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
	fexplo_fisicaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fexplo_fisicaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fexplo_fisicaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $explo_fisica_edit->showPageHeader(); ?>
<?php
$explo_fisica_edit->showMessage();
?>
<form name="fexplo_fisicaedit" id="fexplo_fisicaedit" class="<?php echo $explo_fisica_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_fisica">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$explo_fisica_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($explo_fisica_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_explo_fisica_id" class="<?php echo $explo_fisica_edit->LeftColumnClass ?>"><?php echo $explo_fisica_edit->id->caption() ?><?php echo $explo_fisica_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_fisica_edit->RightColumnClass ?>"><div <?php echo $explo_fisica_edit->id->cellAttributes() ?>>
<span id="el_explo_fisica_id">
<span<?php echo $explo_fisica_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($explo_fisica_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="explo_fisica" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($explo_fisica_edit->id->CurrentValue) ?>">
<?php echo $explo_fisica_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($explo_fisica_edit->nombre->Visible) { // nombre ?>
	<div id="r_nombre" class="form-group row">
		<label id="elh_explo_fisica_nombre" for="x_nombre" class="<?php echo $explo_fisica_edit->LeftColumnClass ?>"><?php echo $explo_fisica_edit->nombre->caption() ?><?php echo $explo_fisica_edit->nombre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_fisica_edit->RightColumnClass ?>"><div <?php echo $explo_fisica_edit->nombre->cellAttributes() ?>>
<span id="el_explo_fisica_nombre">
<input type="text" data-table="explo_fisica" data-field="x_nombre" name="x_nombre" id="x_nombre" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($explo_fisica_edit->nombre->getPlaceHolder()) ?>" value="<?php echo $explo_fisica_edit->nombre->EditValue ?>"<?php echo $explo_fisica_edit->nombre->editAttributes() ?>>
</span>
<?php echo $explo_fisica_edit->nombre->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$explo_fisica_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $explo_fisica_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $explo_fisica_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$explo_fisica_edit->showPageFooter();
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
$explo_fisica_edit->terminate();
?>