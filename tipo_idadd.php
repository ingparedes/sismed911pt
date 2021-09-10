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
$tipo_id_add = new tipo_id_add();

// Run the page
$tipo_id_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_id_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftipo_idadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ftipo_idadd = currentForm = new ew.Form("ftipo_idadd", "add");

	// Validate form
	ftipo_idadd.validate = function() {
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
			<?php if ($tipo_id_add->descripcion->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_id_add->descripcion->caption(), $tipo_id_add->descripcion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_id_add->descripcion_en->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_id_add->descripcion_en->caption(), $tipo_id_add->descripcion_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_id_add->descripcion_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_id_add->descripcion_pr->caption(), $tipo_id_add->descripcion_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_id_add->descripcion_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_id_add->descripcion_fr->caption(), $tipo_id_add->descripcion_fr->RequiredErrorMessage)) ?>");
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
	ftipo_idadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftipo_idadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ftipo_idadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tipo_id_add->showPageHeader(); ?>
<?php
$tipo_id_add->showMessage();
?>
<form name="ftipo_idadd" id="ftipo_idadd" class="<?php echo $tipo_id_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_id">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$tipo_id_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($tipo_id_add->descripcion->Visible) { // descripcion ?>
	<div id="r_descripcion" class="form-group row">
		<label id="elh_tipo_id_descripcion" for="x_descripcion" class="<?php echo $tipo_id_add->LeftColumnClass ?>"><?php echo $tipo_id_add->descripcion->caption() ?><?php echo $tipo_id_add->descripcion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_id_add->RightColumnClass ?>"><div <?php echo $tipo_id_add->descripcion->cellAttributes() ?>>
<span id="el_tipo_id_descripcion">
<input type="text" data-table="tipo_id" data-field="x_descripcion" name="x_descripcion" id="x_descripcion" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_id_add->descripcion->getPlaceHolder()) ?>" value="<?php echo $tipo_id_add->descripcion->EditValue ?>"<?php echo $tipo_id_add->descripcion->editAttributes() ?>>
</span>
<?php echo $tipo_id_add->descripcion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_id_add->descripcion_en->Visible) { // descripcion_en ?>
	<div id="r_descripcion_en" class="form-group row">
		<label id="elh_tipo_id_descripcion_en" for="x_descripcion_en" class="<?php echo $tipo_id_add->LeftColumnClass ?>"><?php echo $tipo_id_add->descripcion_en->caption() ?><?php echo $tipo_id_add->descripcion_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_id_add->RightColumnClass ?>"><div <?php echo $tipo_id_add->descripcion_en->cellAttributes() ?>>
<span id="el_tipo_id_descripcion_en">
<input type="text" data-table="tipo_id" data-field="x_descripcion_en" name="x_descripcion_en" id="x_descripcion_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_id_add->descripcion_en->getPlaceHolder()) ?>" value="<?php echo $tipo_id_add->descripcion_en->EditValue ?>"<?php echo $tipo_id_add->descripcion_en->editAttributes() ?>>
</span>
<?php echo $tipo_id_add->descripcion_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_id_add->descripcion_pr->Visible) { // descripcion_pr ?>
	<div id="r_descripcion_pr" class="form-group row">
		<label id="elh_tipo_id_descripcion_pr" for="x_descripcion_pr" class="<?php echo $tipo_id_add->LeftColumnClass ?>"><?php echo $tipo_id_add->descripcion_pr->caption() ?><?php echo $tipo_id_add->descripcion_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_id_add->RightColumnClass ?>"><div <?php echo $tipo_id_add->descripcion_pr->cellAttributes() ?>>
<span id="el_tipo_id_descripcion_pr">
<input type="text" data-table="tipo_id" data-field="x_descripcion_pr" name="x_descripcion_pr" id="x_descripcion_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_id_add->descripcion_pr->getPlaceHolder()) ?>" value="<?php echo $tipo_id_add->descripcion_pr->EditValue ?>"<?php echo $tipo_id_add->descripcion_pr->editAttributes() ?>>
</span>
<?php echo $tipo_id_add->descripcion_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_id_add->descripcion_fr->Visible) { // descripcion_fr ?>
	<div id="r_descripcion_fr" class="form-group row">
		<label id="elh_tipo_id_descripcion_fr" for="x_descripcion_fr" class="<?php echo $tipo_id_add->LeftColumnClass ?>"><?php echo $tipo_id_add->descripcion_fr->caption() ?><?php echo $tipo_id_add->descripcion_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_id_add->RightColumnClass ?>"><div <?php echo $tipo_id_add->descripcion_fr->cellAttributes() ?>>
<span id="el_tipo_id_descripcion_fr">
<input type="text" data-table="tipo_id" data-field="x_descripcion_fr" name="x_descripcion_fr" id="x_descripcion_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_id_add->descripcion_fr->getPlaceHolder()) ?>" value="<?php echo $tipo_id_add->descripcion_fr->EditValue ?>"<?php echo $tipo_id_add->descripcion_fr->editAttributes() ?>>
</span>
<?php echo $tipo_id_add->descripcion_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tipo_id_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tipo_id_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tipo_id_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tipo_id_add->showPageFooter();
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
$tipo_id_add->terminate();
?>