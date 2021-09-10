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
$especialidad_hospital_add = new especialidad_hospital_add();

// Run the page
$especialidad_hospital_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$especialidad_hospital_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fespecialidad_hospitaladd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fespecialidad_hospitaladd = currentForm = new ew.Form("fespecialidad_hospitaladd", "add");

	// Validate form
	fespecialidad_hospitaladd.validate = function() {
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
			<?php if ($especialidad_hospital_add->especialidad_es->Required) { ?>
				elm = this.getElements("x" + infix + "_especialidad_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especialidad_hospital_add->especialidad_es->caption(), $especialidad_hospital_add->especialidad_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especialidad_hospital_add->especialidad_en->Required) { ?>
				elm = this.getElements("x" + infix + "_especialidad_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especialidad_hospital_add->especialidad_en->caption(), $especialidad_hospital_add->especialidad_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especialidad_hospital_add->especialidad_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_especialidad_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especialidad_hospital_add->especialidad_pr->caption(), $especialidad_hospital_add->especialidad_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especialidad_hospital_add->especialidad_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_especialidad_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especialidad_hospital_add->especialidad_fr->caption(), $especialidad_hospital_add->especialidad_fr->RequiredErrorMessage)) ?>");
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
	fespecialidad_hospitaladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fespecialidad_hospitaladd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fespecialidad_hospitaladd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $especialidad_hospital_add->showPageHeader(); ?>
<?php
$especialidad_hospital_add->showMessage();
?>
<form name="fespecialidad_hospitaladd" id="fespecialidad_hospitaladd" class="<?php echo $especialidad_hospital_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="especialidad_hospital">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$especialidad_hospital_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($especialidad_hospital_add->especialidad_es->Visible) { // especialidad_es ?>
	<div id="r_especialidad_es" class="form-group row">
		<label id="elh_especialidad_hospital_especialidad_es" for="x_especialidad_es" class="<?php echo $especialidad_hospital_add->LeftColumnClass ?>"><?php echo $especialidad_hospital_add->especialidad_es->caption() ?><?php echo $especialidad_hospital_add->especialidad_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especialidad_hospital_add->RightColumnClass ?>"><div <?php echo $especialidad_hospital_add->especialidad_es->cellAttributes() ?>>
<span id="el_especialidad_hospital_especialidad_es">
<input type="text" data-table="especialidad_hospital" data-field="x_especialidad_es" name="x_especialidad_es" id="x_especialidad_es" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($especialidad_hospital_add->especialidad_es->getPlaceHolder()) ?>" value="<?php echo $especialidad_hospital_add->especialidad_es->EditValue ?>"<?php echo $especialidad_hospital_add->especialidad_es->editAttributes() ?>>
</span>
<?php echo $especialidad_hospital_add->especialidad_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($especialidad_hospital_add->especialidad_en->Visible) { // especialidad_en ?>
	<div id="r_especialidad_en" class="form-group row">
		<label id="elh_especialidad_hospital_especialidad_en" for="x_especialidad_en" class="<?php echo $especialidad_hospital_add->LeftColumnClass ?>"><?php echo $especialidad_hospital_add->especialidad_en->caption() ?><?php echo $especialidad_hospital_add->especialidad_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especialidad_hospital_add->RightColumnClass ?>"><div <?php echo $especialidad_hospital_add->especialidad_en->cellAttributes() ?>>
<span id="el_especialidad_hospital_especialidad_en">
<input type="text" data-table="especialidad_hospital" data-field="x_especialidad_en" name="x_especialidad_en" id="x_especialidad_en" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($especialidad_hospital_add->especialidad_en->getPlaceHolder()) ?>" value="<?php echo $especialidad_hospital_add->especialidad_en->EditValue ?>"<?php echo $especialidad_hospital_add->especialidad_en->editAttributes() ?>>
</span>
<?php echo $especialidad_hospital_add->especialidad_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($especialidad_hospital_add->especialidad_pr->Visible) { // especialidad_pr ?>
	<div id="r_especialidad_pr" class="form-group row">
		<label id="elh_especialidad_hospital_especialidad_pr" for="x_especialidad_pr" class="<?php echo $especialidad_hospital_add->LeftColumnClass ?>"><?php echo $especialidad_hospital_add->especialidad_pr->caption() ?><?php echo $especialidad_hospital_add->especialidad_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especialidad_hospital_add->RightColumnClass ?>"><div <?php echo $especialidad_hospital_add->especialidad_pr->cellAttributes() ?>>
<span id="el_especialidad_hospital_especialidad_pr">
<input type="text" data-table="especialidad_hospital" data-field="x_especialidad_pr" name="x_especialidad_pr" id="x_especialidad_pr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($especialidad_hospital_add->especialidad_pr->getPlaceHolder()) ?>" value="<?php echo $especialidad_hospital_add->especialidad_pr->EditValue ?>"<?php echo $especialidad_hospital_add->especialidad_pr->editAttributes() ?>>
</span>
<?php echo $especialidad_hospital_add->especialidad_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($especialidad_hospital_add->especialidad_fr->Visible) { // especialidad_fr ?>
	<div id="r_especialidad_fr" class="form-group row">
		<label id="elh_especialidad_hospital_especialidad_fr" for="x_especialidad_fr" class="<?php echo $especialidad_hospital_add->LeftColumnClass ?>"><?php echo $especialidad_hospital_add->especialidad_fr->caption() ?><?php echo $especialidad_hospital_add->especialidad_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especialidad_hospital_add->RightColumnClass ?>"><div <?php echo $especialidad_hospital_add->especialidad_fr->cellAttributes() ?>>
<span id="el_especialidad_hospital_especialidad_fr">
<input type="text" data-table="especialidad_hospital" data-field="x_especialidad_fr" name="x_especialidad_fr" id="x_especialidad_fr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($especialidad_hospital_add->especialidad_fr->getPlaceHolder()) ?>" value="<?php echo $especialidad_hospital_add->especialidad_fr->EditValue ?>"<?php echo $especialidad_hospital_add->especialidad_fr->editAttributes() ?>>
</span>
<?php echo $especialidad_hospital_add->especialidad_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$especialidad_hospital_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $especialidad_hospital_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $especialidad_hospital_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$especialidad_hospital_add->showPageFooter();
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
$especialidad_hospital_add->terminate();
?>