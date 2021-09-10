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
$triage_addopt = new triage_addopt();

// Run the page
$triage_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$triage_addopt->Page_Render();
?>
<script>
var ftriageaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	ftriageaddopt = currentForm = new ew.Form("ftriageaddopt", "addopt");

	// Validate form
	ftriageaddopt.validate = function() {
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
			<?php if ($triage_addopt->nombre_triage_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_triage_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $triage_addopt->nombre_triage_es->caption(), $triage_addopt->nombre_triage_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($triage_addopt->nombre_triage_en->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_triage_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $triage_addopt->nombre_triage_en->caption(), $triage_addopt->nombre_triage_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($triage_addopt->nombre_triage_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_triage_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $triage_addopt->nombre_triage_pr->caption(), $triage_addopt->nombre_triage_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($triage_addopt->nombre_triage_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_triage_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $triage_addopt->nombre_triage_fr->caption(), $triage_addopt->nombre_triage_fr->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ftriageaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftriageaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ftriageaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $triage_addopt->showPageHeader(); ?>
<?php
$triage_addopt->showMessage();
?>
<form name="ftriageaddopt" id="ftriageaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $triage_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($triage_addopt->nombre_triage_es->Visible) { // nombre_triage_es ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_triage_es"><?php echo $triage_addopt->nombre_triage_es->caption() ?><?php echo $triage_addopt->nombre_triage_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="triage" data-field="x_nombre_triage_es" name="x_nombre_triage_es" id="x_nombre_triage_es" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($triage_addopt->nombre_triage_es->getPlaceHolder()) ?>" value="<?php echo $triage_addopt->nombre_triage_es->EditValue ?>"<?php echo $triage_addopt->nombre_triage_es->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($triage_addopt->nombre_triage_en->Visible) { // nombre_triage_en ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_triage_en"><?php echo $triage_addopt->nombre_triage_en->caption() ?><?php echo $triage_addopt->nombre_triage_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="triage" data-field="x_nombre_triage_en" name="x_nombre_triage_en" id="x_nombre_triage_en" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($triage_addopt->nombre_triage_en->getPlaceHolder()) ?>" value="<?php echo $triage_addopt->nombre_triage_en->EditValue ?>"<?php echo $triage_addopt->nombre_triage_en->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($triage_addopt->nombre_triage_pr->Visible) { // nombre_triage_pr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_triage_pr"><?php echo $triage_addopt->nombre_triage_pr->caption() ?><?php echo $triage_addopt->nombre_triage_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="triage" data-field="x_nombre_triage_pr" name="x_nombre_triage_pr" id="x_nombre_triage_pr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($triage_addopt->nombre_triage_pr->getPlaceHolder()) ?>" value="<?php echo $triage_addopt->nombre_triage_pr->EditValue ?>"<?php echo $triage_addopt->nombre_triage_pr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($triage_addopt->nombre_triage_fr->Visible) { // nombre_triage_fr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_triage_fr"><?php echo $triage_addopt->nombre_triage_fr->caption() ?><?php echo $triage_addopt->nombre_triage_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="triage" data-field="x_nombre_triage_fr" name="x_nombre_triage_fr" id="x_nombre_triage_fr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($triage_addopt->nombre_triage_fr->getPlaceHolder()) ?>" value="<?php echo $triage_addopt->nombre_triage_fr->EditValue ?>"<?php echo $triage_addopt->nombre_triage_fr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$triage_addopt->showPageFooter();
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
$triage_addopt->terminate();
?>