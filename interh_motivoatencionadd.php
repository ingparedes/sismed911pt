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
$interh_motivoatencion_add = new interh_motivoatencion_add();

// Run the page
$interh_motivoatencion_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_motivoatencion_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_motivoatencionadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	finterh_motivoatencionadd = currentForm = new ew.Form("finterh_motivoatencionadd", "add");

	// Validate form
	finterh_motivoatencionadd.validate = function() {
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
			<?php if ($interh_motivoatencion_add->nombre_motivo_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_motivo_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_motivoatencion_add->nombre_motivo_es->caption(), $interh_motivoatencion_add->nombre_motivo_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_motivoatencion_add->nombre_motivo_en->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_motivo_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_motivoatencion_add->nombre_motivo_en->caption(), $interh_motivoatencion_add->nombre_motivo_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_motivoatencion_add->nombre_motivo_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_motivo_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_motivoatencion_add->nombre_motivo_fr->caption(), $interh_motivoatencion_add->nombre_motivo_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_motivoatencion_add->nombre_motivo_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_motivo_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_motivoatencion_add->nombre_motivo_pr->caption(), $interh_motivoatencion_add->nombre_motivo_pr->RequiredErrorMessage)) ?>");
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
	finterh_motivoatencionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_motivoatencionadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("finterh_motivoatencionadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_motivoatencion_add->showPageHeader(); ?>
<?php
$interh_motivoatencion_add->showMessage();
?>
<form name="finterh_motivoatencionadd" id="finterh_motivoatencionadd" class="<?php echo $interh_motivoatencion_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_motivoatencion">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$interh_motivoatencion_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($interh_motivoatencion_add->nombre_motivo_es->Visible) { // nombre_motivo_es ?>
	<div id="r_nombre_motivo_es" class="form-group row">
		<label id="elh_interh_motivoatencion_nombre_motivo_es" for="x_nombre_motivo_es" class="<?php echo $interh_motivoatencion_add->LeftColumnClass ?>"><?php echo $interh_motivoatencion_add->nombre_motivo_es->caption() ?><?php echo $interh_motivoatencion_add->nombre_motivo_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_motivoatencion_add->RightColumnClass ?>"><div <?php echo $interh_motivoatencion_add->nombre_motivo_es->cellAttributes() ?>>
<span id="el_interh_motivoatencion_nombre_motivo_es">
<input type="text" data-table="interh_motivoatencion" data-field="x_nombre_motivo_es" name="x_nombre_motivo_es" id="x_nombre_motivo_es" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($interh_motivoatencion_add->nombre_motivo_es->getPlaceHolder()) ?>" value="<?php echo $interh_motivoatencion_add->nombre_motivo_es->EditValue ?>"<?php echo $interh_motivoatencion_add->nombre_motivo_es->editAttributes() ?>>
</span>
<?php echo $interh_motivoatencion_add->nombre_motivo_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_motivoatencion_add->nombre_motivo_en->Visible) { // nombre_motivo_en ?>
	<div id="r_nombre_motivo_en" class="form-group row">
		<label id="elh_interh_motivoatencion_nombre_motivo_en" for="x_nombre_motivo_en" class="<?php echo $interh_motivoatencion_add->LeftColumnClass ?>"><?php echo $interh_motivoatencion_add->nombre_motivo_en->caption() ?><?php echo $interh_motivoatencion_add->nombre_motivo_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_motivoatencion_add->RightColumnClass ?>"><div <?php echo $interh_motivoatencion_add->nombre_motivo_en->cellAttributes() ?>>
<span id="el_interh_motivoatencion_nombre_motivo_en">
<input type="text" data-table="interh_motivoatencion" data-field="x_nombre_motivo_en" name="x_nombre_motivo_en" id="x_nombre_motivo_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($interh_motivoatencion_add->nombre_motivo_en->getPlaceHolder()) ?>" value="<?php echo $interh_motivoatencion_add->nombre_motivo_en->EditValue ?>"<?php echo $interh_motivoatencion_add->nombre_motivo_en->editAttributes() ?>>
</span>
<?php echo $interh_motivoatencion_add->nombre_motivo_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_motivoatencion_add->nombre_motivo_fr->Visible) { // nombre_motivo_fr ?>
	<div id="r_nombre_motivo_fr" class="form-group row">
		<label id="elh_interh_motivoatencion_nombre_motivo_fr" for="x_nombre_motivo_fr" class="<?php echo $interh_motivoatencion_add->LeftColumnClass ?>"><?php echo $interh_motivoatencion_add->nombre_motivo_fr->caption() ?><?php echo $interh_motivoatencion_add->nombre_motivo_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_motivoatencion_add->RightColumnClass ?>"><div <?php echo $interh_motivoatencion_add->nombre_motivo_fr->cellAttributes() ?>>
<span id="el_interh_motivoatencion_nombre_motivo_fr">
<input type="text" data-table="interh_motivoatencion" data-field="x_nombre_motivo_fr" name="x_nombre_motivo_fr" id="x_nombre_motivo_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($interh_motivoatencion_add->nombre_motivo_fr->getPlaceHolder()) ?>" value="<?php echo $interh_motivoatencion_add->nombre_motivo_fr->EditValue ?>"<?php echo $interh_motivoatencion_add->nombre_motivo_fr->editAttributes() ?>>
</span>
<?php echo $interh_motivoatencion_add->nombre_motivo_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_motivoatencion_add->nombre_motivo_pr->Visible) { // nombre_motivo_pr ?>
	<div id="r_nombre_motivo_pr" class="form-group row">
		<label id="elh_interh_motivoatencion_nombre_motivo_pr" for="x_nombre_motivo_pr" class="<?php echo $interh_motivoatencion_add->LeftColumnClass ?>"><?php echo $interh_motivoatencion_add->nombre_motivo_pr->caption() ?><?php echo $interh_motivoatencion_add->nombre_motivo_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_motivoatencion_add->RightColumnClass ?>"><div <?php echo $interh_motivoatencion_add->nombre_motivo_pr->cellAttributes() ?>>
<span id="el_interh_motivoatencion_nombre_motivo_pr">
<input type="text" data-table="interh_motivoatencion" data-field="x_nombre_motivo_pr" name="x_nombre_motivo_pr" id="x_nombre_motivo_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($interh_motivoatencion_add->nombre_motivo_pr->getPlaceHolder()) ?>" value="<?php echo $interh_motivoatencion_add->nombre_motivo_pr->EditValue ?>"<?php echo $interh_motivoatencion_add->nombre_motivo_pr->editAttributes() ?>>
</span>
<?php echo $interh_motivoatencion_add->nombre_motivo_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$interh_motivoatencion_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $interh_motivoatencion_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_motivoatencion_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$interh_motivoatencion_add->showPageFooter();
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
$interh_motivoatencion_add->terminate();
?>