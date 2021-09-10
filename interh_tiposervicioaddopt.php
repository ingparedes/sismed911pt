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
$interh_tiposervicio_addopt = new interh_tiposervicio_addopt();

// Run the page
$interh_tiposervicio_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_tiposervicio_addopt->Page_Render();
?>
<script>
var finterh_tiposervicioaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	finterh_tiposervicioaddopt = currentForm = new ew.Form("finterh_tiposervicioaddopt", "addopt");

	// Validate form
	finterh_tiposervicioaddopt.validate = function() {
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
			<?php if ($interh_tiposervicio_addopt->nombre_tiposervicion_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_tiposervicion_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_tiposervicio_addopt->nombre_tiposervicion_es->caption(), $interh_tiposervicio_addopt->nombre_tiposervicion_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_tiposervicio_addopt->nombre_tiposervicion_en->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_tiposervicion_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_tiposervicio_addopt->nombre_tiposervicion_en->caption(), $interh_tiposervicio_addopt->nombre_tiposervicion_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_tiposervicio_addopt->nombre_tiposervicion_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_tiposervicion_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_tiposervicio_addopt->nombre_tiposervicion_fr->caption(), $interh_tiposervicio_addopt->nombre_tiposervicion_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_tiposervicio_addopt->nombre_tiposervicion_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_tiposervicion_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_tiposervicio_addopt->nombre_tiposervicion_pr->caption(), $interh_tiposervicio_addopt->nombre_tiposervicion_pr->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	finterh_tiposervicioaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_tiposervicioaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("finterh_tiposervicioaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_tiposervicio_addopt->showPageHeader(); ?>
<?php
$interh_tiposervicio_addopt->showMessage();
?>
<form name="finterh_tiposervicioaddopt" id="finterh_tiposervicioaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $interh_tiposervicio_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($interh_tiposervicio_addopt->nombre_tiposervicion_es->Visible) { // nombre_tiposervicion_es ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_tiposervicion_es"><?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_es->caption() ?><?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="interh_tiposervicio" data-field="x_nombre_tiposervicion_es" name="x_nombre_tiposervicion_es" id="x_nombre_tiposervicion_es" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_tiposervicio_addopt->nombre_tiposervicion_es->getPlaceHolder()) ?>" value="<?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_es->EditValue ?>"<?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_es->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($interh_tiposervicio_addopt->nombre_tiposervicion_en->Visible) { // nombre_tiposervicion_en ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_tiposervicion_en"><?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_en->caption() ?><?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="interh_tiposervicio" data-field="x_nombre_tiposervicion_en" name="x_nombre_tiposervicion_en" id="x_nombre_tiposervicion_en" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_tiposervicio_addopt->nombre_tiposervicion_en->getPlaceHolder()) ?>" value="<?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_en->EditValue ?>"<?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_en->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($interh_tiposervicio_addopt->nombre_tiposervicion_fr->Visible) { // nombre_tiposervicion_fr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_tiposervicion_fr"><?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_fr->caption() ?><?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="interh_tiposervicio" data-field="x_nombre_tiposervicion_fr" name="x_nombre_tiposervicion_fr" id="x_nombre_tiposervicion_fr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_tiposervicio_addopt->nombre_tiposervicion_fr->getPlaceHolder()) ?>" value="<?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_fr->EditValue ?>"<?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_fr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($interh_tiposervicio_addopt->nombre_tiposervicion_pr->Visible) { // nombre_tiposervicion_pr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_tiposervicion_pr"><?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_pr->caption() ?><?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="interh_tiposervicio" data-field="x_nombre_tiposervicion_pr" name="x_nombre_tiposervicion_pr" id="x_nombre_tiposervicion_pr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_tiposervicio_addopt->nombre_tiposervicion_pr->getPlaceHolder()) ?>" value="<?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_pr->EditValue ?>"<?php echo $interh_tiposervicio_addopt->nombre_tiposervicion_pr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$interh_tiposervicio_addopt->showPageFooter();
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
$interh_tiposervicio_addopt->terminate();
?>