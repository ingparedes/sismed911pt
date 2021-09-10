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
$code_planta_edit = new code_planta_edit();

// Run the page
$code_planta_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$code_planta_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcode_plantaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fcode_plantaedit = currentForm = new ew.Form("fcode_plantaedit", "edit");

	// Validate form
	fcode_plantaedit.validate = function() {
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
			<?php if ($code_planta_edit->idacode->Required) { ?>
				elm = this.getElements("x" + infix + "_idacode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $code_planta_edit->idacode->caption(), $code_planta_edit->idacode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($code_planta_edit->nombreacode->Required) { ?>
				elm = this.getElements("x" + infix + "_nombreacode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $code_planta_edit->nombreacode->caption(), $code_planta_edit->nombreacode->RequiredErrorMessage)) ?>");
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
	fcode_plantaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcode_plantaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fcode_plantaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $code_planta_edit->showPageHeader(); ?>
<?php
$code_planta_edit->showMessage();
?>
<form name="fcode_plantaedit" id="fcode_plantaedit" class="<?php echo $code_planta_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="code_planta">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$code_planta_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($code_planta_edit->idacode->Visible) { // idacode ?>
	<div id="r_idacode" class="form-group row">
		<label id="elh_code_planta_idacode" class="<?php echo $code_planta_edit->LeftColumnClass ?>"><?php echo $code_planta_edit->idacode->caption() ?><?php echo $code_planta_edit->idacode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $code_planta_edit->RightColumnClass ?>"><div <?php echo $code_planta_edit->idacode->cellAttributes() ?>>
<span id="el_code_planta_idacode">
<span<?php echo $code_planta_edit->idacode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($code_planta_edit->idacode->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="code_planta" data-field="x_idacode" name="x_idacode" id="x_idacode" value="<?php echo HtmlEncode($code_planta_edit->idacode->CurrentValue) ?>">
<?php echo $code_planta_edit->idacode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($code_planta_edit->nombreacode->Visible) { // nombreacode ?>
	<div id="r_nombreacode" class="form-group row">
		<label id="elh_code_planta_nombreacode" for="x_nombreacode" class="<?php echo $code_planta_edit->LeftColumnClass ?>"><?php echo $code_planta_edit->nombreacode->caption() ?><?php echo $code_planta_edit->nombreacode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $code_planta_edit->RightColumnClass ?>"><div <?php echo $code_planta_edit->nombreacode->cellAttributes() ?>>
<span id="el_code_planta_nombreacode">
<input type="text" data-table="code_planta" data-field="x_nombreacode" name="x_nombreacode" id="x_nombreacode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($code_planta_edit->nombreacode->getPlaceHolder()) ?>" value="<?php echo $code_planta_edit->nombreacode->EditValue ?>"<?php echo $code_planta_edit->nombreacode->editAttributes() ?>>
</span>
<?php echo $code_planta_edit->nombreacode->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$code_planta_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $code_planta_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $code_planta_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$code_planta_edit->showPageFooter();
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
$code_planta_edit->terminate();
?>