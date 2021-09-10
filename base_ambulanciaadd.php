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
$base_ambulancia_add = new base_ambulancia_add();

// Run the page
$base_ambulancia_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$base_ambulancia_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbase_ambulanciaadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbase_ambulanciaadd = currentForm = new ew.Form("fbase_ambulanciaadd", "add");

	// Validate form
	fbase_ambulanciaadd.validate = function() {
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
			<?php if ($base_ambulancia_add->nombre->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_add->nombre->caption(), $base_ambulancia_add->nombre->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($base_ambulancia_add->dpto->Required) { ?>
				elm = this.getElements("x" + infix + "_dpto");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_add->dpto->caption(), $base_ambulancia_add->dpto->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($base_ambulancia_add->provincia->Required) { ?>
				elm = this.getElements("x" + infix + "_provincia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_add->provincia->caption(), $base_ambulancia_add->provincia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($base_ambulancia_add->distrito->Required) { ?>
				elm = this.getElements("x" + infix + "_distrito");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_add->distrito->caption(), $base_ambulancia_add->distrito->RequiredErrorMessage)) ?>");
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
	fbase_ambulanciaadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbase_ambulanciaadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbase_ambulanciaadd.lists["x_dpto"] = <?php echo $base_ambulancia_add->dpto->Lookup->toClientList($base_ambulancia_add) ?>;
	fbase_ambulanciaadd.lists["x_dpto"].options = <?php echo JsonEncode($base_ambulancia_add->dpto->lookupOptions()) ?>;
	fbase_ambulanciaadd.lists["x_provincia"] = <?php echo $base_ambulancia_add->provincia->Lookup->toClientList($base_ambulancia_add) ?>;
	fbase_ambulanciaadd.lists["x_provincia"].options = <?php echo JsonEncode($base_ambulancia_add->provincia->lookupOptions()) ?>;
	fbase_ambulanciaadd.lists["x_distrito"] = <?php echo $base_ambulancia_add->distrito->Lookup->toClientList($base_ambulancia_add) ?>;
	fbase_ambulanciaadd.lists["x_distrito"].options = <?php echo JsonEncode($base_ambulancia_add->distrito->lookupOptions()) ?>;
	loadjs.done("fbase_ambulanciaadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $base_ambulancia_add->showPageHeader(); ?>
<?php
$base_ambulancia_add->showMessage();
?>
<form name="fbase_ambulanciaadd" id="fbase_ambulanciaadd" class="<?php echo $base_ambulancia_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="base_ambulancia">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$base_ambulancia_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($base_ambulancia_add->nombre->Visible) { // nombre ?>
	<div id="r_nombre" class="form-group row">
		<label id="elh_base_ambulancia_nombre" for="x_nombre" class="<?php echo $base_ambulancia_add->LeftColumnClass ?>"><?php echo $base_ambulancia_add->nombre->caption() ?><?php echo $base_ambulancia_add->nombre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $base_ambulancia_add->RightColumnClass ?>"><div <?php echo $base_ambulancia_add->nombre->cellAttributes() ?>>
<span id="el_base_ambulancia_nombre">
<input type="text" data-table="base_ambulancia" data-field="x_nombre" name="x_nombre" id="x_nombre" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($base_ambulancia_add->nombre->getPlaceHolder()) ?>" value="<?php echo $base_ambulancia_add->nombre->EditValue ?>"<?php echo $base_ambulancia_add->nombre->editAttributes() ?>>
</span>
<?php echo $base_ambulancia_add->nombre->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($base_ambulancia_add->dpto->Visible) { // dpto ?>
	<div id="r_dpto" class="form-group row">
		<label id="elh_base_ambulancia_dpto" for="x_dpto" class="<?php echo $base_ambulancia_add->LeftColumnClass ?>"><?php echo $base_ambulancia_add->dpto->caption() ?><?php echo $base_ambulancia_add->dpto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $base_ambulancia_add->RightColumnClass ?>"><div <?php echo $base_ambulancia_add->dpto->cellAttributes() ?>>
<span id="el_base_ambulancia_dpto">
<?php $base_ambulancia_add->dpto->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="base_ambulancia" data-field="x_dpto" data-value-separator="<?php echo $base_ambulancia_add->dpto->displayValueSeparatorAttribute() ?>" id="x_dpto" name="x_dpto"<?php echo $base_ambulancia_add->dpto->editAttributes() ?>>
			<?php echo $base_ambulancia_add->dpto->selectOptionListHtml("x_dpto") ?>
		</select>
</div>
<?php echo $base_ambulancia_add->dpto->Lookup->getParamTag($base_ambulancia_add, "p_x_dpto") ?>
</span>
<?php echo $base_ambulancia_add->dpto->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($base_ambulancia_add->provincia->Visible) { // provincia ?>
	<div id="r_provincia" class="form-group row">
		<label id="elh_base_ambulancia_provincia" for="x_provincia" class="<?php echo $base_ambulancia_add->LeftColumnClass ?>"><?php echo $base_ambulancia_add->provincia->caption() ?><?php echo $base_ambulancia_add->provincia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $base_ambulancia_add->RightColumnClass ?>"><div <?php echo $base_ambulancia_add->provincia->cellAttributes() ?>>
<span id="el_base_ambulancia_provincia">
<?php $base_ambulancia_add->provincia->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="base_ambulancia" data-field="x_provincia" data-value-separator="<?php echo $base_ambulancia_add->provincia->displayValueSeparatorAttribute() ?>" id="x_provincia" name="x_provincia"<?php echo $base_ambulancia_add->provincia->editAttributes() ?>>
			<?php echo $base_ambulancia_add->provincia->selectOptionListHtml("x_provincia") ?>
		</select>
</div>
<?php echo $base_ambulancia_add->provincia->Lookup->getParamTag($base_ambulancia_add, "p_x_provincia") ?>
</span>
<?php echo $base_ambulancia_add->provincia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($base_ambulancia_add->distrito->Visible) { // distrito ?>
	<div id="r_distrito" class="form-group row">
		<label id="elh_base_ambulancia_distrito" for="x_distrito" class="<?php echo $base_ambulancia_add->LeftColumnClass ?>"><?php echo $base_ambulancia_add->distrito->caption() ?><?php echo $base_ambulancia_add->distrito->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $base_ambulancia_add->RightColumnClass ?>"><div <?php echo $base_ambulancia_add->distrito->cellAttributes() ?>>
<span id="el_base_ambulancia_distrito">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="base_ambulancia" data-field="x_distrito" data-value-separator="<?php echo $base_ambulancia_add->distrito->displayValueSeparatorAttribute() ?>" id="x_distrito" name="x_distrito"<?php echo $base_ambulancia_add->distrito->editAttributes() ?>>
			<?php echo $base_ambulancia_add->distrito->selectOptionListHtml("x_distrito") ?>
		</select>
</div>
<?php echo $base_ambulancia_add->distrito->Lookup->getParamTag($base_ambulancia_add, "p_x_distrito") ?>
</span>
<?php echo $base_ambulancia_add->distrito->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$base_ambulancia_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $base_ambulancia_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $base_ambulancia_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$base_ambulancia_add->showPageFooter();
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
$base_ambulancia_add->terminate();
?>