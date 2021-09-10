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
$medicamentos_registros_add = new medicamentos_registros_add();

// Run the page
$medicamentos_registros_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$medicamentos_registros_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmedicamentos_registrosadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmedicamentos_registrosadd = currentForm = new ew.Form("fmedicamentos_registrosadd", "add");

	// Validate form
	fmedicamentos_registrosadd.validate = function() {
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
			<?php if ($medicamentos_registros_add->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $medicamentos_registros_add->cod_casopreh->caption(), $medicamentos_registros_add->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($medicamentos_registros_add->cod_casopreh->errorMessage()) ?>");
			<?php if ($medicamentos_registros_add->medicamentos_id->Required) { ?>
				elm = this.getElements("x" + infix + "_medicamentos_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $medicamentos_registros_add->medicamentos_id->caption(), $medicamentos_registros_add->medicamentos_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_medicamentos_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($medicamentos_registros_add->medicamentos_id->errorMessage()) ?>");
			<?php if ($medicamentos_registros_add->cantidad->Required) { ?>
				elm = this.getElements("x" + infix + "_cantidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $medicamentos_registros_add->cantidad->caption(), $medicamentos_registros_add->cantidad->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cantidad");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($medicamentos_registros_add->cantidad->errorMessage()) ?>");

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
	fmedicamentos_registrosadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmedicamentos_registrosadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmedicamentos_registrosadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $medicamentos_registros_add->showPageHeader(); ?>
<?php
$medicamentos_registros_add->showMessage();
?>
<form name="fmedicamentos_registrosadd" id="fmedicamentos_registrosadd" class="<?php echo $medicamentos_registros_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="medicamentos_registros">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$medicamentos_registros_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($medicamentos_registros_add->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_medicamentos_registros_cod_casopreh" for="x_cod_casopreh" class="<?php echo $medicamentos_registros_add->LeftColumnClass ?>"><?php echo $medicamentos_registros_add->cod_casopreh->caption() ?><?php echo $medicamentos_registros_add->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $medicamentos_registros_add->RightColumnClass ?>"><div <?php echo $medicamentos_registros_add->cod_casopreh->cellAttributes() ?>>
<span id="el_medicamentos_registros_cod_casopreh">
<input type="text" data-table="medicamentos_registros" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($medicamentos_registros_add->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $medicamentos_registros_add->cod_casopreh->EditValue ?>"<?php echo $medicamentos_registros_add->cod_casopreh->editAttributes() ?>>
</span>
<?php echo $medicamentos_registros_add->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($medicamentos_registros_add->medicamentos_id->Visible) { // medicamentos_id ?>
	<div id="r_medicamentos_id" class="form-group row">
		<label id="elh_medicamentos_registros_medicamentos_id" for="x_medicamentos_id" class="<?php echo $medicamentos_registros_add->LeftColumnClass ?>"><?php echo $medicamentos_registros_add->medicamentos_id->caption() ?><?php echo $medicamentos_registros_add->medicamentos_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $medicamentos_registros_add->RightColumnClass ?>"><div <?php echo $medicamentos_registros_add->medicamentos_id->cellAttributes() ?>>
<span id="el_medicamentos_registros_medicamentos_id">
<input type="text" data-table="medicamentos_registros" data-field="x_medicamentos_id" name="x_medicamentos_id" id="x_medicamentos_id" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($medicamentos_registros_add->medicamentos_id->getPlaceHolder()) ?>" value="<?php echo $medicamentos_registros_add->medicamentos_id->EditValue ?>"<?php echo $medicamentos_registros_add->medicamentos_id->editAttributes() ?>>
</span>
<?php echo $medicamentos_registros_add->medicamentos_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($medicamentos_registros_add->cantidad->Visible) { // cantidad ?>
	<div id="r_cantidad" class="form-group row">
		<label id="elh_medicamentos_registros_cantidad" for="x_cantidad" class="<?php echo $medicamentos_registros_add->LeftColumnClass ?>"><?php echo $medicamentos_registros_add->cantidad->caption() ?><?php echo $medicamentos_registros_add->cantidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $medicamentos_registros_add->RightColumnClass ?>"><div <?php echo $medicamentos_registros_add->cantidad->cellAttributes() ?>>
<span id="el_medicamentos_registros_cantidad">
<input type="text" data-table="medicamentos_registros" data-field="x_cantidad" name="x_cantidad" id="x_cantidad" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($medicamentos_registros_add->cantidad->getPlaceHolder()) ?>" value="<?php echo $medicamentos_registros_add->cantidad->EditValue ?>"<?php echo $medicamentos_registros_add->cantidad->editAttributes() ?>>
</span>
<?php echo $medicamentos_registros_add->cantidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$medicamentos_registros_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $medicamentos_registros_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $medicamentos_registros_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$medicamentos_registros_add->showPageFooter();
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
$medicamentos_registros_add->terminate();
?>