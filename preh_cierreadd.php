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
$preh_cierre_add = new preh_cierre_add();

// Run the page
$preh_cierre_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_cierre_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_cierreadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpreh_cierreadd = currentForm = new ew.Form("fpreh_cierreadd", "add");

	// Validate form
	fpreh_cierreadd.validate = function() {
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
			<?php if ($preh_cierre_add->nombrecierre->Required) { ?>
				elm = this.getElements("x" + infix + "_nombrecierre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_cierre_add->nombrecierre->caption(), $preh_cierre_add->nombrecierre->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_cierre_add->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_cierre_add->cod_casopreh->caption(), $preh_cierre_add->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_cierre_add->nota->Required) { ?>
				elm = this.getElements("x" + infix + "_nota");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_cierre_add->nota->caption(), $preh_cierre_add->nota->RequiredErrorMessage)) ?>");
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
	fpreh_cierreadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpreh_cierreadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpreh_cierreadd.lists["x_nombrecierre"] = <?php echo $preh_cierre_add->nombrecierre->Lookup->toClientList($preh_cierre_add) ?>;
	fpreh_cierreadd.lists["x_nombrecierre"].options = <?php echo JsonEncode($preh_cierre_add->nombrecierre->lookupOptions()) ?>;
	loadjs.done("fpreh_cierreadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $preh_cierre_add->showPageHeader(); ?>
<?php
$preh_cierre_add->showMessage();
?>
<form name="fpreh_cierreadd" id="fpreh_cierreadd" class="<?php echo $preh_cierre_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_cierre">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$preh_cierre_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($preh_cierre_add->nombrecierre->Visible) { // nombrecierre ?>
	<div id="r_nombrecierre" class="form-group row">
		<label id="elh_preh_cierre_nombrecierre" for="x_nombrecierre" class="<?php echo $preh_cierre_add->LeftColumnClass ?>"><script id="tpc_preh_cierre_nombrecierre" type="text/html"><?php echo $preh_cierre_add->nombrecierre->caption() ?><?php echo $preh_cierre_add->nombrecierre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_cierre_add->RightColumnClass ?>"><div <?php echo $preh_cierre_add->nombrecierre->cellAttributes() ?>>
<script id="tpx_preh_cierre_nombrecierre" type="text/html"><span id="el_preh_cierre_nombrecierre">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="preh_cierre" data-field="x_nombrecierre" data-value-separator="<?php echo $preh_cierre_add->nombrecierre->displayValueSeparatorAttribute() ?>" id="x_nombrecierre" name="x_nombrecierre"<?php echo $preh_cierre_add->nombrecierre->editAttributes() ?>>
			<?php echo $preh_cierre_add->nombrecierre->selectOptionListHtml("x_nombrecierre") ?>
		</select>
</div>
<?php echo $preh_cierre_add->nombrecierre->Lookup->getParamTag($preh_cierre_add, "p_x_nombrecierre") ?>
</span></script>
<?php echo $preh_cierre_add->nombrecierre->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_cierre_add->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_preh_cierre_cod_casopreh" class="<?php echo $preh_cierre_add->LeftColumnClass ?>"><script id="tpc_preh_cierre_cod_casopreh" type="text/html"><?php echo $preh_cierre_add->cod_casopreh->caption() ?><?php echo $preh_cierre_add->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_cierre_add->RightColumnClass ?>"><div <?php echo $preh_cierre_add->cod_casopreh->cellAttributes() ?>>
<script id="tpx_preh_cierre_cod_casopreh" type="text/html"><span id="el_preh_cierre_cod_casopreh">
<input type="text" data-table="preh_cierre" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($preh_cierre_add->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $preh_cierre_add->cod_casopreh->EditValue ?>"<?php echo $preh_cierre_add->cod_casopreh->editAttributes() ?>>
</span></script>
<?php echo $preh_cierre_add->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_cierre_add->nota->Visible) { // nota ?>
	<div id="r_nota" class="form-group row">
		<label id="elh_preh_cierre_nota" for="x_nota" class="<?php echo $preh_cierre_add->LeftColumnClass ?>"><script id="tpc_preh_cierre_nota" type="text/html"><?php echo $preh_cierre_add->nota->caption() ?><?php echo $preh_cierre_add->nota->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_cierre_add->RightColumnClass ?>"><div <?php echo $preh_cierre_add->nota->cellAttributes() ?>>
<script id="tpx_preh_cierre_nota" type="text/html"><span id="el_preh_cierre_nota">
<textarea data-table="preh_cierre" data-field="x_nota" name="x_nota" id="x_nota" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_cierre_add->nota->getPlaceHolder()) ?>"<?php echo $preh_cierre_add->nota->editAttributes() ?>><?php echo $preh_cierre_add->nota->EditValue ?></textarea>
</span></script>
<?php echo $preh_cierre_add->nota->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_preh_cierreadd" class="ew-custom-template"></div>
<script id="tpm_preh_cierreadd" type="text/html">
<div id="ct_preh_cierre_add">{{include tmpl=~getTemplate("#tpx_preh_cierre_cod_casopreh")/}}
{{include tmpl="#tpc_preh_cierre_nombrecierre"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_preh_cierre_nombrecierre")/}}
{{include tmpl="#tpc_preh_cierre_nota"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_preh_cierre_nota")/}}
</div>
</script>

<?php if (!$preh_cierre_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $preh_cierre_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_cierre_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($preh_cierre->Rows) ?> };
	ew.applyTemplate("tpd_preh_cierreadd", "tpm_preh_cierreadd", "preh_cierreadd", "<?php echo $preh_cierre->CustomExport ?>", ew.templateData.rows[0]);
	$("script.preh_cierreadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$preh_cierre_add->showPageFooter();
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
$preh_cierre_add->terminate();
?>