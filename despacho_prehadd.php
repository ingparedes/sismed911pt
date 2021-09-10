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
$despacho_preh_add = new despacho_preh_add();

// Run the page
$despacho_preh_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$despacho_preh_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdespacho_prehadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fdespacho_prehadd = currentForm = new ew.Form("fdespacho_prehadd", "add");

	// Validate form
	fdespacho_prehadd.validate = function() {
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
			<?php if ($despacho_preh_add->fechahoradespacho->Required) { ?>
				elm = this.getElements("x" + infix + "_fechahoradespacho");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $despacho_preh_add->fechahoradespacho->caption(), $despacho_preh_add->fechahoradespacho->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($despacho_preh_add->cod_caso->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_caso");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $despacho_preh_add->cod_caso->caption(), $despacho_preh_add->cod_caso->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($despacho_preh_add->nota->Required) { ?>
				elm = this.getElements("x" + infix + "_nota");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $despacho_preh_add->nota->caption(), $despacho_preh_add->nota->RequiredErrorMessage)) ?>");
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
	fdespacho_prehadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdespacho_prehadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fdespacho_prehadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $despacho_preh_add->showPageHeader(); ?>
<?php
$despacho_preh_add->showMessage();
?>
<form name="fdespacho_prehadd" id="fdespacho_prehadd" class="<?php echo $despacho_preh_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="despacho_preh">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$despacho_preh_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($despacho_preh_add->cod_caso->Visible) { // cod_caso ?>
	<div id="r_cod_caso" class="form-group row">
		<label id="elh_despacho_preh_cod_caso" class="<?php echo $despacho_preh_add->LeftColumnClass ?>"><script id="tpc_despacho_preh_cod_caso" type="text/html"><?php echo $despacho_preh_add->cod_caso->caption() ?><?php echo $despacho_preh_add->cod_caso->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $despacho_preh_add->RightColumnClass ?>"><div <?php echo $despacho_preh_add->cod_caso->cellAttributes() ?>>
<script id="tpx_despacho_preh_cod_caso" type="text/html"><span id="el_despacho_preh_cod_caso">
<input type="text" data-table="despacho_preh" data-field="x_cod_caso" name="x_cod_caso" id="x_cod_caso" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($despacho_preh_add->cod_caso->getPlaceHolder()) ?>" value="<?php echo $despacho_preh_add->cod_caso->EditValue ?>"<?php echo $despacho_preh_add->cod_caso->editAttributes() ?>>
</span></script>
<?php echo $despacho_preh_add->cod_caso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($despacho_preh_add->nota->Visible) { // nota ?>
	<div id="r_nota" class="form-group row">
		<label id="elh_despacho_preh_nota" for="x_nota" class="<?php echo $despacho_preh_add->LeftColumnClass ?>"><script id="tpc_despacho_preh_nota" type="text/html"><?php echo $despacho_preh_add->nota->caption() ?><?php echo $despacho_preh_add->nota->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $despacho_preh_add->RightColumnClass ?>"><div <?php echo $despacho_preh_add->nota->cellAttributes() ?>>
<script id="tpx_despacho_preh_nota" type="text/html"><span id="el_despacho_preh_nota">
<textarea data-table="despacho_preh" data-field="x_nota" name="x_nota" id="x_nota" cols="35" rows="4" placeholder="<?php echo HtmlEncode($despacho_preh_add->nota->getPlaceHolder()) ?>"<?php echo $despacho_preh_add->nota->editAttributes() ?>><?php echo $despacho_preh_add->nota->EditValue ?></textarea>
</span></script>
<?php echo $despacho_preh_add->nota->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_despacho_prehadd" class="ew-custom-template"></div>
<script id="tpm_despacho_prehadd" type="text/html">
<div id="ct_despacho_preh_add">{{include tmpl=~getTemplate("#tpx_despacho_preh_cod_caso")/}}
{{include tmpl="#tpc_despacho_preh_nota"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_despacho_preh_nota")/}}
</div>
</script>

<?php if (!$despacho_preh_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $despacho_preh_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $despacho_preh_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($despacho_preh->Rows) ?> };
	ew.applyTemplate("tpd_despacho_prehadd", "tpm_despacho_prehadd", "despacho_prehadd", "<?php echo $despacho_preh->CustomExport ?>", ew.templateData.rows[0]);
	$("script.despacho_prehadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$despacho_preh_add->showPageFooter();
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
$despacho_preh_add->terminate();
?>