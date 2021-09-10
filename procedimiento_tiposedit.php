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
$procedimiento_tipos_edit = new procedimiento_tipos_edit();

// Run the page
$procedimiento_tipos_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$procedimiento_tipos_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fprocedimiento_tiposedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fprocedimiento_tiposedit = currentForm = new ew.Form("fprocedimiento_tiposedit", "edit");

	// Validate form
	fprocedimiento_tiposedit.validate = function() {
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
			<?php if ($procedimiento_tipos_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $procedimiento_tipos_edit->id->caption(), $procedimiento_tipos_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($procedimiento_tipos_edit->nombre_procedimeto->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_procedimeto");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $procedimiento_tipos_edit->nombre_procedimeto->caption(), $procedimiento_tipos_edit->nombre_procedimeto->RequiredErrorMessage)) ?>");
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
	fprocedimiento_tiposedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fprocedimiento_tiposedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fprocedimiento_tiposedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $procedimiento_tipos_edit->showPageHeader(); ?>
<?php
$procedimiento_tipos_edit->showMessage();
?>
<form name="fprocedimiento_tiposedit" id="fprocedimiento_tiposedit" class="<?php echo $procedimiento_tipos_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="procedimiento_tipos">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$procedimiento_tipos_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($procedimiento_tipos_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_procedimiento_tipos_id" class="<?php echo $procedimiento_tipos_edit->LeftColumnClass ?>"><?php echo $procedimiento_tipos_edit->id->caption() ?><?php echo $procedimiento_tipos_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $procedimiento_tipos_edit->RightColumnClass ?>"><div <?php echo $procedimiento_tipos_edit->id->cellAttributes() ?>>
<span id="el_procedimiento_tipos_id">
<span<?php echo $procedimiento_tipos_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($procedimiento_tipos_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="procedimiento_tipos" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($procedimiento_tipos_edit->id->CurrentValue) ?>">
<?php echo $procedimiento_tipos_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($procedimiento_tipos_edit->nombre_procedimeto->Visible) { // nombre_procedimeto ?>
	<div id="r_nombre_procedimeto" class="form-group row">
		<label id="elh_procedimiento_tipos_nombre_procedimeto" for="x_nombre_procedimeto" class="<?php echo $procedimiento_tipos_edit->LeftColumnClass ?>"><?php echo $procedimiento_tipos_edit->nombre_procedimeto->caption() ?><?php echo $procedimiento_tipos_edit->nombre_procedimeto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $procedimiento_tipos_edit->RightColumnClass ?>"><div <?php echo $procedimiento_tipos_edit->nombre_procedimeto->cellAttributes() ?>>
<span id="el_procedimiento_tipos_nombre_procedimeto">
<input type="text" data-table="procedimiento_tipos" data-field="x_nombre_procedimeto" name="x_nombre_procedimeto" id="x_nombre_procedimeto" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($procedimiento_tipos_edit->nombre_procedimeto->getPlaceHolder()) ?>" value="<?php echo $procedimiento_tipos_edit->nombre_procedimeto->EditValue ?>"<?php echo $procedimiento_tipos_edit->nombre_procedimeto->editAttributes() ?>>
</span>
<?php echo $procedimiento_tipos_edit->nombre_procedimeto->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$procedimiento_tipos_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $procedimiento_tipos_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $procedimiento_tipos_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$procedimiento_tipos_edit->showPageFooter();
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
$procedimiento_tipos_edit->terminate();
?>