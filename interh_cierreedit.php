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
$interh_cierre_edit = new interh_cierre_edit();

// Run the page
$interh_cierre_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_cierre_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_cierreedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	finterh_cierreedit = currentForm = new ew.Form("finterh_cierreedit", "edit");

	// Validate form
	finterh_cierreedit.validate = function() {
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
			<?php if ($interh_cierre_edit->cod_casointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_cierre_edit->cod_casointerh->caption(), $interh_cierre_edit->cod_casointerh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_cierre_edit->nombrecierre->Required) { ?>
				elm = this.getElements("x" + infix + "_nombrecierre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_cierre_edit->nombrecierre->caption(), $interh_cierre_edit->nombrecierre->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_cierre_edit->nota->Required) { ?>
				elm = this.getElements("x" + infix + "_nota");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_cierre_edit->nota->caption(), $interh_cierre_edit->nota->RequiredErrorMessage)) ?>");
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
	finterh_cierreedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_cierreedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	finterh_cierreedit.lists["x_nombrecierre"] = <?php echo $interh_cierre_edit->nombrecierre->Lookup->toClientList($interh_cierre_edit) ?>;
	finterh_cierreedit.lists["x_nombrecierre"].options = <?php echo JsonEncode($interh_cierre_edit->nombrecierre->lookupOptions()) ?>;
	loadjs.done("finterh_cierreedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $interh_cierre_edit->showPageHeader(); ?>
<?php
$interh_cierre_edit->showMessage();
?>
<form name="finterh_cierreedit" id="finterh_cierreedit" class="<?php echo $interh_cierre_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_cierre">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$interh_cierre_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($interh_cierre_edit->cod_casointerh->Visible) { // cod_casointerh ?>
	<div id="r_cod_casointerh" class="form-group row">
		<label id="elh_interh_cierre_cod_casointerh" for="x_cod_casointerh" class="<?php echo $interh_cierre_edit->LeftColumnClass ?>"><?php echo $interh_cierre_edit->cod_casointerh->caption() ?><?php echo $interh_cierre_edit->cod_casointerh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_cierre_edit->RightColumnClass ?>"><div <?php echo $interh_cierre_edit->cod_casointerh->cellAttributes() ?>>
<span id="el_interh_cierre_cod_casointerh">
<span<?php echo $interh_cierre_edit->cod_casointerh->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($interh_cierre_edit->cod_casointerh->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="interh_cierre" data-field="x_cod_casointerh" name="x_cod_casointerh" id="x_cod_casointerh" value="<?php echo HtmlEncode($interh_cierre_edit->cod_casointerh->CurrentValue) ?>">
<?php echo $interh_cierre_edit->cod_casointerh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_cierre_edit->nombrecierre->Visible) { // nombrecierre ?>
	<div id="r_nombrecierre" class="form-group row">
		<label id="elh_interh_cierre_nombrecierre" for="x_nombrecierre" class="<?php echo $interh_cierre_edit->LeftColumnClass ?>"><?php echo $interh_cierre_edit->nombrecierre->caption() ?><?php echo $interh_cierre_edit->nombrecierre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_cierre_edit->RightColumnClass ?>"><div <?php echo $interh_cierre_edit->nombrecierre->cellAttributes() ?>>
<span id="el_interh_cierre_nombrecierre">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="interh_cierre" data-field="x_nombrecierre" data-value-separator="<?php echo $interh_cierre_edit->nombrecierre->displayValueSeparatorAttribute() ?>" id="x_nombrecierre" name="x_nombrecierre"<?php echo $interh_cierre_edit->nombrecierre->editAttributes() ?>>
			<?php echo $interh_cierre_edit->nombrecierre->selectOptionListHtml("x_nombrecierre") ?>
		</select>
</div>
<?php echo $interh_cierre_edit->nombrecierre->Lookup->getParamTag($interh_cierre_edit, "p_x_nombrecierre") ?>
</span>
<?php echo $interh_cierre_edit->nombrecierre->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_cierre_edit->nota->Visible) { // nota ?>
	<div id="r_nota" class="form-group row">
		<label id="elh_interh_cierre_nota" for="x_nota" class="<?php echo $interh_cierre_edit->LeftColumnClass ?>"><?php echo $interh_cierre_edit->nota->caption() ?><?php echo $interh_cierre_edit->nota->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_cierre_edit->RightColumnClass ?>"><div <?php echo $interh_cierre_edit->nota->cellAttributes() ?>>
<span id="el_interh_cierre_nota">
<textarea data-table="interh_cierre" data-field="x_nota" name="x_nota" id="x_nota" cols="35" rows="4" placeholder="<?php echo HtmlEncode($interh_cierre_edit->nota->getPlaceHolder()) ?>"<?php echo $interh_cierre_edit->nota->editAttributes() ?>><?php echo $interh_cierre_edit->nota->EditValue ?></textarea>
</span>
<?php echo $interh_cierre_edit->nota->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="interh_cierre" data-field="x_id_cierre" name="x_id_cierre" id="x_id_cierre" value="<?php echo HtmlEncode($interh_cierre_edit->id_cierre->CurrentValue) ?>">
<?php if (!$interh_cierre_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $interh_cierre_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_cierre_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$interh_cierre_edit->showPageFooter();
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
$interh_cierre_edit->terminate();
?>