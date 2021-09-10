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
$base_ambulancia_addopt = new base_ambulancia_addopt();

// Run the page
$base_ambulancia_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$base_ambulancia_addopt->Page_Render();
?>
<script>
var fbase_ambulanciaaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fbase_ambulanciaaddopt = currentForm = new ew.Form("fbase_ambulanciaaddopt", "addopt");

	// Validate form
	fbase_ambulanciaaddopt.validate = function() {
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
			<?php if ($base_ambulancia_addopt->nombre->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_addopt->nombre->caption(), $base_ambulancia_addopt->nombre->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($base_ambulancia_addopt->dpto->Required) { ?>
				elm = this.getElements("x" + infix + "_dpto");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_addopt->dpto->caption(), $base_ambulancia_addopt->dpto->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($base_ambulancia_addopt->provincia->Required) { ?>
				elm = this.getElements("x" + infix + "_provincia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_addopt->provincia->caption(), $base_ambulancia_addopt->provincia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($base_ambulancia_addopt->distrito->Required) { ?>
				elm = this.getElements("x" + infix + "_distrito");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_addopt->distrito->caption(), $base_ambulancia_addopt->distrito->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fbase_ambulanciaaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbase_ambulanciaaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbase_ambulanciaaddopt.lists["x_dpto"] = <?php echo $base_ambulancia_addopt->dpto->Lookup->toClientList($base_ambulancia_addopt) ?>;
	fbase_ambulanciaaddopt.lists["x_dpto"].options = <?php echo JsonEncode($base_ambulancia_addopt->dpto->lookupOptions()) ?>;
	fbase_ambulanciaaddopt.lists["x_provincia"] = <?php echo $base_ambulancia_addopt->provincia->Lookup->toClientList($base_ambulancia_addopt) ?>;
	fbase_ambulanciaaddopt.lists["x_provincia"].options = <?php echo JsonEncode($base_ambulancia_addopt->provincia->lookupOptions()) ?>;
	fbase_ambulanciaaddopt.lists["x_distrito"] = <?php echo $base_ambulancia_addopt->distrito->Lookup->toClientList($base_ambulancia_addopt) ?>;
	fbase_ambulanciaaddopt.lists["x_distrito"].options = <?php echo JsonEncode($base_ambulancia_addopt->distrito->lookupOptions()) ?>;
	loadjs.done("fbase_ambulanciaaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $base_ambulancia_addopt->showPageHeader(); ?>
<?php
$base_ambulancia_addopt->showMessage();
?>
<form name="fbase_ambulanciaaddopt" id="fbase_ambulanciaaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $base_ambulancia_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($base_ambulancia_addopt->nombre->Visible) { // nombre ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre"><?php echo $base_ambulancia_addopt->nombre->caption() ?><?php echo $base_ambulancia_addopt->nombre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="base_ambulancia" data-field="x_nombre" name="x_nombre" id="x_nombre" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($base_ambulancia_addopt->nombre->getPlaceHolder()) ?>" value="<?php echo $base_ambulancia_addopt->nombre->EditValue ?>"<?php echo $base_ambulancia_addopt->nombre->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($base_ambulancia_addopt->dpto->Visible) { // dpto ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_dpto"><?php echo $base_ambulancia_addopt->dpto->caption() ?><?php echo $base_ambulancia_addopt->dpto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $base_ambulancia_addopt->dpto->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="base_ambulancia" data-field="x_dpto" data-value-separator="<?php echo $base_ambulancia_addopt->dpto->displayValueSeparatorAttribute() ?>" id="x_dpto" name="x_dpto"<?php echo $base_ambulancia_addopt->dpto->editAttributes() ?>>
			<?php echo $base_ambulancia_addopt->dpto->selectOptionListHtml("x_dpto") ?>
		</select>
</div>
<?php echo $base_ambulancia_addopt->dpto->Lookup->getParamTag($base_ambulancia_addopt, "p_x_dpto") ?>
</div>
	</div>
<?php } ?>
<?php if ($base_ambulancia_addopt->provincia->Visible) { // provincia ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_provincia"><?php echo $base_ambulancia_addopt->provincia->caption() ?><?php echo $base_ambulancia_addopt->provincia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $base_ambulancia_addopt->provincia->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="base_ambulancia" data-field="x_provincia" data-value-separator="<?php echo $base_ambulancia_addopt->provincia->displayValueSeparatorAttribute() ?>" id="x_provincia" name="x_provincia"<?php echo $base_ambulancia_addopt->provincia->editAttributes() ?>>
			<?php echo $base_ambulancia_addopt->provincia->selectOptionListHtml("x_provincia") ?>
		</select>
</div>
<?php echo $base_ambulancia_addopt->provincia->Lookup->getParamTag($base_ambulancia_addopt, "p_x_provincia") ?>
</div>
	</div>
<?php } ?>
<?php if ($base_ambulancia_addopt->distrito->Visible) { // distrito ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_distrito"><?php echo $base_ambulancia_addopt->distrito->caption() ?><?php echo $base_ambulancia_addopt->distrito->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="base_ambulancia" data-field="x_distrito" data-value-separator="<?php echo $base_ambulancia_addopt->distrito->displayValueSeparatorAttribute() ?>" id="x_distrito" name="x_distrito"<?php echo $base_ambulancia_addopt->distrito->editAttributes() ?>>
			<?php echo $base_ambulancia_addopt->distrito->selectOptionListHtml("x_distrito") ?>
		</select>
</div>
<?php echo $base_ambulancia_addopt->distrito->Lookup->getParamTag($base_ambulancia_addopt, "p_x_distrito") ?>
</div>
	</div>
<?php } ?>
</form>
<?php
$base_ambulancia_addopt->showPageFooter();
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
<?php
$base_ambulancia_addopt->terminate();
?>