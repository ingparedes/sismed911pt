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
$especial_ambulancia_edit = new especial_ambulancia_edit();

// Run the page
$especial_ambulancia_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$especial_ambulancia_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fespecial_ambulanciaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fespecial_ambulanciaedit = currentForm = new ew.Form("fespecial_ambulanciaedit", "edit");

	// Validate form
	fespecial_ambulanciaedit.validate = function() {
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
			<?php if ($especial_ambulancia_edit->id_especialambulancia->Required) { ?>
				elm = this.getElements("x" + infix + "_id_especialambulancia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_edit->id_especialambulancia->caption(), $especial_ambulancia_edit->id_especialambulancia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especial_ambulancia_edit->especial_es->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_edit->especial_es->caption(), $especial_ambulancia_edit->especial_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especial_ambulancia_edit->especial_en->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_edit->especial_en->caption(), $especial_ambulancia_edit->especial_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especial_ambulancia_edit->especial_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_edit->especial_pr->caption(), $especial_ambulancia_edit->especial_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especial_ambulancia_edit->especial_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_edit->especial_fr->caption(), $especial_ambulancia_edit->especial_fr->RequiredErrorMessage)) ?>");
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
	fespecial_ambulanciaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fespecial_ambulanciaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fespecial_ambulanciaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $especial_ambulancia_edit->showPageHeader(); ?>
<?php
$especial_ambulancia_edit->showMessage();
?>
<form name="fespecial_ambulanciaedit" id="fespecial_ambulanciaedit" class="<?php echo $especial_ambulancia_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="especial_ambulancia">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$especial_ambulancia_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($especial_ambulancia_edit->id_especialambulancia->Visible) { // id_especialambulancia ?>
	<div id="r_id_especialambulancia" class="form-group row">
		<label id="elh_especial_ambulancia_id_especialambulancia" class="<?php echo $especial_ambulancia_edit->LeftColumnClass ?>"><?php echo $especial_ambulancia_edit->id_especialambulancia->caption() ?><?php echo $especial_ambulancia_edit->id_especialambulancia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especial_ambulancia_edit->RightColumnClass ?>"><div <?php echo $especial_ambulancia_edit->id_especialambulancia->cellAttributes() ?>>
<span id="el_especial_ambulancia_id_especialambulancia">
<span<?php echo $especial_ambulancia_edit->id_especialambulancia->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($especial_ambulancia_edit->id_especialambulancia->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="especial_ambulancia" data-field="x_id_especialambulancia" name="x_id_especialambulancia" id="x_id_especialambulancia" value="<?php echo HtmlEncode($especial_ambulancia_edit->id_especialambulancia->CurrentValue) ?>">
<?php echo $especial_ambulancia_edit->id_especialambulancia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($especial_ambulancia_edit->especial_es->Visible) { // especial_es ?>
	<div id="r_especial_es" class="form-group row">
		<label id="elh_especial_ambulancia_especial_es" for="x_especial_es" class="<?php echo $especial_ambulancia_edit->LeftColumnClass ?>"><?php echo $especial_ambulancia_edit->especial_es->caption() ?><?php echo $especial_ambulancia_edit->especial_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especial_ambulancia_edit->RightColumnClass ?>"><div <?php echo $especial_ambulancia_edit->especial_es->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_es">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_es" name="x_especial_es" id="x_especial_es" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_edit->especial_es->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_edit->especial_es->EditValue ?>"<?php echo $especial_ambulancia_edit->especial_es->editAttributes() ?>>
</span>
<?php echo $especial_ambulancia_edit->especial_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($especial_ambulancia_edit->especial_en->Visible) { // especial_en ?>
	<div id="r_especial_en" class="form-group row">
		<label id="elh_especial_ambulancia_especial_en" for="x_especial_en" class="<?php echo $especial_ambulancia_edit->LeftColumnClass ?>"><?php echo $especial_ambulancia_edit->especial_en->caption() ?><?php echo $especial_ambulancia_edit->especial_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especial_ambulancia_edit->RightColumnClass ?>"><div <?php echo $especial_ambulancia_edit->especial_en->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_en">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_en" name="x_especial_en" id="x_especial_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_edit->especial_en->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_edit->especial_en->EditValue ?>"<?php echo $especial_ambulancia_edit->especial_en->editAttributes() ?>>
</span>
<?php echo $especial_ambulancia_edit->especial_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($especial_ambulancia_edit->especial_pr->Visible) { // especial_pr ?>
	<div id="r_especial_pr" class="form-group row">
		<label id="elh_especial_ambulancia_especial_pr" for="x_especial_pr" class="<?php echo $especial_ambulancia_edit->LeftColumnClass ?>"><?php echo $especial_ambulancia_edit->especial_pr->caption() ?><?php echo $especial_ambulancia_edit->especial_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especial_ambulancia_edit->RightColumnClass ?>"><div <?php echo $especial_ambulancia_edit->especial_pr->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_pr">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_pr" name="x_especial_pr" id="x_especial_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_edit->especial_pr->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_edit->especial_pr->EditValue ?>"<?php echo $especial_ambulancia_edit->especial_pr->editAttributes() ?>>
</span>
<?php echo $especial_ambulancia_edit->especial_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($especial_ambulancia_edit->especial_fr->Visible) { // especial_fr ?>
	<div id="r_especial_fr" class="form-group row">
		<label id="elh_especial_ambulancia_especial_fr" for="x_especial_fr" class="<?php echo $especial_ambulancia_edit->LeftColumnClass ?>"><?php echo $especial_ambulancia_edit->especial_fr->caption() ?><?php echo $especial_ambulancia_edit->especial_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especial_ambulancia_edit->RightColumnClass ?>"><div <?php echo $especial_ambulancia_edit->especial_fr->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_fr">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_fr" name="x_especial_fr" id="x_especial_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_edit->especial_fr->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_edit->especial_fr->EditValue ?>"<?php echo $especial_ambulancia_edit->especial_fr->editAttributes() ?>>
</span>
<?php echo $especial_ambulancia_edit->especial_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$especial_ambulancia_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $especial_ambulancia_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $especial_ambulancia_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$especial_ambulancia_edit->showPageFooter();
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
$especial_ambulancia_edit->terminate();
?>