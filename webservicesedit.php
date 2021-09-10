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
$webservices_edit = new webservices_edit();

// Run the page
$webservices_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$webservices_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fwebservicesedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fwebservicesedit = currentForm = new ew.Form("fwebservicesedit", "edit");

	// Validate form
	fwebservicesedit.validate = function() {
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
			<?php if ($webservices_edit->id_parametros->Required) { ?>
				elm = this.getElements("x" + infix + "_id_parametros");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $webservices_edit->id_parametros->caption(), $webservices_edit->id_parametros->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($webservices_edit->caller->Required) { ?>
				elm = this.getElements("x" + infix + "_caller");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $webservices_edit->caller->caption(), $webservices_edit->caller->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($webservices_edit->idpersonas->Required) { ?>
				elm = this.getElements("x" + infix + "_idpersonas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $webservices_edit->idpersonas->caption(), $webservices_edit->idpersonas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($webservices_edit->disponiblecamas->Required) { ?>
				elm = this.getElements("x" + infix + "_disponiblecamas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $webservices_edit->disponiblecamas->caption(), $webservices_edit->disponiblecamas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($webservices_edit->afiliados->Required) { ?>
				elm = this.getElements("x" + infix + "_afiliados");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $webservices_edit->afiliados->caption(), $webservices_edit->afiliados->RequiredErrorMessage)) ?>");
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
	fwebservicesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fwebservicesedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fwebservicesedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $webservices_edit->showPageHeader(); ?>
<?php
$webservices_edit->showMessage();
?>
<form name="fwebservicesedit" id="fwebservicesedit" class="<?php echo $webservices_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="webservices">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$webservices_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($webservices_edit->id_parametros->Visible) { // id_parametros ?>
	<div id="r_id_parametros" class="form-group row">
		<label id="elh_webservices_id_parametros" class="<?php echo $webservices_edit->LeftColumnClass ?>"><?php echo $webservices_edit->id_parametros->caption() ?><?php echo $webservices_edit->id_parametros->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $webservices_edit->RightColumnClass ?>"><div <?php echo $webservices_edit->id_parametros->cellAttributes() ?>>
<span id="el_webservices_id_parametros">
<span<?php echo $webservices_edit->id_parametros->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($webservices_edit->id_parametros->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="webservices" data-field="x_id_parametros" name="x_id_parametros" id="x_id_parametros" value="<?php echo HtmlEncode($webservices_edit->id_parametros->CurrentValue) ?>">
<?php echo $webservices_edit->id_parametros->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($webservices_edit->caller->Visible) { // caller ?>
	<div id="r_caller" class="form-group row">
		<label id="elh_webservices_caller" for="x_caller" class="<?php echo $webservices_edit->LeftColumnClass ?>"><?php echo $webservices_edit->caller->caption() ?><?php echo $webservices_edit->caller->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $webservices_edit->RightColumnClass ?>"><div <?php echo $webservices_edit->caller->cellAttributes() ?>>
<span id="el_webservices_caller">
<input type="text" data-table="webservices" data-field="x_caller" name="x_caller" id="x_caller" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($webservices_edit->caller->getPlaceHolder()) ?>" value="<?php echo $webservices_edit->caller->EditValue ?>"<?php echo $webservices_edit->caller->editAttributes() ?>>
</span>
<?php echo $webservices_edit->caller->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($webservices_edit->idpersonas->Visible) { // idpersonas ?>
	<div id="r_idpersonas" class="form-group row">
		<label id="elh_webservices_idpersonas" for="x_idpersonas" class="<?php echo $webservices_edit->LeftColumnClass ?>"><?php echo $webservices_edit->idpersonas->caption() ?><?php echo $webservices_edit->idpersonas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $webservices_edit->RightColumnClass ?>"><div <?php echo $webservices_edit->idpersonas->cellAttributes() ?>>
<span id="el_webservices_idpersonas">
<input type="text" data-table="webservices" data-field="x_idpersonas" name="x_idpersonas" id="x_idpersonas" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($webservices_edit->idpersonas->getPlaceHolder()) ?>" value="<?php echo $webservices_edit->idpersonas->EditValue ?>"<?php echo $webservices_edit->idpersonas->editAttributes() ?>>
</span>
<?php echo $webservices_edit->idpersonas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($webservices_edit->disponiblecamas->Visible) { // disponiblecamas ?>
	<div id="r_disponiblecamas" class="form-group row">
		<label id="elh_webservices_disponiblecamas" for="x_disponiblecamas" class="<?php echo $webservices_edit->LeftColumnClass ?>"><?php echo $webservices_edit->disponiblecamas->caption() ?><?php echo $webservices_edit->disponiblecamas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $webservices_edit->RightColumnClass ?>"><div <?php echo $webservices_edit->disponiblecamas->cellAttributes() ?>>
<span id="el_webservices_disponiblecamas">
<input type="text" data-table="webservices" data-field="x_disponiblecamas" name="x_disponiblecamas" id="x_disponiblecamas" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($webservices_edit->disponiblecamas->getPlaceHolder()) ?>" value="<?php echo $webservices_edit->disponiblecamas->EditValue ?>"<?php echo $webservices_edit->disponiblecamas->editAttributes() ?>>
</span>
<?php echo $webservices_edit->disponiblecamas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($webservices_edit->afiliados->Visible) { // afiliados ?>
	<div id="r_afiliados" class="form-group row">
		<label id="elh_webservices_afiliados" for="x_afiliados" class="<?php echo $webservices_edit->LeftColumnClass ?>"><?php echo $webservices_edit->afiliados->caption() ?><?php echo $webservices_edit->afiliados->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $webservices_edit->RightColumnClass ?>"><div <?php echo $webservices_edit->afiliados->cellAttributes() ?>>
<span id="el_webservices_afiliados">
<input type="text" data-table="webservices" data-field="x_afiliados" name="x_afiliados" id="x_afiliados" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($webservices_edit->afiliados->getPlaceHolder()) ?>" value="<?php echo $webservices_edit->afiliados->EditValue ?>"<?php echo $webservices_edit->afiliados->editAttributes() ?>>
</span>
<?php echo $webservices_edit->afiliados->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$webservices_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $webservices_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $webservices_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$webservices_edit->showPageFooter();
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
$webservices_edit->terminate();
?>