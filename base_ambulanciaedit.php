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
$base_ambulancia_edit = new base_ambulancia_edit();

// Run the page
$base_ambulancia_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$base_ambulancia_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbase_ambulanciaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbase_ambulanciaedit = currentForm = new ew.Form("fbase_ambulanciaedit", "edit");

	// Validate form
	fbase_ambulanciaedit.validate = function() {
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
			<?php if ($base_ambulancia_edit->id_base->Required) { ?>
				elm = this.getElements("x" + infix + "_id_base");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_edit->id_base->caption(), $base_ambulancia_edit->id_base->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($base_ambulancia_edit->nombre->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_edit->nombre->caption(), $base_ambulancia_edit->nombre->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($base_ambulancia_edit->dpto->Required) { ?>
				elm = this.getElements("x" + infix + "_dpto");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_edit->dpto->caption(), $base_ambulancia_edit->dpto->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($base_ambulancia_edit->provincia->Required) { ?>
				elm = this.getElements("x" + infix + "_provincia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_edit->provincia->caption(), $base_ambulancia_edit->provincia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($base_ambulancia_edit->distrito->Required) { ?>
				elm = this.getElements("x" + infix + "_distrito");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $base_ambulancia_edit->distrito->caption(), $base_ambulancia_edit->distrito->RequiredErrorMessage)) ?>");
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
	fbase_ambulanciaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbase_ambulanciaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbase_ambulanciaedit.lists["x_dpto"] = <?php echo $base_ambulancia_edit->dpto->Lookup->toClientList($base_ambulancia_edit) ?>;
	fbase_ambulanciaedit.lists["x_dpto"].options = <?php echo JsonEncode($base_ambulancia_edit->dpto->lookupOptions()) ?>;
	fbase_ambulanciaedit.lists["x_provincia"] = <?php echo $base_ambulancia_edit->provincia->Lookup->toClientList($base_ambulancia_edit) ?>;
	fbase_ambulanciaedit.lists["x_provincia"].options = <?php echo JsonEncode($base_ambulancia_edit->provincia->lookupOptions()) ?>;
	fbase_ambulanciaedit.lists["x_distrito"] = <?php echo $base_ambulancia_edit->distrito->Lookup->toClientList($base_ambulancia_edit) ?>;
	fbase_ambulanciaedit.lists["x_distrito"].options = <?php echo JsonEncode($base_ambulancia_edit->distrito->lookupOptions()) ?>;
	loadjs.done("fbase_ambulanciaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $base_ambulancia_edit->showPageHeader(); ?>
<?php
$base_ambulancia_edit->showMessage();
?>
<form name="fbase_ambulanciaedit" id="fbase_ambulanciaedit" class="<?php echo $base_ambulancia_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="base_ambulancia">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$base_ambulancia_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($base_ambulancia_edit->id_base->Visible) { // id_base ?>
	<div id="r_id_base" class="form-group row">
		<label id="elh_base_ambulancia_id_base" class="<?php echo $base_ambulancia_edit->LeftColumnClass ?>"><?php echo $base_ambulancia_edit->id_base->caption() ?><?php echo $base_ambulancia_edit->id_base->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $base_ambulancia_edit->RightColumnClass ?>"><div <?php echo $base_ambulancia_edit->id_base->cellAttributes() ?>>
<span id="el_base_ambulancia_id_base">
<span<?php echo $base_ambulancia_edit->id_base->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($base_ambulancia_edit->id_base->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="base_ambulancia" data-field="x_id_base" name="x_id_base" id="x_id_base" value="<?php echo HtmlEncode($base_ambulancia_edit->id_base->CurrentValue) ?>">
<?php echo $base_ambulancia_edit->id_base->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($base_ambulancia_edit->nombre->Visible) { // nombre ?>
	<div id="r_nombre" class="form-group row">
		<label id="elh_base_ambulancia_nombre" for="x_nombre" class="<?php echo $base_ambulancia_edit->LeftColumnClass ?>"><?php echo $base_ambulancia_edit->nombre->caption() ?><?php echo $base_ambulancia_edit->nombre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $base_ambulancia_edit->RightColumnClass ?>"><div <?php echo $base_ambulancia_edit->nombre->cellAttributes() ?>>
<span id="el_base_ambulancia_nombre">
<input type="text" data-table="base_ambulancia" data-field="x_nombre" name="x_nombre" id="x_nombre" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($base_ambulancia_edit->nombre->getPlaceHolder()) ?>" value="<?php echo $base_ambulancia_edit->nombre->EditValue ?>"<?php echo $base_ambulancia_edit->nombre->editAttributes() ?>>
</span>
<?php echo $base_ambulancia_edit->nombre->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($base_ambulancia_edit->dpto->Visible) { // dpto ?>
	<div id="r_dpto" class="form-group row">
		<label id="elh_base_ambulancia_dpto" for="x_dpto" class="<?php echo $base_ambulancia_edit->LeftColumnClass ?>"><?php echo $base_ambulancia_edit->dpto->caption() ?><?php echo $base_ambulancia_edit->dpto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $base_ambulancia_edit->RightColumnClass ?>"><div <?php echo $base_ambulancia_edit->dpto->cellAttributes() ?>>
<span id="el_base_ambulancia_dpto">
<?php $base_ambulancia_edit->dpto->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="base_ambulancia" data-field="x_dpto" data-value-separator="<?php echo $base_ambulancia_edit->dpto->displayValueSeparatorAttribute() ?>" id="x_dpto" name="x_dpto"<?php echo $base_ambulancia_edit->dpto->editAttributes() ?>>
			<?php echo $base_ambulancia_edit->dpto->selectOptionListHtml("x_dpto") ?>
		</select>
</div>
<?php echo $base_ambulancia_edit->dpto->Lookup->getParamTag($base_ambulancia_edit, "p_x_dpto") ?>
</span>
<?php echo $base_ambulancia_edit->dpto->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($base_ambulancia_edit->provincia->Visible) { // provincia ?>
	<div id="r_provincia" class="form-group row">
		<label id="elh_base_ambulancia_provincia" for="x_provincia" class="<?php echo $base_ambulancia_edit->LeftColumnClass ?>"><?php echo $base_ambulancia_edit->provincia->caption() ?><?php echo $base_ambulancia_edit->provincia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $base_ambulancia_edit->RightColumnClass ?>"><div <?php echo $base_ambulancia_edit->provincia->cellAttributes() ?>>
<span id="el_base_ambulancia_provincia">
<?php $base_ambulancia_edit->provincia->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="base_ambulancia" data-field="x_provincia" data-value-separator="<?php echo $base_ambulancia_edit->provincia->displayValueSeparatorAttribute() ?>" id="x_provincia" name="x_provincia"<?php echo $base_ambulancia_edit->provincia->editAttributes() ?>>
			<?php echo $base_ambulancia_edit->provincia->selectOptionListHtml("x_provincia") ?>
		</select>
</div>
<?php echo $base_ambulancia_edit->provincia->Lookup->getParamTag($base_ambulancia_edit, "p_x_provincia") ?>
</span>
<?php echo $base_ambulancia_edit->provincia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($base_ambulancia_edit->distrito->Visible) { // distrito ?>
	<div id="r_distrito" class="form-group row">
		<label id="elh_base_ambulancia_distrito" for="x_distrito" class="<?php echo $base_ambulancia_edit->LeftColumnClass ?>"><?php echo $base_ambulancia_edit->distrito->caption() ?><?php echo $base_ambulancia_edit->distrito->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $base_ambulancia_edit->RightColumnClass ?>"><div <?php echo $base_ambulancia_edit->distrito->cellAttributes() ?>>
<span id="el_base_ambulancia_distrito">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="base_ambulancia" data-field="x_distrito" data-value-separator="<?php echo $base_ambulancia_edit->distrito->displayValueSeparatorAttribute() ?>" id="x_distrito" name="x_distrito"<?php echo $base_ambulancia_edit->distrito->editAttributes() ?>>
			<?php echo $base_ambulancia_edit->distrito->selectOptionListHtml("x_distrito") ?>
		</select>
</div>
<?php echo $base_ambulancia_edit->distrito->Lookup->getParamTag($base_ambulancia_edit, "p_x_distrito") ?>
</span>
<?php echo $base_ambulancia_edit->distrito->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$base_ambulancia_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $base_ambulancia_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $base_ambulancia_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$base_ambulancia_edit->showPageFooter();
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
$base_ambulancia_edit->terminate();
?>