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
$incidentes_edit = new incidentes_edit();

// Run the page
$incidentes_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$incidentes_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fincidentesedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fincidentesedit = currentForm = new ew.Form("fincidentesedit", "edit");

	// Validate form
	fincidentesedit.validate = function() {
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
			<?php if ($incidentes_edit->id_incidente->Required) { ?>
				elm = this.getElements("x" + infix + "_id_incidente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_edit->id_incidente->caption(), $incidentes_edit->id_incidente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_edit->incidente_es->Required) { ?>
				elm = this.getElements("x" + infix + "_incidente_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_edit->incidente_es->caption(), $incidentes_edit->incidente_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_edit->nombre_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_edit->nombre_es->caption(), $incidentes_edit->nombre_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_edit->incidente_en->Required) { ?>
				elm = this.getElements("x" + infix + "_incidente_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_edit->incidente_en->caption(), $incidentes_edit->incidente_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_edit->nombre_en->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_edit->nombre_en->caption(), $incidentes_edit->nombre_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_edit->incidente_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_incidente_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_edit->incidente_fr->caption(), $incidentes_edit->incidente_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_edit->nombre_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_edit->nombre_fr->caption(), $incidentes_edit->nombre_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_edit->incidente_pt->Required) { ?>
				elm = this.getElements("x" + infix + "_incidente_pt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_edit->incidente_pt->caption(), $incidentes_edit->incidente_pt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($incidentes_edit->nombre_pt->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_pt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $incidentes_edit->nombre_pt->caption(), $incidentes_edit->nombre_pt->RequiredErrorMessage)) ?>");
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
	fincidentesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fincidentesedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fincidentesedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $incidentes_edit->showPageHeader(); ?>
<?php
$incidentes_edit->showMessage();
?>
<form name="fincidentesedit" id="fincidentesedit" class="<?php echo $incidentes_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="incidentes">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$incidentes_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($incidentes_edit->id_incidente->Visible) { // id_incidente ?>
	<div id="r_id_incidente" class="form-group row">
		<label id="elh_incidentes_id_incidente" class="<?php echo $incidentes_edit->LeftColumnClass ?>"><?php echo $incidentes_edit->id_incidente->caption() ?><?php echo $incidentes_edit->id_incidente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_edit->RightColumnClass ?>"><div <?php echo $incidentes_edit->id_incidente->cellAttributes() ?>>
<span id="el_incidentes_id_incidente">
<span<?php echo $incidentes_edit->id_incidente->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($incidentes_edit->id_incidente->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="incidentes" data-field="x_id_incidente" name="x_id_incidente" id="x_id_incidente" value="<?php echo HtmlEncode($incidentes_edit->id_incidente->CurrentValue) ?>">
<?php echo $incidentes_edit->id_incidente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_edit->incidente_es->Visible) { // incidente_es ?>
	<div id="r_incidente_es" class="form-group row">
		<label id="elh_incidentes_incidente_es" class="<?php echo $incidentes_edit->LeftColumnClass ?>"><?php echo $incidentes_edit->incidente_es->caption() ?><?php echo $incidentes_edit->incidente_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_edit->RightColumnClass ?>"><div <?php echo $incidentes_edit->incidente_es->cellAttributes() ?>>
<span id="el_incidentes_incidente_es">
<?php $incidentes_edit->incidente_es->EditAttrs->appendClass("editor"); ?>
<textarea data-table="incidentes" data-field="x_incidente_es" name="x_incidente_es" id="x_incidente_es" cols="35" rows="4" placeholder="<?php echo HtmlEncode($incidentes_edit->incidente_es->getPlaceHolder()) ?>"<?php echo $incidentes_edit->incidente_es->editAttributes() ?>><?php echo $incidentes_edit->incidente_es->EditValue ?></textarea>
<script>
loadjs.ready(["fincidentesedit", "editor"], function() {
	ew.createEditor("fincidentesedit", "x_incidente_es", 35, 4, <?php echo $incidentes_edit->incidente_es->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $incidentes_edit->incidente_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_edit->nombre_es->Visible) { // nombre_es ?>
	<div id="r_nombre_es" class="form-group row">
		<label id="elh_incidentes_nombre_es" for="x_nombre_es" class="<?php echo $incidentes_edit->LeftColumnClass ?>"><?php echo $incidentes_edit->nombre_es->caption() ?><?php echo $incidentes_edit->nombre_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_edit->RightColumnClass ?>"><div <?php echo $incidentes_edit->nombre_es->cellAttributes() ?>>
<span id="el_incidentes_nombre_es">
<input type="text" data-table="incidentes" data-field="x_nombre_es" name="x_nombre_es" id="x_nombre_es" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($incidentes_edit->nombre_es->getPlaceHolder()) ?>" value="<?php echo $incidentes_edit->nombre_es->EditValue ?>"<?php echo $incidentes_edit->nombre_es->editAttributes() ?>>
</span>
<?php echo $incidentes_edit->nombre_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_edit->incidente_en->Visible) { // incidente_en ?>
	<div id="r_incidente_en" class="form-group row">
		<label id="elh_incidentes_incidente_en" class="<?php echo $incidentes_edit->LeftColumnClass ?>"><?php echo $incidentes_edit->incidente_en->caption() ?><?php echo $incidentes_edit->incidente_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_edit->RightColumnClass ?>"><div <?php echo $incidentes_edit->incidente_en->cellAttributes() ?>>
<span id="el_incidentes_incidente_en">
<?php $incidentes_edit->incidente_en->EditAttrs->appendClass("editor"); ?>
<textarea data-table="incidentes" data-field="x_incidente_en" name="x_incidente_en" id="x_incidente_en" cols="35" rows="4" placeholder="<?php echo HtmlEncode($incidentes_edit->incidente_en->getPlaceHolder()) ?>"<?php echo $incidentes_edit->incidente_en->editAttributes() ?>><?php echo $incidentes_edit->incidente_en->EditValue ?></textarea>
<script>
loadjs.ready(["fincidentesedit", "editor"], function() {
	ew.createEditor("fincidentesedit", "x_incidente_en", 35, 4, <?php echo $incidentes_edit->incidente_en->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $incidentes_edit->incidente_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_edit->nombre_en->Visible) { // nombre_en ?>
	<div id="r_nombre_en" class="form-group row">
		<label id="elh_incidentes_nombre_en" for="x_nombre_en" class="<?php echo $incidentes_edit->LeftColumnClass ?>"><?php echo $incidentes_edit->nombre_en->caption() ?><?php echo $incidentes_edit->nombre_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_edit->RightColumnClass ?>"><div <?php echo $incidentes_edit->nombre_en->cellAttributes() ?>>
<span id="el_incidentes_nombre_en">
<input type="text" data-table="incidentes" data-field="x_nombre_en" name="x_nombre_en" id="x_nombre_en" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($incidentes_edit->nombre_en->getPlaceHolder()) ?>" value="<?php echo $incidentes_edit->nombre_en->EditValue ?>"<?php echo $incidentes_edit->nombre_en->editAttributes() ?>>
</span>
<?php echo $incidentes_edit->nombre_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_edit->incidente_fr->Visible) { // incidente_fr ?>
	<div id="r_incidente_fr" class="form-group row">
		<label id="elh_incidentes_incidente_fr" class="<?php echo $incidentes_edit->LeftColumnClass ?>"><?php echo $incidentes_edit->incidente_fr->caption() ?><?php echo $incidentes_edit->incidente_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_edit->RightColumnClass ?>"><div <?php echo $incidentes_edit->incidente_fr->cellAttributes() ?>>
<span id="el_incidentes_incidente_fr">
<?php $incidentes_edit->incidente_fr->EditAttrs->appendClass("editor"); ?>
<textarea data-table="incidentes" data-field="x_incidente_fr" name="x_incidente_fr" id="x_incidente_fr" cols="35" rows="4" placeholder="<?php echo HtmlEncode($incidentes_edit->incidente_fr->getPlaceHolder()) ?>"<?php echo $incidentes_edit->incidente_fr->editAttributes() ?>><?php echo $incidentes_edit->incidente_fr->EditValue ?></textarea>
<script>
loadjs.ready(["fincidentesedit", "editor"], function() {
	ew.createEditor("fincidentesedit", "x_incidente_fr", 35, 4, <?php echo $incidentes_edit->incidente_fr->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $incidentes_edit->incidente_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_edit->nombre_fr->Visible) { // nombre_fr ?>
	<div id="r_nombre_fr" class="form-group row">
		<label id="elh_incidentes_nombre_fr" for="x_nombre_fr" class="<?php echo $incidentes_edit->LeftColumnClass ?>"><?php echo $incidentes_edit->nombre_fr->caption() ?><?php echo $incidentes_edit->nombre_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_edit->RightColumnClass ?>"><div <?php echo $incidentes_edit->nombre_fr->cellAttributes() ?>>
<span id="el_incidentes_nombre_fr">
<input type="text" data-table="incidentes" data-field="x_nombre_fr" name="x_nombre_fr" id="x_nombre_fr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($incidentes_edit->nombre_fr->getPlaceHolder()) ?>" value="<?php echo $incidentes_edit->nombre_fr->EditValue ?>"<?php echo $incidentes_edit->nombre_fr->editAttributes() ?>>
</span>
<?php echo $incidentes_edit->nombre_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_edit->incidente_pt->Visible) { // incidente_pt ?>
	<div id="r_incidente_pt" class="form-group row">
		<label id="elh_incidentes_incidente_pt" class="<?php echo $incidentes_edit->LeftColumnClass ?>"><?php echo $incidentes_edit->incidente_pt->caption() ?><?php echo $incidentes_edit->incidente_pt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_edit->RightColumnClass ?>"><div <?php echo $incidentes_edit->incidente_pt->cellAttributes() ?>>
<span id="el_incidentes_incidente_pt">
<?php $incidentes_edit->incidente_pt->EditAttrs->appendClass("editor"); ?>
<textarea data-table="incidentes" data-field="x_incidente_pt" name="x_incidente_pt" id="x_incidente_pt" cols="35" rows="4" placeholder="<?php echo HtmlEncode($incidentes_edit->incidente_pt->getPlaceHolder()) ?>"<?php echo $incidentes_edit->incidente_pt->editAttributes() ?>><?php echo $incidentes_edit->incidente_pt->EditValue ?></textarea>
<script>
loadjs.ready(["fincidentesedit", "editor"], function() {
	ew.createEditor("fincidentesedit", "x_incidente_pt", 35, 4, <?php echo $incidentes_edit->incidente_pt->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $incidentes_edit->incidente_pt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($incidentes_edit->nombre_pt->Visible) { // nombre_pt ?>
	<div id="r_nombre_pt" class="form-group row">
		<label id="elh_incidentes_nombre_pt" for="x_nombre_pt" class="<?php echo $incidentes_edit->LeftColumnClass ?>"><?php echo $incidentes_edit->nombre_pt->caption() ?><?php echo $incidentes_edit->nombre_pt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $incidentes_edit->RightColumnClass ?>"><div <?php echo $incidentes_edit->nombre_pt->cellAttributes() ?>>
<span id="el_incidentes_nombre_pt">
<input type="text" data-table="incidentes" data-field="x_nombre_pt" name="x_nombre_pt" id="x_nombre_pt" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($incidentes_edit->nombre_pt->getPlaceHolder()) ?>" value="<?php echo $incidentes_edit->nombre_pt->EditValue ?>"<?php echo $incidentes_edit->nombre_pt->editAttributes() ?>>
</span>
<?php echo $incidentes_edit->nombre_pt->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$incidentes_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $incidentes_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $incidentes_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$incidentes_edit->showPageFooter();
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
$incidentes_edit->terminate();
?>