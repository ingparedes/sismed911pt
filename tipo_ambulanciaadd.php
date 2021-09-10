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
$tipo_ambulancia_add = new tipo_ambulancia_add();

// Run the page
$tipo_ambulancia_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_ambulancia_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftipo_ambulanciaadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ftipo_ambulanciaadd = currentForm = new ew.Form("ftipo_ambulanciaadd", "add");

	// Validate form
	ftipo_ambulanciaadd.validate = function() {
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
			<?php if ($tipo_ambulancia_add->tipo_amb_es->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_amb_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_ambulancia_add->tipo_amb_es->caption(), $tipo_ambulancia_add->tipo_amb_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_ambulancia_add->tipo_amb_en->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_amb_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_ambulancia_add->tipo_amb_en->caption(), $tipo_ambulancia_add->tipo_amb_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_ambulancia_add->tipo_amb_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_amb_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_ambulancia_add->tipo_amb_pr->caption(), $tipo_ambulancia_add->tipo_amb_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_ambulancia_add->tipo_amb_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_amb_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_ambulancia_add->tipo_amb_fr->caption(), $tipo_ambulancia_add->tipo_amb_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_ambulancia_add->codigo->Required) { ?>
				elm = this.getElements("x" + infix + "_codigo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_ambulancia_add->codigo->caption(), $tipo_ambulancia_add->codigo->RequiredErrorMessage)) ?>");
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
	ftipo_ambulanciaadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftipo_ambulanciaadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ftipo_ambulanciaadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tipo_ambulancia_add->showPageHeader(); ?>
<?php
$tipo_ambulancia_add->showMessage();
?>
<form name="ftipo_ambulanciaadd" id="ftipo_ambulanciaadd" class="<?php echo $tipo_ambulancia_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_ambulancia">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$tipo_ambulancia_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($tipo_ambulancia_add->tipo_amb_es->Visible) { // tipo_amb_es ?>
	<div id="r_tipo_amb_es" class="form-group row">
		<label id="elh_tipo_ambulancia_tipo_amb_es" for="x_tipo_amb_es" class="<?php echo $tipo_ambulancia_add->LeftColumnClass ?>"><?php echo $tipo_ambulancia_add->tipo_amb_es->caption() ?><?php echo $tipo_ambulancia_add->tipo_amb_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_ambulancia_add->RightColumnClass ?>"><div <?php echo $tipo_ambulancia_add->tipo_amb_es->cellAttributes() ?>>
<span id="el_tipo_ambulancia_tipo_amb_es">
<input type="text" data-table="tipo_ambulancia" data-field="x_tipo_amb_es" name="x_tipo_amb_es" id="x_tipo_amb_es" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_ambulancia_add->tipo_amb_es->getPlaceHolder()) ?>" value="<?php echo $tipo_ambulancia_add->tipo_amb_es->EditValue ?>"<?php echo $tipo_ambulancia_add->tipo_amb_es->editAttributes() ?>>
</span>
<?php echo $tipo_ambulancia_add->tipo_amb_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_ambulancia_add->tipo_amb_en->Visible) { // tipo_amb_en ?>
	<div id="r_tipo_amb_en" class="form-group row">
		<label id="elh_tipo_ambulancia_tipo_amb_en" for="x_tipo_amb_en" class="<?php echo $tipo_ambulancia_add->LeftColumnClass ?>"><?php echo $tipo_ambulancia_add->tipo_amb_en->caption() ?><?php echo $tipo_ambulancia_add->tipo_amb_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_ambulancia_add->RightColumnClass ?>"><div <?php echo $tipo_ambulancia_add->tipo_amb_en->cellAttributes() ?>>
<span id="el_tipo_ambulancia_tipo_amb_en">
<input type="text" data-table="tipo_ambulancia" data-field="x_tipo_amb_en" name="x_tipo_amb_en" id="x_tipo_amb_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_ambulancia_add->tipo_amb_en->getPlaceHolder()) ?>" value="<?php echo $tipo_ambulancia_add->tipo_amb_en->EditValue ?>"<?php echo $tipo_ambulancia_add->tipo_amb_en->editAttributes() ?>>
</span>
<?php echo $tipo_ambulancia_add->tipo_amb_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_ambulancia_add->tipo_amb_pr->Visible) { // tipo_amb_pr ?>
	<div id="r_tipo_amb_pr" class="form-group row">
		<label id="elh_tipo_ambulancia_tipo_amb_pr" for="x_tipo_amb_pr" class="<?php echo $tipo_ambulancia_add->LeftColumnClass ?>"><?php echo $tipo_ambulancia_add->tipo_amb_pr->caption() ?><?php echo $tipo_ambulancia_add->tipo_amb_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_ambulancia_add->RightColumnClass ?>"><div <?php echo $tipo_ambulancia_add->tipo_amb_pr->cellAttributes() ?>>
<span id="el_tipo_ambulancia_tipo_amb_pr">
<input type="text" data-table="tipo_ambulancia" data-field="x_tipo_amb_pr" name="x_tipo_amb_pr" id="x_tipo_amb_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_ambulancia_add->tipo_amb_pr->getPlaceHolder()) ?>" value="<?php echo $tipo_ambulancia_add->tipo_amb_pr->EditValue ?>"<?php echo $tipo_ambulancia_add->tipo_amb_pr->editAttributes() ?>>
</span>
<?php echo $tipo_ambulancia_add->tipo_amb_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_ambulancia_add->tipo_amb_fr->Visible) { // tipo_amb_fr ?>
	<div id="r_tipo_amb_fr" class="form-group row">
		<label id="elh_tipo_ambulancia_tipo_amb_fr" for="x_tipo_amb_fr" class="<?php echo $tipo_ambulancia_add->LeftColumnClass ?>"><?php echo $tipo_ambulancia_add->tipo_amb_fr->caption() ?><?php echo $tipo_ambulancia_add->tipo_amb_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_ambulancia_add->RightColumnClass ?>"><div <?php echo $tipo_ambulancia_add->tipo_amb_fr->cellAttributes() ?>>
<span id="el_tipo_ambulancia_tipo_amb_fr">
<input type="text" data-table="tipo_ambulancia" data-field="x_tipo_amb_fr" name="x_tipo_amb_fr" id="x_tipo_amb_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_ambulancia_add->tipo_amb_fr->getPlaceHolder()) ?>" value="<?php echo $tipo_ambulancia_add->tipo_amb_fr->EditValue ?>"<?php echo $tipo_ambulancia_add->tipo_amb_fr->editAttributes() ?>>
</span>
<?php echo $tipo_ambulancia_add->tipo_amb_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_ambulancia_add->codigo->Visible) { // codigo ?>
	<div id="r_codigo" class="form-group row">
		<label id="elh_tipo_ambulancia_codigo" for="x_codigo" class="<?php echo $tipo_ambulancia_add->LeftColumnClass ?>"><?php echo $tipo_ambulancia_add->codigo->caption() ?><?php echo $tipo_ambulancia_add->codigo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_ambulancia_add->RightColumnClass ?>"><div <?php echo $tipo_ambulancia_add->codigo->cellAttributes() ?>>
<span id="el_tipo_ambulancia_codigo">
<input type="text" data-table="tipo_ambulancia" data-field="x_codigo" name="x_codigo" id="x_codigo" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_ambulancia_add->codigo->getPlaceHolder()) ?>" value="<?php echo $tipo_ambulancia_add->codigo->EditValue ?>"<?php echo $tipo_ambulancia_add->codigo->editAttributes() ?>>
</span>
<?php echo $tipo_ambulancia_add->codigo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tipo_ambulancia_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tipo_ambulancia_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tipo_ambulancia_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tipo_ambulancia_add->showPageFooter();
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
$tipo_ambulancia_add->terminate();
?>