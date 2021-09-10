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
$webservices_add = new webservices_add();

// Run the page
$webservices_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$webservices_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fwebservicesadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fwebservicesadd = currentForm = new ew.Form("fwebservicesadd", "add");

	// Validate form
	fwebservicesadd.validate = function() {
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
			<?php if ($webservices_add->caller->Required) { ?>
				elm = this.getElements("x" + infix + "_caller");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $webservices_add->caller->caption(), $webservices_add->caller->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($webservices_add->idpersonas->Required) { ?>
				elm = this.getElements("x" + infix + "_idpersonas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $webservices_add->idpersonas->caption(), $webservices_add->idpersonas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($webservices_add->disponiblecamas->Required) { ?>
				elm = this.getElements("x" + infix + "_disponiblecamas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $webservices_add->disponiblecamas->caption(), $webservices_add->disponiblecamas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($webservices_add->afiliados->Required) { ?>
				elm = this.getElements("x" + infix + "_afiliados");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $webservices_add->afiliados->caption(), $webservices_add->afiliados->RequiredErrorMessage)) ?>");
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
	fwebservicesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fwebservicesadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fwebservicesadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $webservices_add->showPageHeader(); ?>
<?php
$webservices_add->showMessage();
?>
<form name="fwebservicesadd" id="fwebservicesadd" class="<?php echo $webservices_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="webservices">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$webservices_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($webservices_add->caller->Visible) { // caller ?>
	<div id="r_caller" class="form-group row">
		<label id="elh_webservices_caller" for="x_caller" class="<?php echo $webservices_add->LeftColumnClass ?>"><?php echo $webservices_add->caller->caption() ?><?php echo $webservices_add->caller->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $webservices_add->RightColumnClass ?>"><div <?php echo $webservices_add->caller->cellAttributes() ?>>
<span id="el_webservices_caller">
<input type="text" data-table="webservices" data-field="x_caller" name="x_caller" id="x_caller" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($webservices_add->caller->getPlaceHolder()) ?>" value="<?php echo $webservices_add->caller->EditValue ?>"<?php echo $webservices_add->caller->editAttributes() ?>>
</span>
<?php echo $webservices_add->caller->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($webservices_add->idpersonas->Visible) { // idpersonas ?>
	<div id="r_idpersonas" class="form-group row">
		<label id="elh_webservices_idpersonas" for="x_idpersonas" class="<?php echo $webservices_add->LeftColumnClass ?>"><?php echo $webservices_add->idpersonas->caption() ?><?php echo $webservices_add->idpersonas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $webservices_add->RightColumnClass ?>"><div <?php echo $webservices_add->idpersonas->cellAttributes() ?>>
<span id="el_webservices_idpersonas">
<input type="text" data-table="webservices" data-field="x_idpersonas" name="x_idpersonas" id="x_idpersonas" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($webservices_add->idpersonas->getPlaceHolder()) ?>" value="<?php echo $webservices_add->idpersonas->EditValue ?>"<?php echo $webservices_add->idpersonas->editAttributes() ?>>
</span>
<?php echo $webservices_add->idpersonas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($webservices_add->disponiblecamas->Visible) { // disponiblecamas ?>
	<div id="r_disponiblecamas" class="form-group row">
		<label id="elh_webservices_disponiblecamas" for="x_disponiblecamas" class="<?php echo $webservices_add->LeftColumnClass ?>"><?php echo $webservices_add->disponiblecamas->caption() ?><?php echo $webservices_add->disponiblecamas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $webservices_add->RightColumnClass ?>"><div <?php echo $webservices_add->disponiblecamas->cellAttributes() ?>>
<span id="el_webservices_disponiblecamas">
<input type="text" data-table="webservices" data-field="x_disponiblecamas" name="x_disponiblecamas" id="x_disponiblecamas" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($webservices_add->disponiblecamas->getPlaceHolder()) ?>" value="<?php echo $webservices_add->disponiblecamas->EditValue ?>"<?php echo $webservices_add->disponiblecamas->editAttributes() ?>>
</span>
<?php echo $webservices_add->disponiblecamas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($webservices_add->afiliados->Visible) { // afiliados ?>
	<div id="r_afiliados" class="form-group row">
		<label id="elh_webservices_afiliados" for="x_afiliados" class="<?php echo $webservices_add->LeftColumnClass ?>"><?php echo $webservices_add->afiliados->caption() ?><?php echo $webservices_add->afiliados->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $webservices_add->RightColumnClass ?>"><div <?php echo $webservices_add->afiliados->cellAttributes() ?>>
<span id="el_webservices_afiliados">
<input type="text" data-table="webservices" data-field="x_afiliados" name="x_afiliados" id="x_afiliados" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($webservices_add->afiliados->getPlaceHolder()) ?>" value="<?php echo $webservices_add->afiliados->EditValue ?>"<?php echo $webservices_add->afiliados->editAttributes() ?>>
</span>
<?php echo $webservices_add->afiliados->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$webservices_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $webservices_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $webservices_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$webservices_add->showPageFooter();
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
$webservices_add->terminate();
?>