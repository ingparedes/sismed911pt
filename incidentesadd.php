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
$incidentes_add = new incidentes_add();

// Run the page
$incidentes_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$incidentes_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fincidentesadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fincidentesadd = currentForm = new ew.Form("fincidentesadd", "add");

	// Validate form
	fincidentesadd.validate = function() {
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
			<?php if ($incidentes_add->incidente_es->Required) { ?>
				elm = this.getElements("x" + infix + "_incidente_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_add->incidente_es->caption(), $incidentes_add->incidente_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_add->nombre_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_add->nombre_es->caption(), $incidentes_add->nombre_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_add->incidente_en->Required) { ?>
				elm = this.getElements("x" + infix + "_incidente_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_add->incidente_en->caption(), $incidentes_add->incidente_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_add->nombre_en->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_add->nombre_en->caption(), $incidentes_add->nombre_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_add->incidente_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_incidente_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_add->incidente_fr->caption(), $incidentes_add->incidente_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_add->nombre_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_add->nombre_fr->caption(), $incidentes_add->nombre_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_add->incidente_pt->Required) { ?>
				elm = this.getElements("x" + infix + "_incidente_pt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_add->incidente_pt->caption(), $incidentes_add->incidente_pt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_add->nombre_pt->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_pt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_add->nombre_pt->caption(), $incidentes_add->nombre_pt->RequiredErrorMessage)) ?>");
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
	fincidentesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fincidentesadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fincidentesadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $incidentes_add->showPageHeader(); ?>
<?php
$incidentes_add->showMessage();
?>
<form name="fincidentesadd" id="fincidentesadd" class="<?php echo $incidentes_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="incidentes">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$incidentes_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($incidentes_add->incidente_es->Visible) { // incidente_es ?>
	<div id="r_incidente_es" class="form-group row">
		<label id="elh_incidentes_incidente_es" class="<?php echo $incidentes_add->LeftColumnClass ?>"><?php echo $incidentes_add->incidente_es->caption() ?><?php echo $incidentes_add->incidente_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_add->RightColumnClass ?>"><div <?php echo $incidentes_add->incidente_es->cellAttributes() ?>>
<span id="el_incidentes_incidente_es">
<?php $incidentes_add->incidente_es->EditAttrs->appendClass("editor"); ?>
<textarea data-table="incidentes" data-field="x_incidente_es" name="x_incidente_es" id="x_incidente_es" cols="35" rows="4" placeholder="<?php echo HtmlEncode($incidentes_add->incidente_es->getPlaceHolder()) ?>"<?php echo $incidentes_add->incidente_es->editAttributes() ?>><?php echo $incidentes_add->incidente_es->EditValue ?></textarea>
<script>
loadjs.ready(["fincidentesadd", "editor"], function() {
	ew.createEditor("fincidentesadd", "x_incidente_es", 35, 4, <?php echo $incidentes_add->incidente_es->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $incidentes_add->incidente_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_add->nombre_es->Visible) { // nombre_es ?>
	<div id="r_nombre_es" class="form-group row">
		<label id="elh_incidentes_nombre_es" for="x_nombre_es" class="<?php echo $incidentes_add->LeftColumnClass ?>"><?php echo $incidentes_add->nombre_es->caption() ?><?php echo $incidentes_add->nombre_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_add->RightColumnClass ?>"><div <?php echo $incidentes_add->nombre_es->cellAttributes() ?>>
<span id="el_incidentes_nombre_es">
<input type="text" data-table="incidentes" data-field="x_nombre_es" name="x_nombre_es" id="x_nombre_es" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($incidentes_add->nombre_es->getPlaceHolder()) ?>" value="<?php echo $incidentes_add->nombre_es->EditValue ?>"<?php echo $incidentes_add->nombre_es->editAttributes() ?>>
</span>
<?php echo $incidentes_add->nombre_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_add->incidente_en->Visible) { // incidente_en ?>
	<div id="r_incidente_en" class="form-group row">
		<label id="elh_incidentes_incidente_en" class="<?php echo $incidentes_add->LeftColumnClass ?>"><?php echo $incidentes_add->incidente_en->caption() ?><?php echo $incidentes_add->incidente_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_add->RightColumnClass ?>"><div <?php echo $incidentes_add->incidente_en->cellAttributes() ?>>
<span id="el_incidentes_incidente_en">
<?php $incidentes_add->incidente_en->EditAttrs->appendClass("editor"); ?>
<textarea data-table="incidentes" data-field="x_incidente_en" name="x_incidente_en" id="x_incidente_en" cols="35" rows="4" placeholder="<?php echo HtmlEncode($incidentes_add->incidente_en->getPlaceHolder()) ?>"<?php echo $incidentes_add->incidente_en->editAttributes() ?>><?php echo $incidentes_add->incidente_en->EditValue ?></textarea>
<script>
loadjs.ready(["fincidentesadd", "editor"], function() {
	ew.createEditor("fincidentesadd", "x_incidente_en", 35, 4, <?php echo $incidentes_add->incidente_en->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $incidentes_add->incidente_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_add->nombre_en->Visible) { // nombre_en ?>
	<div id="r_nombre_en" class="form-group row">
		<label id="elh_incidentes_nombre_en" for="x_nombre_en" class="<?php echo $incidentes_add->LeftColumnClass ?>"><?php echo $incidentes_add->nombre_en->caption() ?><?php echo $incidentes_add->nombre_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_add->RightColumnClass ?>"><div <?php echo $incidentes_add->nombre_en->cellAttributes() ?>>
<span id="el_incidentes_nombre_en">
<input type="text" data-table="incidentes" data-field="x_nombre_en" name="x_nombre_en" id="x_nombre_en" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($incidentes_add->nombre_en->getPlaceHolder()) ?>" value="<?php echo $incidentes_add->nombre_en->EditValue ?>"<?php echo $incidentes_add->nombre_en->editAttributes() ?>>
</span>
<?php echo $incidentes_add->nombre_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_add->incidente_fr->Visible) { // incidente_fr ?>
	<div id="r_incidente_fr" class="form-group row">
		<label id="elh_incidentes_incidente_fr" class="<?php echo $incidentes_add->LeftColumnClass ?>"><?php echo $incidentes_add->incidente_fr->caption() ?><?php echo $incidentes_add->incidente_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_add->RightColumnClass ?>"><div <?php echo $incidentes_add->incidente_fr->cellAttributes() ?>>
<span id="el_incidentes_incidente_fr">
<?php $incidentes_add->incidente_fr->EditAttrs->appendClass("editor"); ?>
<textarea data-table="incidentes" data-field="x_incidente_fr" name="x_incidente_fr" id="x_incidente_fr" cols="35" rows="4" placeholder="<?php echo HtmlEncode($incidentes_add->incidente_fr->getPlaceHolder()) ?>"<?php echo $incidentes_add->incidente_fr->editAttributes() ?>><?php echo $incidentes_add->incidente_fr->EditValue ?></textarea>
<script>
loadjs.ready(["fincidentesadd", "editor"], function() {
	ew.createEditor("fincidentesadd", "x_incidente_fr", 35, 4, <?php echo $incidentes_add->incidente_fr->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $incidentes_add->incidente_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_add->nombre_fr->Visible) { // nombre_fr ?>
	<div id="r_nombre_fr" class="form-group row">
		<label id="elh_incidentes_nombre_fr" for="x_nombre_fr" class="<?php echo $incidentes_add->LeftColumnClass ?>"><?php echo $incidentes_add->nombre_fr->caption() ?><?php echo $incidentes_add->nombre_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_add->RightColumnClass ?>"><div <?php echo $incidentes_add->nombre_fr->cellAttributes() ?>>
<span id="el_incidentes_nombre_fr">
<input type="text" data-table="incidentes" data-field="x_nombre_fr" name="x_nombre_fr" id="x_nombre_fr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($incidentes_add->nombre_fr->getPlaceHolder()) ?>" value="<?php echo $incidentes_add->nombre_fr->EditValue ?>"<?php echo $incidentes_add->nombre_fr->editAttributes() ?>>
</span>
<?php echo $incidentes_add->nombre_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_add->incidente_pt->Visible) { // incidente_pt ?>
	<div id="r_incidente_pt" class="form-group row">
		<label id="elh_incidentes_incidente_pt" class="<?php echo $incidentes_add->LeftColumnClass ?>"><?php echo $incidentes_add->incidente_pt->caption() ?><?php echo $incidentes_add->incidente_pt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_add->RightColumnClass ?>"><div <?php echo $incidentes_add->incidente_pt->cellAttributes() ?>>
<span id="el_incidentes_incidente_pt">
<?php $incidentes_add->incidente_pt->EditAttrs->appendClass("editor"); ?>
<textarea data-table="incidentes" data-field="x_incidente_pt" name="x_incidente_pt" id="x_incidente_pt" cols="35" rows="4" placeholder="<?php echo HtmlEncode($incidentes_add->incidente_pt->getPlaceHolder()) ?>"<?php echo $incidentes_add->incidente_pt->editAttributes() ?>><?php echo $incidentes_add->incidente_pt->EditValue ?></textarea>
<script>
loadjs.ready(["fincidentesadd", "editor"], function() {
	ew.createEditor("fincidentesadd", "x_incidente_pt", 35, 4, <?php echo $incidentes_add->incidente_pt->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $incidentes_add->incidente_pt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_add->nombre_pt->Visible) { // nombre_pt ?>
	<div id="r_nombre_pt" class="form-group row">
		<label id="elh_incidentes_nombre_pt" for="x_nombre_pt" class="<?php echo $incidentes_add->LeftColumnClass ?>"><?php echo $incidentes_add->nombre_pt->caption() ?><?php echo $incidentes_add->nombre_pt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_add->RightColumnClass ?>"><div <?php echo $incidentes_add->nombre_pt->cellAttributes() ?>>
<span id="el_incidentes_nombre_pt">
<input type="text" data-table="incidentes" data-field="x_nombre_pt" name="x_nombre_pt" id="x_nombre_pt" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($incidentes_add->nombre_pt->getPlaceHolder()) ?>" value="<?php echo $incidentes_add->nombre_pt->EditValue ?>"<?php echo $incidentes_add->nombre_pt->editAttributes() ?>>
</span>
<?php echo $incidentes_add->nombre_pt->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$incidentes_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $incidentes_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $incidentes_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$incidentes_add->showPageFooter();
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
$incidentes_add->terminate();
?>