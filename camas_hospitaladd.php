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
$camas_hospital_add = new camas_hospital_add();

// Run the page
$camas_hospital_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$camas_hospital_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcamas_hospitaladd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fcamas_hospitaladd = currentForm = new ew.Form("fcamas_hospitaladd", "add");

	// Validate form
	fcamas_hospitaladd.validate = function() {
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
			<?php if ($camas_hospital_add->id_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_id_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $camas_hospital_add->id_hospital->caption(), $camas_hospital_add->id_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($camas_hospital_add->c_hospitalaria->Required) { ?>
				elm = this.getElements("x" + infix + "_c_hospitalaria");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $camas_hospital_add->c_hospitalaria->caption(), $camas_hospital_add->c_hospitalaria->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_c_hospitalaria");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($camas_hospital_add->c_hospitalaria->errorMessage()) ?>");
			<?php if ($camas_hospital_add->c_uci->Required) { ?>
				elm = this.getElements("x" + infix + "_c_uci");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $camas_hospital_add->c_uci->caption(), $camas_hospital_add->c_uci->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_c_uci");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($camas_hospital_add->c_uci->errorMessage()) ?>");
			<?php if ($camas_hospital_add->c_especial->Required) { ?>
				elm = this.getElements("x" + infix + "_c_especial");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $camas_hospital_add->c_especial->caption(), $camas_hospital_add->c_especial->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_c_especial");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($camas_hospital_add->c_especial->errorMessage()) ?>");

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
	fcamas_hospitaladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcamas_hospitaladd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fcamas_hospitaladd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $camas_hospital_add->showPageHeader(); ?>
<?php
$camas_hospital_add->showMessage();
?>
<form name="fcamas_hospitaladd" id="fcamas_hospitaladd" class="<?php echo $camas_hospital_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="camas_hospital">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$camas_hospital_add->IsModal ?>">
<?php if ($camas_hospital->getCurrentMasterTable() == "hospitalesgeneral") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="hospitalesgeneral">
<input type="hidden" name="fk_id_hospital" value="<?php echo HtmlEncode($camas_hospital_add->id_hospital->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($camas_hospital_add->id_hospital->Visible) { // id_hospital ?>
	<div id="r_id_hospital" class="form-group row">
		<label id="elh_camas_hospital_id_hospital" for="x_id_hospital" class="<?php echo $camas_hospital_add->LeftColumnClass ?>"><?php echo $camas_hospital_add->id_hospital->caption() ?><?php echo $camas_hospital_add->id_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $camas_hospital_add->RightColumnClass ?>"><div <?php echo $camas_hospital_add->id_hospital->cellAttributes() ?>>
<?php if ($camas_hospital_add->id_hospital->getSessionValue() != "") { ?>
<span id="el_camas_hospital_id_hospital">
<span<?php echo $camas_hospital_add->id_hospital->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($camas_hospital_add->id_hospital->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_id_hospital" name="x_id_hospital" value="<?php echo HtmlEncode($camas_hospital_add->id_hospital->CurrentValue) ?>">
<?php } else { ?>
<span id="el_camas_hospital_id_hospital">
<input type="text" data-table="camas_hospital" data-field="x_id_hospital" name="x_id_hospital" id="x_id_hospital" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($camas_hospital_add->id_hospital->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_add->id_hospital->EditValue ?>"<?php echo $camas_hospital_add->id_hospital->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $camas_hospital_add->id_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($camas_hospital_add->c_hospitalaria->Visible) { // c_hospitalaria ?>
	<div id="r_c_hospitalaria" class="form-group row">
		<label id="elh_camas_hospital_c_hospitalaria" for="x_c_hospitalaria" class="<?php echo $camas_hospital_add->LeftColumnClass ?>"><?php echo $camas_hospital_add->c_hospitalaria->caption() ?><?php echo $camas_hospital_add->c_hospitalaria->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $camas_hospital_add->RightColumnClass ?>"><div <?php echo $camas_hospital_add->c_hospitalaria->cellAttributes() ?>>
<span id="el_camas_hospital_c_hospitalaria">
<input type="text" data-table="camas_hospital" data-field="x_c_hospitalaria" name="x_c_hospitalaria" id="x_c_hospitalaria" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_add->c_hospitalaria->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_add->c_hospitalaria->EditValue ?>"<?php echo $camas_hospital_add->c_hospitalaria->editAttributes() ?>>
</span>
<?php echo $camas_hospital_add->c_hospitalaria->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($camas_hospital_add->c_uci->Visible) { // c_uci ?>
	<div id="r_c_uci" class="form-group row">
		<label id="elh_camas_hospital_c_uci" for="x_c_uci" class="<?php echo $camas_hospital_add->LeftColumnClass ?>"><?php echo $camas_hospital_add->c_uci->caption() ?><?php echo $camas_hospital_add->c_uci->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $camas_hospital_add->RightColumnClass ?>"><div <?php echo $camas_hospital_add->c_uci->cellAttributes() ?>>
<span id="el_camas_hospital_c_uci">
<input type="text" data-table="camas_hospital" data-field="x_c_uci" name="x_c_uci" id="x_c_uci" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_add->c_uci->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_add->c_uci->EditValue ?>"<?php echo $camas_hospital_add->c_uci->editAttributes() ?>>
</span>
<?php echo $camas_hospital_add->c_uci->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($camas_hospital_add->c_especial->Visible) { // c_especial ?>
	<div id="r_c_especial" class="form-group row">
		<label id="elh_camas_hospital_c_especial" for="x_c_especial" class="<?php echo $camas_hospital_add->LeftColumnClass ?>"><?php echo $camas_hospital_add->c_especial->caption() ?><?php echo $camas_hospital_add->c_especial->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $camas_hospital_add->RightColumnClass ?>"><div <?php echo $camas_hospital_add->c_especial->cellAttributes() ?>>
<span id="el_camas_hospital_c_especial">
<input type="text" data-table="camas_hospital" data-field="x_c_especial" name="x_c_especial" id="x_c_especial" size="5" maxlength="5" placeholder="<?php echo HtmlEncode($camas_hospital_add->c_especial->getPlaceHolder()) ?>" value="<?php echo $camas_hospital_add->c_especial->EditValue ?>"<?php echo $camas_hospital_add->c_especial->editAttributes() ?>>
</span>
<?php echo $camas_hospital_add->c_especial->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$camas_hospital_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $camas_hospital_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $camas_hospital_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$camas_hospital_add->showPageFooter();
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
$camas_hospital_add->terminate();
?>