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
$distrito_reniec_edit = new distrito_reniec_edit();

// Run the page
$distrito_reniec_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$distrito_reniec_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdistrito_reniecedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fdistrito_reniecedit = currentForm = new ew.Form("fdistrito_reniecedit", "edit");

	// Validate form
	fdistrito_reniecedit.validate = function() {
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
			<?php if ($distrito_reniec_edit->cod_dpto->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_dpto");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $distrito_reniec_edit->cod_dpto->caption(), $distrito_reniec_edit->cod_dpto->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($distrito_reniec_edit->cod_provincia->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_provincia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $distrito_reniec_edit->cod_provincia->caption(), $distrito_reniec_edit->cod_provincia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($distrito_reniec_edit->cod_distrito->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_distrito");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $distrito_reniec_edit->cod_distrito->caption(), $distrito_reniec_edit->cod_distrito->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($distrito_reniec_edit->nombre_distrito->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_distrito");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $distrito_reniec_edit->nombre_distrito->caption(), $distrito_reniec_edit->nombre_distrito->RequiredErrorMessage)) ?>");
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
	fdistrito_reniecedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdistrito_reniecedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fdistrito_reniecedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $distrito_reniec_edit->showPageHeader(); ?>
<?php
$distrito_reniec_edit->showMessage();
?>
<form name="fdistrito_reniecedit" id="fdistrito_reniecedit" class="<?php echo $distrito_reniec_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="distrito_reniec">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$distrito_reniec_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($distrito_reniec_edit->cod_dpto->Visible) { // cod_dpto ?>
	<div id="r_cod_dpto" class="form-group row">
		<label id="elh_distrito_reniec_cod_dpto" for="x_cod_dpto" class="<?php echo $distrito_reniec_edit->LeftColumnClass ?>"><?php echo $distrito_reniec_edit->cod_dpto->caption() ?><?php echo $distrito_reniec_edit->cod_dpto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $distrito_reniec_edit->RightColumnClass ?>"><div <?php echo $distrito_reniec_edit->cod_dpto->cellAttributes() ?>>
<span id="el_distrito_reniec_cod_dpto">
<input type="text" data-table="distrito_reniec" data-field="x_cod_dpto" name="x_cod_dpto" id="x_cod_dpto" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($distrito_reniec_edit->cod_dpto->getPlaceHolder()) ?>" value="<?php echo $distrito_reniec_edit->cod_dpto->EditValue ?>"<?php echo $distrito_reniec_edit->cod_dpto->editAttributes() ?>>
</span>
<?php echo $distrito_reniec_edit->cod_dpto->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($distrito_reniec_edit->cod_provincia->Visible) { // cod_provincia ?>
	<div id="r_cod_provincia" class="form-group row">
		<label id="elh_distrito_reniec_cod_provincia" for="x_cod_provincia" class="<?php echo $distrito_reniec_edit->LeftColumnClass ?>"><?php echo $distrito_reniec_edit->cod_provincia->caption() ?><?php echo $distrito_reniec_edit->cod_provincia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $distrito_reniec_edit->RightColumnClass ?>"><div <?php echo $distrito_reniec_edit->cod_provincia->cellAttributes() ?>>
<span id="el_distrito_reniec_cod_provincia">
<input type="text" data-table="distrito_reniec" data-field="x_cod_provincia" name="x_cod_provincia" id="x_cod_provincia" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($distrito_reniec_edit->cod_provincia->getPlaceHolder()) ?>" value="<?php echo $distrito_reniec_edit->cod_provincia->EditValue ?>"<?php echo $distrito_reniec_edit->cod_provincia->editAttributes() ?>>
</span>
<?php echo $distrito_reniec_edit->cod_provincia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($distrito_reniec_edit->cod_distrito->Visible) { // cod_distrito ?>
	<div id="r_cod_distrito" class="form-group row">
		<label id="elh_distrito_reniec_cod_distrito" for="x_cod_distrito" class="<?php echo $distrito_reniec_edit->LeftColumnClass ?>"><?php echo $distrito_reniec_edit->cod_distrito->caption() ?><?php echo $distrito_reniec_edit->cod_distrito->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $distrito_reniec_edit->RightColumnClass ?>"><div <?php echo $distrito_reniec_edit->cod_distrito->cellAttributes() ?>>
<input type="text" data-table="distrito_reniec" data-field="x_cod_distrito" name="x_cod_distrito" id="x_cod_distrito" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($distrito_reniec_edit->cod_distrito->getPlaceHolder()) ?>" value="<?php echo $distrito_reniec_edit->cod_distrito->EditValue ?>"<?php echo $distrito_reniec_edit->cod_distrito->editAttributes() ?>>
<input type="hidden" data-table="distrito_reniec" data-field="x_cod_distrito" name="o_cod_distrito" id="o_cod_distrito" value="<?php echo HtmlEncode($distrito_reniec_edit->cod_distrito->OldValue != null ? $distrito_reniec_edit->cod_distrito->OldValue : $distrito_reniec_edit->cod_distrito->CurrentValue) ?>">
<?php echo $distrito_reniec_edit->cod_distrito->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($distrito_reniec_edit->nombre_distrito->Visible) { // nombre_distrito ?>
	<div id="r_nombre_distrito" class="form-group row">
		<label id="elh_distrito_reniec_nombre_distrito" for="x_nombre_distrito" class="<?php echo $distrito_reniec_edit->LeftColumnClass ?>"><?php echo $distrito_reniec_edit->nombre_distrito->caption() ?><?php echo $distrito_reniec_edit->nombre_distrito->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $distrito_reniec_edit->RightColumnClass ?>"><div <?php echo $distrito_reniec_edit->nombre_distrito->cellAttributes() ?>>
<span id="el_distrito_reniec_nombre_distrito">
<input type="text" data-table="distrito_reniec" data-field="x_nombre_distrito" name="x_nombre_distrito" id="x_nombre_distrito" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($distrito_reniec_edit->nombre_distrito->getPlaceHolder()) ?>" value="<?php echo $distrito_reniec_edit->nombre_distrito->EditValue ?>"<?php echo $distrito_reniec_edit->nombre_distrito->editAttributes() ?>>
</span>
<?php echo $distrito_reniec_edit->nombre_distrito->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$distrito_reniec_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $distrito_reniec_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $distrito_reniec_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$distrito_reniec_edit->showPageFooter();
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
$distrito_reniec_edit->terminate();
?>