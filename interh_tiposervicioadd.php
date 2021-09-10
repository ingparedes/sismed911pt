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
$interh_tiposervicio_add = new interh_tiposervicio_add();

// Run the page
$interh_tiposervicio_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_tiposervicio_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_tiposervicioadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	finterh_tiposervicioadd = currentForm = new ew.Form("finterh_tiposervicioadd", "add");

	// Validate form
	finterh_tiposervicioadd.validate = function() {
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
			<?php if ($interh_tiposervicio_add->nombre_tiposervicion_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_tiposervicion_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_tiposervicio_add->nombre_tiposervicion_es->caption(), $interh_tiposervicio_add->nombre_tiposervicion_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_tiposervicio_add->nombre_tiposervicion_en->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_tiposervicion_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_tiposervicio_add->nombre_tiposervicion_en->caption(), $interh_tiposervicio_add->nombre_tiposervicion_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_tiposervicio_add->nombre_tiposervicion_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_tiposervicion_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_tiposervicio_add->nombre_tiposervicion_fr->caption(), $interh_tiposervicio_add->nombre_tiposervicion_fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_tiposervicio_add->nombre_tiposervicion_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_tiposervicion_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_tiposervicio_add->nombre_tiposervicion_pr->caption(), $interh_tiposervicio_add->nombre_tiposervicion_pr->RequiredErrorMessage)) ?>");
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
	finterh_tiposervicioadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_tiposervicioadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("finterh_tiposervicioadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_tiposervicio_add->showPageHeader(); ?>
<?php
$interh_tiposervicio_add->showMessage();
?>
<form name="finterh_tiposervicioadd" id="finterh_tiposervicioadd" class="<?php echo $interh_tiposervicio_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_tiposervicio">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$interh_tiposervicio_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($interh_tiposervicio_add->nombre_tiposervicion_es->Visible) { // nombre_tiposervicion_es ?>
	<div id="r_nombre_tiposervicion_es" class="form-group row">
		<label id="elh_interh_tiposervicio_nombre_tiposervicion_es" for="x_nombre_tiposervicion_es" class="<?php echo $interh_tiposervicio_add->LeftColumnClass ?>"><?php echo $interh_tiposervicio_add->nombre_tiposervicion_es->caption() ?><?php echo $interh_tiposervicio_add->nombre_tiposervicion_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_tiposervicio_add->RightColumnClass ?>"><div <?php echo $interh_tiposervicio_add->nombre_tiposervicion_es->cellAttributes() ?>>
<span id="el_interh_tiposervicio_nombre_tiposervicion_es">
<input type="text" data-table="interh_tiposervicio" data-field="x_nombre_tiposervicion_es" name="x_nombre_tiposervicion_es" id="x_nombre_tiposervicion_es" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_tiposervicio_add->nombre_tiposervicion_es->getPlaceHolder()) ?>" value="<?php echo $interh_tiposervicio_add->nombre_tiposervicion_es->EditValue ?>"<?php echo $interh_tiposervicio_add->nombre_tiposervicion_es->editAttributes() ?>>
</span>
<?php echo $interh_tiposervicio_add->nombre_tiposervicion_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_tiposervicio_add->nombre_tiposervicion_en->Visible) { // nombre_tiposervicion_en ?>
	<div id="r_nombre_tiposervicion_en" class="form-group row">
		<label id="elh_interh_tiposervicio_nombre_tiposervicion_en" for="x_nombre_tiposervicion_en" class="<?php echo $interh_tiposervicio_add->LeftColumnClass ?>"><?php echo $interh_tiposervicio_add->nombre_tiposervicion_en->caption() ?><?php echo $interh_tiposervicio_add->nombre_tiposervicion_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_tiposervicio_add->RightColumnClass ?>"><div <?php echo $interh_tiposervicio_add->nombre_tiposervicion_en->cellAttributes() ?>>
<span id="el_interh_tiposervicio_nombre_tiposervicion_en">
<input type="text" data-table="interh_tiposervicio" data-field="x_nombre_tiposervicion_en" name="x_nombre_tiposervicion_en" id="x_nombre_tiposervicion_en" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_tiposervicio_add->nombre_tiposervicion_en->getPlaceHolder()) ?>" value="<?php echo $interh_tiposervicio_add->nombre_tiposervicion_en->EditValue ?>"<?php echo $interh_tiposervicio_add->nombre_tiposervicion_en->editAttributes() ?>>
</span>
<?php echo $interh_tiposervicio_add->nombre_tiposervicion_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_tiposervicio_add->nombre_tiposervicion_fr->Visible) { // nombre_tiposervicion_fr ?>
	<div id="r_nombre_tiposervicion_fr" class="form-group row">
		<label id="elh_interh_tiposervicio_nombre_tiposervicion_fr" for="x_nombre_tiposervicion_fr" class="<?php echo $interh_tiposervicio_add->LeftColumnClass ?>"><?php echo $interh_tiposervicio_add->nombre_tiposervicion_fr->caption() ?><?php echo $interh_tiposervicio_add->nombre_tiposervicion_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_tiposervicio_add->RightColumnClass ?>"><div <?php echo $interh_tiposervicio_add->nombre_tiposervicion_fr->cellAttributes() ?>>
<span id="el_interh_tiposervicio_nombre_tiposervicion_fr">
<input type="text" data-table="interh_tiposervicio" data-field="x_nombre_tiposervicion_fr" name="x_nombre_tiposervicion_fr" id="x_nombre_tiposervicion_fr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_tiposervicio_add->nombre_tiposervicion_fr->getPlaceHolder()) ?>" value="<?php echo $interh_tiposervicio_add->nombre_tiposervicion_fr->EditValue ?>"<?php echo $interh_tiposervicio_add->nombre_tiposervicion_fr->editAttributes() ?>>
</span>
<?php echo $interh_tiposervicio_add->nombre_tiposervicion_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_tiposervicio_add->nombre_tiposervicion_pr->Visible) { // nombre_tiposervicion_pr ?>
	<div id="r_nombre_tiposervicion_pr" class="form-group row">
		<label id="elh_interh_tiposervicio_nombre_tiposervicion_pr" for="x_nombre_tiposervicion_pr" class="<?php echo $interh_tiposervicio_add->LeftColumnClass ?>"><?php echo $interh_tiposervicio_add->nombre_tiposervicion_pr->caption() ?><?php echo $interh_tiposervicio_add->nombre_tiposervicion_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_tiposervicio_add->RightColumnClass ?>"><div <?php echo $interh_tiposervicio_add->nombre_tiposervicion_pr->cellAttributes() ?>>
<span id="el_interh_tiposervicio_nombre_tiposervicion_pr">
<input type="text" data-table="interh_tiposervicio" data-field="x_nombre_tiposervicion_pr" name="x_nombre_tiposervicion_pr" id="x_nombre_tiposervicion_pr" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_tiposervicio_add->nombre_tiposervicion_pr->getPlaceHolder()) ?>" value="<?php echo $interh_tiposervicio_add->nombre_tiposervicion_pr->EditValue ?>"<?php echo $interh_tiposervicio_add->nombre_tiposervicion_pr->editAttributes() ?>>
</span>
<?php echo $interh_tiposervicio_add->nombre_tiposervicion_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$interh_tiposervicio_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $interh_tiposervicio_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_tiposervicio_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$interh_tiposervicio_add->showPageFooter();
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
$interh_tiposervicio_add->terminate();
?>