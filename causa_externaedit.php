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
$causa_externa_edit = new causa_externa_edit();

// Run the page
$causa_externa_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$causa_externa_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcausa_externaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fcausa_externaedit = currentForm = new ew.Form("fcausa_externaedit", "edit");

	// Validate form
	fcausa_externaedit.validate = function() {
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
			<?php if ($causa_externa_edit->id_causa->Required) { ?>
				elm = this.getElements("x" + infix + "_id_causa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $causa_externa_edit->id_causa->caption(), $causa_externa_edit->id_causa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($causa_externa_edit->nom_causa->Required) { ?>
				elm = this.getElements("x" + infix + "_nom_causa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $causa_externa_edit->nom_causa->caption(), $causa_externa_edit->nom_causa->RequiredErrorMessage)) ?>");
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
	fcausa_externaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcausa_externaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fcausa_externaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $causa_externa_edit->showPageHeader(); ?>
<?php
$causa_externa_edit->showMessage();
?>
<form name="fcausa_externaedit" id="fcausa_externaedit" class="<?php echo $causa_externa_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="causa_externa">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$causa_externa_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($causa_externa_edit->id_causa->Visible) { // id_causa ?>
	<div id="r_id_causa" class="form-group row">
		<label id="elh_causa_externa_id_causa" class="<?php echo $causa_externa_edit->LeftColumnClass ?>"><?php echo $causa_externa_edit->id_causa->caption() ?><?php echo $causa_externa_edit->id_causa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $causa_externa_edit->RightColumnClass ?>"><div <?php echo $causa_externa_edit->id_causa->cellAttributes() ?>>
<span id="el_causa_externa_id_causa">
<span<?php echo $causa_externa_edit->id_causa->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($causa_externa_edit->id_causa->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="causa_externa" data-field="x_id_causa" name="x_id_causa" id="x_id_causa" value="<?php echo HtmlEncode($causa_externa_edit->id_causa->CurrentValue) ?>">
<?php echo $causa_externa_edit->id_causa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($causa_externa_edit->nom_causa->Visible) { // nom_causa ?>
	<div id="r_nom_causa" class="form-group row">
		<label id="elh_causa_externa_nom_causa" for="x_nom_causa" class="<?php echo $causa_externa_edit->LeftColumnClass ?>"><?php echo $causa_externa_edit->nom_causa->caption() ?><?php echo $causa_externa_edit->nom_causa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $causa_externa_edit->RightColumnClass ?>"><div <?php echo $causa_externa_edit->nom_causa->cellAttributes() ?>>
<span id="el_causa_externa_nom_causa">
<input type="text" data-table="causa_externa" data-field="x_nom_causa" name="x_nom_causa" id="x_nom_causa" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($causa_externa_edit->nom_causa->getPlaceHolder()) ?>" value="<?php echo $causa_externa_edit->nom_causa->EditValue ?>"<?php echo $causa_externa_edit->nom_causa->editAttributes() ?>>
</span>
<?php echo $causa_externa_edit->nom_causa->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$causa_externa_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $causa_externa_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $causa_externa_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$causa_externa_edit->showPageFooter();
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
$causa_externa_edit->terminate();
?>