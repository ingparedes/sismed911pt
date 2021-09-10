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
$nivel_hospital_add = new nivel_hospital_add();

// Run the page
$nivel_hospital_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$nivel_hospital_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fnivel_hospitaladd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fnivel_hospitaladd = currentForm = new ew.Form("fnivel_hospitaladd", "add");

	// Validate form
	fnivel_hospitaladd.validate = function() {
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
			<?php if ($nivel_hospital_add->nombre_nivel->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_nivel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $nivel_hospital_add->nombre_nivel->caption(), $nivel_hospital_add->nombre_nivel->RequiredErrorMessage)) ?>");
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
	fnivel_hospitaladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fnivel_hospitaladd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fnivel_hospitaladd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $nivel_hospital_add->showPageHeader(); ?>
<?php
$nivel_hospital_add->showMessage();
?>
<form name="fnivel_hospitaladd" id="fnivel_hospitaladd" class="<?php echo $nivel_hospital_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="nivel_hospital">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$nivel_hospital_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($nivel_hospital_add->nombre_nivel->Visible) { // nombre_nivel ?>
	<div id="r_nombre_nivel" class="form-group row">
		<label id="elh_nivel_hospital_nombre_nivel" for="x_nombre_nivel" class="<?php echo $nivel_hospital_add->LeftColumnClass ?>"><?php echo $nivel_hospital_add->nombre_nivel->caption() ?><?php echo $nivel_hospital_add->nombre_nivel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $nivel_hospital_add->RightColumnClass ?>"><div <?php echo $nivel_hospital_add->nombre_nivel->cellAttributes() ?>>
<span id="el_nivel_hospital_nombre_nivel">
<input type="text" data-table="nivel_hospital" data-field="x_nombre_nivel" name="x_nombre_nivel" id="x_nombre_nivel" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($nivel_hospital_add->nombre_nivel->getPlaceHolder()) ?>" value="<?php echo $nivel_hospital_add->nombre_nivel->EditValue ?>"<?php echo $nivel_hospital_add->nombre_nivel->editAttributes() ?>>
</span>
<?php echo $nivel_hospital_add->nombre_nivel->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$nivel_hospital_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $nivel_hospital_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $nivel_hospital_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$nivel_hospital_add->showPageFooter();
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
$nivel_hospital_add->terminate();
?>