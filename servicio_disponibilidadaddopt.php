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
$servicio_disponibilidad_addopt = new servicio_disponibilidad_addopt();

// Run the page
$servicio_disponibilidad_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicio_disponibilidad_addopt->Page_Render();
?>
<script>
var fservicio_disponibilidadaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fservicio_disponibilidadaddopt = currentForm = new ew.Form("fservicio_disponibilidadaddopt", "addopt");

	// Validate form
	fservicio_disponibilidadaddopt.validate = function() {
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
			<?php if ($servicio_disponibilidad_addopt->nombre_serv_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_serv_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_disponibilidad_addopt->nombre_serv_es->caption(), $servicio_disponibilidad_addopt->nombre_serv_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_disponibilidad_addopt->nombre_serv_en->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_serv_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_disponibilidad_addopt->nombre_serv_en->caption(), $servicio_disponibilidad_addopt->nombre_serv_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_disponibilidad_addopt->nombre_serv_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_serv_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_disponibilidad_addopt->nombre_serv_pr->caption(), $servicio_disponibilidad_addopt->nombre_serv_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_disponibilidad_addopt->nombre_serv_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_serv_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_disponibilidad_addopt->nombre_serv_fr->caption(), $servicio_disponibilidad_addopt->nombre_serv_fr->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fservicio_disponibilidadaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fservicio_disponibilidadaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fservicio_disponibilidadaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $servicio_disponibilidad_addopt->showPageHeader(); ?>
<?php
$servicio_disponibilidad_addopt->showMessage();
?>
<form name="fservicio_disponibilidadaddopt" id="fservicio_disponibilidadaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $servicio_disponibilidad_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($servicio_disponibilidad_addopt->nombre_serv_es->Visible) { // nombre_serv_es ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_serv_es"><?php echo $servicio_disponibilidad_addopt->nombre_serv_es->caption() ?><?php echo $servicio_disponibilidad_addopt->nombre_serv_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="servicio_disponibilidad" data-field="x_nombre_serv_es" name="x_nombre_serv_es" id="x_nombre_serv_es" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($servicio_disponibilidad_addopt->nombre_serv_es->getPlaceHolder()) ?>" value="<?php echo $servicio_disponibilidad_addopt->nombre_serv_es->EditValue ?>"<?php echo $servicio_disponibilidad_addopt->nombre_serv_es->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($servicio_disponibilidad_addopt->nombre_serv_en->Visible) { // nombre_serv_en ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_serv_en"><?php echo $servicio_disponibilidad_addopt->nombre_serv_en->caption() ?><?php echo $servicio_disponibilidad_addopt->nombre_serv_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="servicio_disponibilidad" data-field="x_nombre_serv_en" name="x_nombre_serv_en" id="x_nombre_serv_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($servicio_disponibilidad_addopt->nombre_serv_en->getPlaceHolder()) ?>" value="<?php echo $servicio_disponibilidad_addopt->nombre_serv_en->EditValue ?>"<?php echo $servicio_disponibilidad_addopt->nombre_serv_en->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($servicio_disponibilidad_addopt->nombre_serv_pr->Visible) { // nombre_serv_pr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_serv_pr"><?php echo $servicio_disponibilidad_addopt->nombre_serv_pr->caption() ?><?php echo $servicio_disponibilidad_addopt->nombre_serv_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="servicio_disponibilidad" data-field="x_nombre_serv_pr" name="x_nombre_serv_pr" id="x_nombre_serv_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($servicio_disponibilidad_addopt->nombre_serv_pr->getPlaceHolder()) ?>" value="<?php echo $servicio_disponibilidad_addopt->nombre_serv_pr->EditValue ?>"<?php echo $servicio_disponibilidad_addopt->nombre_serv_pr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($servicio_disponibilidad_addopt->nombre_serv_fr->Visible) { // nombre_serv_fr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_serv_fr"><?php echo $servicio_disponibilidad_addopt->nombre_serv_fr->caption() ?><?php echo $servicio_disponibilidad_addopt->nombre_serv_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="servicio_disponibilidad" data-field="x_nombre_serv_fr" name="x_nombre_serv_fr" id="x_nombre_serv_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($servicio_disponibilidad_addopt->nombre_serv_fr->getPlaceHolder()) ?>" value="<?php echo $servicio_disponibilidad_addopt->nombre_serv_fr->EditValue ?>"<?php echo $servicio_disponibilidad_addopt->nombre_serv_fr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$servicio_disponibilidad_addopt->showPageFooter();
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
$servicio_disponibilidad_addopt->terminate();
?>