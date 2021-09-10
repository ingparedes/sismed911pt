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
$interh_motivoatencion_addopt = new interh_motivoatencion_addopt();

// Run the page
$interh_motivoatencion_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_motivoatencion_addopt->Page_Render();
?>
<script>
var finterh_motivoatencionaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	finterh_motivoatencionaddopt = currentForm = new ew.Form("finterh_motivoatencionaddopt", "addopt");

	// Validate form
	finterh_motivoatencionaddopt.validate = function() {
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
			<?php if ($interh_motivoatencion_addopt->nombre_motivo_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_motivo_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_motivoatencion_addopt->nombre_motivo_es->caption(), $interh_motivoatencion_addopt->nombre_motivo_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_motivoatencion_addopt->nombre_motivo_en->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_motivo_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_motivoatencion_addopt->nombre_motivo_en->caption(), $interh_motivoatencion_addopt->nombre_motivo_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_motivoatencion_addopt->nombre_motivo_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_motivo_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_motivoatencion_addopt->nombre_motivo_fr->caption(), $interh_motivoatencion_addopt->nombre_motivo_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_motivoatencion_addopt->nombre_motivo_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_motivo_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_motivoatencion_addopt->nombre_motivo_pr->caption(), $interh_motivoatencion_addopt->nombre_motivo_pr->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	finterh_motivoatencionaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_motivoatencionaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("finterh_motivoatencionaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_motivoatencion_addopt->showPageHeader(); ?>
<?php
$interh_motivoatencion_addopt->showMessage();
?>
<form name="finterh_motivoatencionaddopt" id="finterh_motivoatencionaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $interh_motivoatencion_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($interh_motivoatencion_addopt->nombre_motivo_es->Visible) { // nombre_motivo_es ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_motivo_es"><?php echo $interh_motivoatencion_addopt->nombre_motivo_es->caption() ?><?php echo $interh_motivoatencion_addopt->nombre_motivo_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="interh_motivoatencion" data-field="x_nombre_motivo_es" name="x_nombre_motivo_es" id="x_nombre_motivo_es" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($interh_motivoatencion_addopt->nombre_motivo_es->getPlaceHolder()) ?>" value="<?php echo $interh_motivoatencion_addopt->nombre_motivo_es->EditValue ?>"<?php echo $interh_motivoatencion_addopt->nombre_motivo_es->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($interh_motivoatencion_addopt->nombre_motivo_en->Visible) { // nombre_motivo_en ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_motivo_en"><?php echo $interh_motivoatencion_addopt->nombre_motivo_en->caption() ?><?php echo $interh_motivoatencion_addopt->nombre_motivo_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="interh_motivoatencion" data-field="x_nombre_motivo_en" name="x_nombre_motivo_en" id="x_nombre_motivo_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($interh_motivoatencion_addopt->nombre_motivo_en->getPlaceHolder()) ?>" value="<?php echo $interh_motivoatencion_addopt->nombre_motivo_en->EditValue ?>"<?php echo $interh_motivoatencion_addopt->nombre_motivo_en->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($interh_motivoatencion_addopt->nombre_motivo_fr->Visible) { // nombre_motivo_fr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_motivo_fr"><?php echo $interh_motivoatencion_addopt->nombre_motivo_fr->caption() ?><?php echo $interh_motivoatencion_addopt->nombre_motivo_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="interh_motivoatencion" data-field="x_nombre_motivo_fr" name="x_nombre_motivo_fr" id="x_nombre_motivo_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($interh_motivoatencion_addopt->nombre_motivo_fr->getPlaceHolder()) ?>" value="<?php echo $interh_motivoatencion_addopt->nombre_motivo_fr->EditValue ?>"<?php echo $interh_motivoatencion_addopt->nombre_motivo_fr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($interh_motivoatencion_addopt->nombre_motivo_pr->Visible) { // nombre_motivo_pr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_motivo_pr"><?php echo $interh_motivoatencion_addopt->nombre_motivo_pr->caption() ?><?php echo $interh_motivoatencion_addopt->nombre_motivo_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="interh_motivoatencion" data-field="x_nombre_motivo_pr" name="x_nombre_motivo_pr" id="x_nombre_motivo_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($interh_motivoatencion_addopt->nombre_motivo_pr->getPlaceHolder()) ?>" value="<?php echo $interh_motivoatencion_addopt->nombre_motivo_pr->EditValue ?>"<?php echo $interh_motivoatencion_addopt->nombre_motivo_pr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$interh_motivoatencion_addopt->showPageFooter();
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
$interh_motivoatencion_addopt->terminate();
?>