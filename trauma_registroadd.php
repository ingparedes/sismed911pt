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
$trauma_registro_add = new trauma_registro_add();

// Run the page
$trauma_registro_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$trauma_registro_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftrauma_registroadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ftrauma_registroadd = currentForm = new ew.Form("ftrauma_registroadd", "add");

	// Validate form
	ftrauma_registroadd.validate = function() {
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
			<?php if ($trauma_registro_add->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $trauma_registro_add->cod_casopreh->caption(), $trauma_registro_add->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($trauma_registro_add->cod_casopreh->errorMessage()) ?>");
			<?php if ($trauma_registro_add->causa_trauma_registro->Required) { ?>
				elm = this.getElements("x" + infix + "_causa_trauma_registro");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $trauma_registro_add->causa_trauma_registro->caption(), $trauma_registro_add->causa_trauma_registro->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_causa_trauma_registro");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($trauma_registro_add->causa_trauma_registro->errorMessage()) ?>");

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
	ftrauma_registroadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftrauma_registroadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ftrauma_registroadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $trauma_registro_add->showPageHeader(); ?>
<?php
$trauma_registro_add->showMessage();
?>
<form name="ftrauma_registroadd" id="ftrauma_registroadd" class="<?php echo $trauma_registro_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="trauma_registro">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$trauma_registro_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($trauma_registro_add->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_trauma_registro_cod_casopreh" for="x_cod_casopreh" class="<?php echo $trauma_registro_add->LeftColumnClass ?>"><?php echo $trauma_registro_add->cod_casopreh->caption() ?><?php echo $trauma_registro_add->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $trauma_registro_add->RightColumnClass ?>"><div <?php echo $trauma_registro_add->cod_casopreh->cellAttributes() ?>>
<span id="el_trauma_registro_cod_casopreh">
<input type="text" data-table="trauma_registro" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($trauma_registro_add->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $trauma_registro_add->cod_casopreh->EditValue ?>"<?php echo $trauma_registro_add->cod_casopreh->editAttributes() ?>>
</span>
<?php echo $trauma_registro_add->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($trauma_registro_add->causa_trauma_registro->Visible) { // causa_trauma_registro ?>
	<div id="r_causa_trauma_registro" class="form-group row">
		<label id="elh_trauma_registro_causa_trauma_registro" for="x_causa_trauma_registro" class="<?php echo $trauma_registro_add->LeftColumnClass ?>"><?php echo $trauma_registro_add->causa_trauma_registro->caption() ?><?php echo $trauma_registro_add->causa_trauma_registro->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $trauma_registro_add->RightColumnClass ?>"><div <?php echo $trauma_registro_add->causa_trauma_registro->cellAttributes() ?>>
<span id="el_trauma_registro_causa_trauma_registro">
<input type="text" data-table="trauma_registro" data-field="x_causa_trauma_registro" name="x_causa_trauma_registro" id="x_causa_trauma_registro" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($trauma_registro_add->causa_trauma_registro->getPlaceHolder()) ?>" value="<?php echo $trauma_registro_add->causa_trauma_registro->EditValue ?>"<?php echo $trauma_registro_add->causa_trauma_registro->editAttributes() ?>>
</span>
<?php echo $trauma_registro_add->causa_trauma_registro->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$trauma_registro_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $trauma_registro_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $trauma_registro_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$trauma_registro_add->showPageFooter();
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
$trauma_registro_add->terminate();
?>