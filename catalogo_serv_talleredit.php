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
$catalogo_serv_taller_edit = new catalogo_serv_taller_edit();

// Run the page
$catalogo_serv_taller_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$catalogo_serv_taller_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcatalogo_serv_talleredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fcatalogo_serv_talleredit = currentForm = new ew.Form("fcatalogo_serv_talleredit", "edit");

	// Validate form
	fcatalogo_serv_talleredit.validate = function() {
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
			<?php if ($catalogo_serv_taller_edit->id_catalogo->Required) { ?>
				elm = this.getElements("x" + infix + "_id_catalogo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $catalogo_serv_taller_edit->id_catalogo->caption(), $catalogo_serv_taller_edit->id_catalogo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($catalogo_serv_taller_edit->servicio_en->Required) { ?>
				elm = this.getElements("x" + infix + "_servicio_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $catalogo_serv_taller_edit->servicio_en->caption(), $catalogo_serv_taller_edit->servicio_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($catalogo_serv_taller_edit->servicio_es->Required) { ?>
				elm = this.getElements("x" + infix + "_servicio_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $catalogo_serv_taller_edit->servicio_es->caption(), $catalogo_serv_taller_edit->servicio_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($catalogo_serv_taller_edit->servicio_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_servicio_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $catalogo_serv_taller_edit->servicio_pr->caption(), $catalogo_serv_taller_edit->servicio_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($catalogo_serv_taller_edit->servicio_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_servicio_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $catalogo_serv_taller_edit->servicio_fr->caption(), $catalogo_serv_taller_edit->servicio_fr->RequiredErrorMessage)) ?>");
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
	fcatalogo_serv_talleredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcatalogo_serv_talleredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fcatalogo_serv_talleredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $catalogo_serv_taller_edit->showPageHeader(); ?>
<?php
$catalogo_serv_taller_edit->showMessage();
?>
<form name="fcatalogo_serv_talleredit" id="fcatalogo_serv_talleredit" class="<?php echo $catalogo_serv_taller_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="catalogo_serv_taller">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$catalogo_serv_taller_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($catalogo_serv_taller_edit->id_catalogo->Visible) { // id_catalogo ?>
	<div id="r_id_catalogo" class="form-group row">
		<label id="elh_catalogo_serv_taller_id_catalogo" class="<?php echo $catalogo_serv_taller_edit->LeftColumnClass ?>"><?php echo $catalogo_serv_taller_edit->id_catalogo->caption() ?><?php echo $catalogo_serv_taller_edit->id_catalogo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $catalogo_serv_taller_edit->RightColumnClass ?>"><div <?php echo $catalogo_serv_taller_edit->id_catalogo->cellAttributes() ?>>
<span id="el_catalogo_serv_taller_id_catalogo">
<span<?php echo $catalogo_serv_taller_edit->id_catalogo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($catalogo_serv_taller_edit->id_catalogo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="catalogo_serv_taller" data-field="x_id_catalogo" name="x_id_catalogo" id="x_id_catalogo" value="<?php echo HtmlEncode($catalogo_serv_taller_edit->id_catalogo->CurrentValue) ?>">
<?php echo $catalogo_serv_taller_edit->id_catalogo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($catalogo_serv_taller_edit->servicio_en->Visible) { // servicio_en ?>
	<div id="r_servicio_en" class="form-group row">
		<label id="elh_catalogo_serv_taller_servicio_en" for="x_servicio_en" class="<?php echo $catalogo_serv_taller_edit->LeftColumnClass ?>"><?php echo $catalogo_serv_taller_edit->servicio_en->caption() ?><?php echo $catalogo_serv_taller_edit->servicio_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $catalogo_serv_taller_edit->RightColumnClass ?>"><div <?php echo $catalogo_serv_taller_edit->servicio_en->cellAttributes() ?>>
<span id="el_catalogo_serv_taller_servicio_en">
<input type="text" data-table="catalogo_serv_taller" data-field="x_servicio_en" name="x_servicio_en" id="x_servicio_en" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($catalogo_serv_taller_edit->servicio_en->getPlaceHolder()) ?>" value="<?php echo $catalogo_serv_taller_edit->servicio_en->EditValue ?>"<?php echo $catalogo_serv_taller_edit->servicio_en->editAttributes() ?>>
</span>
<?php echo $catalogo_serv_taller_edit->servicio_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($catalogo_serv_taller_edit->servicio_es->Visible) { // servicio_es ?>
	<div id="r_servicio_es" class="form-group row">
		<label id="elh_catalogo_serv_taller_servicio_es" for="x_servicio_es" class="<?php echo $catalogo_serv_taller_edit->LeftColumnClass ?>"><?php echo $catalogo_serv_taller_edit->servicio_es->caption() ?><?php echo $catalogo_serv_taller_edit->servicio_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $catalogo_serv_taller_edit->RightColumnClass ?>"><div <?php echo $catalogo_serv_taller_edit->servicio_es->cellAttributes() ?>>
<span id="el_catalogo_serv_taller_servicio_es">
<input type="text" data-table="catalogo_serv_taller" data-field="x_servicio_es" name="x_servicio_es" id="x_servicio_es" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($catalogo_serv_taller_edit->servicio_es->getPlaceHolder()) ?>" value="<?php echo $catalogo_serv_taller_edit->servicio_es->EditValue ?>"<?php echo $catalogo_serv_taller_edit->servicio_es->editAttributes() ?>>
</span>
<?php echo $catalogo_serv_taller_edit->servicio_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($catalogo_serv_taller_edit->servicio_pr->Visible) { // servicio_pr ?>
	<div id="r_servicio_pr" class="form-group row">
		<label id="elh_catalogo_serv_taller_servicio_pr" for="x_servicio_pr" class="<?php echo $catalogo_serv_taller_edit->LeftColumnClass ?>"><?php echo $catalogo_serv_taller_edit->servicio_pr->caption() ?><?php echo $catalogo_serv_taller_edit->servicio_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $catalogo_serv_taller_edit->RightColumnClass ?>"><div <?php echo $catalogo_serv_taller_edit->servicio_pr->cellAttributes() ?>>
<span id="el_catalogo_serv_taller_servicio_pr">
<input type="text" data-table="catalogo_serv_taller" data-field="x_servicio_pr" name="x_servicio_pr" id="x_servicio_pr" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($catalogo_serv_taller_edit->servicio_pr->getPlaceHolder()) ?>" value="<?php echo $catalogo_serv_taller_edit->servicio_pr->EditValue ?>"<?php echo $catalogo_serv_taller_edit->servicio_pr->editAttributes() ?>>
</span>
<?php echo $catalogo_serv_taller_edit->servicio_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($catalogo_serv_taller_edit->servicio_fr->Visible) { // servicio_fr ?>
	<div id="r_servicio_fr" class="form-group row">
		<label id="elh_catalogo_serv_taller_servicio_fr" for="x_servicio_fr" class="<?php echo $catalogo_serv_taller_edit->LeftColumnClass ?>"><?php echo $catalogo_serv_taller_edit->servicio_fr->caption() ?><?php echo $catalogo_serv_taller_edit->servicio_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $catalogo_serv_taller_edit->RightColumnClass ?>"><div <?php echo $catalogo_serv_taller_edit->servicio_fr->cellAttributes() ?>>
<span id="el_catalogo_serv_taller_servicio_fr">
<input type="text" data-table="catalogo_serv_taller" data-field="x_servicio_fr" name="x_servicio_fr" id="x_servicio_fr" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($catalogo_serv_taller_edit->servicio_fr->getPlaceHolder()) ?>" value="<?php echo $catalogo_serv_taller_edit->servicio_fr->EditValue ?>"<?php echo $catalogo_serv_taller_edit->servicio_fr->editAttributes() ?>>
</span>
<?php echo $catalogo_serv_taller_edit->servicio_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$catalogo_serv_taller_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $catalogo_serv_taller_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $catalogo_serv_taller_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$catalogo_serv_taller_edit->showPageFooter();
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
$catalogo_serv_taller_edit->terminate();
?>