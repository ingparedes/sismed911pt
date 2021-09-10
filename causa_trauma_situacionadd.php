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
$causa_trauma_situacion_add = new causa_trauma_situacion_add();

// Run the page
$causa_trauma_situacion_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$causa_trauma_situacion_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcausa_trauma_situacionadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fcausa_trauma_situacionadd = currentForm = new ew.Form("fcausa_trauma_situacionadd", "add");

	// Validate form
	fcausa_trauma_situacionadd.validate = function() {
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
			<?php if ($causa_trauma_situacion_add->causa_trauma_categoria->Required) { ?>
				elm = this.getElements("x" + infix + "_causa_trauma_categoria");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $causa_trauma_situacion_add->causa_trauma_categoria->caption(), $causa_trauma_situacion_add->causa_trauma_categoria->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_causa_trauma_categoria");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($causa_trauma_situacion_add->causa_trauma_categoria->errorMessage()) ?>");
			<?php if ($causa_trauma_situacion_add->nombre->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $causa_trauma_situacion_add->nombre->caption(), $causa_trauma_situacion_add->nombre->RequiredErrorMessage)) ?>");
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
	fcausa_trauma_situacionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcausa_trauma_situacionadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fcausa_trauma_situacionadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $causa_trauma_situacion_add->showPageHeader(); ?>
<?php
$causa_trauma_situacion_add->showMessage();
?>
<form name="fcausa_trauma_situacionadd" id="fcausa_trauma_situacionadd" class="<?php echo $causa_trauma_situacion_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="causa_trauma_situacion">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$causa_trauma_situacion_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($causa_trauma_situacion_add->causa_trauma_categoria->Visible) { // causa_trauma_categoria ?>
	<div id="r_causa_trauma_categoria" class="form-group row">
		<label id="elh_causa_trauma_situacion_causa_trauma_categoria" for="x_causa_trauma_categoria" class="<?php echo $causa_trauma_situacion_add->LeftColumnClass ?>"><?php echo $causa_trauma_situacion_add->causa_trauma_categoria->caption() ?><?php echo $causa_trauma_situacion_add->causa_trauma_categoria->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $causa_trauma_situacion_add->RightColumnClass ?>"><div <?php echo $causa_trauma_situacion_add->causa_trauma_categoria->cellAttributes() ?>>
<span id="el_causa_trauma_situacion_causa_trauma_categoria">
<input type="text" data-table="causa_trauma_situacion" data-field="x_causa_trauma_categoria" name="x_causa_trauma_categoria" id="x_causa_trauma_categoria" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($causa_trauma_situacion_add->causa_trauma_categoria->getPlaceHolder()) ?>" value="<?php echo $causa_trauma_situacion_add->causa_trauma_categoria->EditValue ?>"<?php echo $causa_trauma_situacion_add->causa_trauma_categoria->editAttributes() ?>>
</span>
<?php echo $causa_trauma_situacion_add->causa_trauma_categoria->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($causa_trauma_situacion_add->nombre->Visible) { // nombre ?>
	<div id="r_nombre" class="form-group row">
		<label id="elh_causa_trauma_situacion_nombre" for="x_nombre" class="<?php echo $causa_trauma_situacion_add->LeftColumnClass ?>"><?php echo $causa_trauma_situacion_add->nombre->caption() ?><?php echo $causa_trauma_situacion_add->nombre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $causa_trauma_situacion_add->RightColumnClass ?>"><div <?php echo $causa_trauma_situacion_add->nombre->cellAttributes() ?>>
<span id="el_causa_trauma_situacion_nombre">
<input type="text" data-table="causa_trauma_situacion" data-field="x_nombre" name="x_nombre" id="x_nombre" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($causa_trauma_situacion_add->nombre->getPlaceHolder()) ?>" value="<?php echo $causa_trauma_situacion_add->nombre->EditValue ?>"<?php echo $causa_trauma_situacion_add->nombre->editAttributes() ?>>
</span>
<?php echo $causa_trauma_situacion_add->nombre->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$causa_trauma_situacion_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $causa_trauma_situacion_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $causa_trauma_situacion_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$causa_trauma_situacion_add->showPageFooter();
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
$causa_trauma_situacion_add->terminate();
?>