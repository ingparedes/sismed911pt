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
$interh_prioridad_add = new interh_prioridad_add();

// Run the page
$interh_prioridad_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_prioridad_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_prioridadadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	finterh_prioridadadd = currentForm = new ew.Form("finterh_prioridadadd", "add");

	// Validate form
	finterh_prioridadadd.validate = function() {
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
			<?php if ($interh_prioridad_add->nombre_prioridad->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_prioridad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_prioridad_add->nombre_prioridad->caption(), $interh_prioridad_add->nombre_prioridad->RequiredErrorMessage)) ?>");
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
	finterh_prioridadadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_prioridadadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("finterh_prioridadadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_prioridad_add->showPageHeader(); ?>
<?php
$interh_prioridad_add->showMessage();
?>
<form name="finterh_prioridadadd" id="finterh_prioridadadd" class="<?php echo $interh_prioridad_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_prioridad">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$interh_prioridad_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($interh_prioridad_add->nombre_prioridad->Visible) { // nombre_prioridad ?>
	<div id="r_nombre_prioridad" class="form-group row">
		<label id="elh_interh_prioridad_nombre_prioridad" for="x_nombre_prioridad" class="<?php echo $interh_prioridad_add->LeftColumnClass ?>"><?php echo $interh_prioridad_add->nombre_prioridad->caption() ?><?php echo $interh_prioridad_add->nombre_prioridad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_prioridad_add->RightColumnClass ?>"><div <?php echo $interh_prioridad_add->nombre_prioridad->cellAttributes() ?>>
<span id="el_interh_prioridad_nombre_prioridad">
<input type="text" data-table="interh_prioridad" data-field="x_nombre_prioridad" name="x_nombre_prioridad" id="x_nombre_prioridad" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_prioridad_add->nombre_prioridad->getPlaceHolder()) ?>" value="<?php echo $interh_prioridad_add->nombre_prioridad->EditValue ?>"<?php echo $interh_prioridad_add->nombre_prioridad->editAttributes() ?>>
</span>
<?php echo $interh_prioridad_add->nombre_prioridad->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$interh_prioridad_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $interh_prioridad_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_prioridad_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$interh_prioridad_add->showPageFooter();
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
$interh_prioridad_add->terminate();
?>