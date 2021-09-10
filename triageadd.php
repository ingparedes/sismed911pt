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
$triage_add = new triage_add();

// Run the page
$triage_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$triage_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftriageadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ftriageadd = currentForm = new ew.Form("ftriageadd", "add");

	// Validate form
	ftriageadd.validate = function() {
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
			<?php if ($triage_add->nombre_triage_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_triage_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $triage_add->nombre_triage_es->caption(), $triage_add->nombre_triage_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($triage_add->nombre_triage_en->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_triage_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $triage_add->nombre_triage_en->caption(), $triage_add->nombre_triage_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($triage_add->nombre_triage_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_triage_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $triage_add->nombre_triage_pr->caption(), $triage_add->nombre_triage_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($triage_add->nombre_triage_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_triage_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $triage_add->nombre_triage_fr->caption(), $triage_add->nombre_triage_fr->RequiredErrorMessage)) ?>");
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
	ftriageadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftriageadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ftriageadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $triage_add->showPageHeader(); ?>
<?php
$triage_add->showMessage();
?>
<form name="ftriageadd" id="ftriageadd" class="<?php echo $triage_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="triage">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$triage_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($triage_add->nombre_triage_es->Visible) { // nombre_triage_es ?>
	<div id="r_nombre_triage_es" class="form-group row">
		<label id="elh_triage_nombre_triage_es" for="x_nombre_triage_es" class="<?php echo $triage_add->LeftColumnClass ?>"><?php echo $triage_add->nombre_triage_es->caption() ?><?php echo $triage_add->nombre_triage_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $triage_add->RightColumnClass ?>"><div <?php echo $triage_add->nombre_triage_es->cellAttributes() ?>>
<span id="el_triage_nombre_triage_es">
<input type="text" data-table="triage" data-field="x_nombre_triage_es" name="x_nombre_triage_es" id="x_nombre_triage_es" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($triage_add->nombre_triage_es->getPlaceHolder()) ?>" value="<?php echo $triage_add->nombre_triage_es->EditValue ?>"<?php echo $triage_add->nombre_triage_es->editAttributes() ?>>
</span>
<?php echo $triage_add->nombre_triage_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($triage_add->nombre_triage_en->Visible) { // nombre_triage_en ?>
	<div id="r_nombre_triage_en" class="form-group row">
		<label id="elh_triage_nombre_triage_en" for="x_nombre_triage_en" class="<?php echo $triage_add->LeftColumnClass ?>"><?php echo $triage_add->nombre_triage_en->caption() ?><?php echo $triage_add->nombre_triage_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $triage_add->RightColumnClass ?>"><div <?php echo $triage_add->nombre_triage_en->cellAttributes() ?>>
<span id="el_triage_nombre_triage_en">
<input type="text" data-table="triage" data-field="x_nombre_triage_en" name="x_nombre_triage_en" id="x_nombre_triage_en" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($triage_add->nombre_triage_en->getPlaceHolder()) ?>" value="<?php echo $triage_add->nombre_triage_en->EditValue ?>"<?php echo $triage_add->nombre_triage_en->editAttributes() ?>>
</span>
<?php echo $triage_add->nombre_triage_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($triage_add->nombre_triage_pr->Visible) { // nombre_triage_pr ?>
	<div id="r_nombre_triage_pr" class="form-group row">
		<label id="elh_triage_nombre_triage_pr" for="x_nombre_triage_pr" class="<?php echo $triage_add->LeftColumnClass ?>"><?php echo $triage_add->nombre_triage_pr->caption() ?><?php echo $triage_add->nombre_triage_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $triage_add->RightColumnClass ?>"><div <?php echo $triage_add->nombre_triage_pr->cellAttributes() ?>>
<span id="el_triage_nombre_triage_pr">
<input type="text" data-table="triage" data-field="x_nombre_triage_pr" name="x_nombre_triage_pr" id="x_nombre_triage_pr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($triage_add->nombre_triage_pr->getPlaceHolder()) ?>" value="<?php echo $triage_add->nombre_triage_pr->EditValue ?>"<?php echo $triage_add->nombre_triage_pr->editAttributes() ?>>
</span>
<?php echo $triage_add->nombre_triage_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($triage_add->nombre_triage_fr->Visible) { // nombre_triage_fr ?>
	<div id="r_nombre_triage_fr" class="form-group row">
		<label id="elh_triage_nombre_triage_fr" for="x_nombre_triage_fr" class="<?php echo $triage_add->LeftColumnClass ?>"><?php echo $triage_add->nombre_triage_fr->caption() ?><?php echo $triage_add->nombre_triage_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $triage_add->RightColumnClass ?>"><div <?php echo $triage_add->nombre_triage_fr->cellAttributes() ?>>
<span id="el_triage_nombre_triage_fr">
<input type="text" data-table="triage" data-field="x_nombre_triage_fr" name="x_nombre_triage_fr" id="x_nombre_triage_fr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($triage_add->nombre_triage_fr->getPlaceHolder()) ?>" value="<?php echo $triage_add->nombre_triage_fr->EditValue ?>"<?php echo $triage_add->nombre_triage_fr->editAttributes() ?>>
</span>
<?php echo $triage_add->nombre_triage_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$triage_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $triage_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $triage_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$triage_add->showPageFooter();
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
$triage_add->terminate();
?>