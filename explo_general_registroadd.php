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
$explo_general_registro_add = new explo_general_registro_add();

// Run the page
$explo_general_registro_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_general_registro_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fexplo_general_registroadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fexplo_general_registroadd = currentForm = new ew.Form("fexplo_general_registroadd", "add");

	// Validate form
	fexplo_general_registroadd.validate = function() {
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
			<?php if ($explo_general_registro_add->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_general_registro_add->cod_casopreh->caption(), $explo_general_registro_add->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($explo_general_registro_add->cod_casopreh->errorMessage()) ?>");
			<?php if ($explo_general_registro_add->explo_general_afeccion->Required) { ?>
				elm = this.getElements("x" + infix + "_explo_general_afeccion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_general_registro_add->explo_general_afeccion->caption(), $explo_general_registro_add->explo_general_afeccion->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_explo_general_afeccion");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($explo_general_registro_add->explo_general_afeccion->errorMessage()) ?>");

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
	fexplo_general_registroadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fexplo_general_registroadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fexplo_general_registroadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $explo_general_registro_add->showPageHeader(); ?>
<?php
$explo_general_registro_add->showMessage();
?>
<form name="fexplo_general_registroadd" id="fexplo_general_registroadd" class="<?php echo $explo_general_registro_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_general_registro">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$explo_general_registro_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($explo_general_registro_add->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_explo_general_registro_cod_casopreh" for="x_cod_casopreh" class="<?php echo $explo_general_registro_add->LeftColumnClass ?>"><?php echo $explo_general_registro_add->cod_casopreh->caption() ?><?php echo $explo_general_registro_add->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_general_registro_add->RightColumnClass ?>"><div <?php echo $explo_general_registro_add->cod_casopreh->cellAttributes() ?>>
<span id="el_explo_general_registro_cod_casopreh">
<input type="text" data-table="explo_general_registro" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($explo_general_registro_add->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $explo_general_registro_add->cod_casopreh->EditValue ?>"<?php echo $explo_general_registro_add->cod_casopreh->editAttributes() ?>>
</span>
<?php echo $explo_general_registro_add->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($explo_general_registro_add->explo_general_afeccion->Visible) { // explo_general_afeccion ?>
	<div id="r_explo_general_afeccion" class="form-group row">
		<label id="elh_explo_general_registro_explo_general_afeccion" for="x_explo_general_afeccion" class="<?php echo $explo_general_registro_add->LeftColumnClass ?>"><?php echo $explo_general_registro_add->explo_general_afeccion->caption() ?><?php echo $explo_general_registro_add->explo_general_afeccion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_general_registro_add->RightColumnClass ?>"><div <?php echo $explo_general_registro_add->explo_general_afeccion->cellAttributes() ?>>
<span id="el_explo_general_registro_explo_general_afeccion">
<input type="text" data-table="explo_general_registro" data-field="x_explo_general_afeccion" name="x_explo_general_afeccion" id="x_explo_general_afeccion" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($explo_general_registro_add->explo_general_afeccion->getPlaceHolder()) ?>" value="<?php echo $explo_general_registro_add->explo_general_afeccion->EditValue ?>"<?php echo $explo_general_registro_add->explo_general_afeccion->editAttributes() ?>>
</span>
<?php echo $explo_general_registro_add->explo_general_afeccion->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$explo_general_registro_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $explo_general_registro_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $explo_general_registro_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$explo_general_registro_add->showPageFooter();
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
$explo_general_registro_add->terminate();
?>