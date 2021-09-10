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
$preh_seguimiento_add = new preh_seguimiento_add();

// Run the page
$preh_seguimiento_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_seguimiento_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_seguimientoadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpreh_seguimientoadd = currentForm = new ew.Form("fpreh_seguimientoadd", "add");

	// Validate form
	fpreh_seguimientoadd.validate = function() {
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
			<?php if ($preh_seguimiento_add->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_seguimiento_add->cod_casopreh->caption(), $preh_seguimiento_add->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_seguimiento_add->seguimento->Required) { ?>
				elm = this.getElements("x" + infix + "_seguimento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_seguimiento_add->seguimento->caption(), $preh_seguimiento_add->seguimento->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_seguimiento_add->fecha_seguimento->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_seguimento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_seguimiento_add->fecha_seguimento->caption(), $preh_seguimiento_add->fecha_seguimento->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_seguimiento_add->despacho->Required) { ?>
				elm = this.getElements("x" + infix + "_despacho");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_seguimiento_add->despacho->caption(), $preh_seguimiento_add->despacho->RequiredErrorMessage)) ?>");
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
	fpreh_seguimientoadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpreh_seguimientoadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpreh_seguimientoadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $preh_seguimiento_add->showPageHeader(); ?>
<?php
$preh_seguimiento_add->showMessage();
?>
<form name="fpreh_seguimientoadd" id="fpreh_seguimientoadd" class="<?php echo $preh_seguimiento_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_seguimiento">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$preh_seguimiento_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($preh_seguimiento_add->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_preh_seguimiento_cod_casopreh" class="<?php echo $preh_seguimiento_add->LeftColumnClass ?>"><script id="tpc_preh_seguimiento_cod_casopreh" type="text/html"><?php echo $preh_seguimiento_add->cod_casopreh->caption() ?><?php echo $preh_seguimiento_add->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_seguimiento_add->RightColumnClass ?>"><div <?php echo $preh_seguimiento_add->cod_casopreh->cellAttributes() ?>>
<script id="tpx_preh_seguimiento_cod_casopreh" type="text/html"><span id="el_preh_seguimiento_cod_casopreh">
<input type="text" data-table="preh_seguimiento" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($preh_seguimiento_add->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $preh_seguimiento_add->cod_casopreh->EditValue ?>"<?php echo $preh_seguimiento_add->cod_casopreh->editAttributes() ?>>
</span></script>
<?php echo $preh_seguimiento_add->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_seguimiento_add->seguimento->Visible) { // seguimento ?>
	<div id="r_seguimento" class="form-group row">
		<label id="elh_preh_seguimiento_seguimento" for="x_seguimento" class="<?php echo $preh_seguimiento_add->LeftColumnClass ?>"><script id="tpc_preh_seguimiento_seguimento" type="text/html"><?php echo $preh_seguimiento_add->seguimento->caption() ?><?php echo $preh_seguimiento_add->seguimento->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_seguimiento_add->RightColumnClass ?>"><div <?php echo $preh_seguimiento_add->seguimento->cellAttributes() ?>>
<script id="tpx_preh_seguimiento_seguimento" type="text/html"><span id="el_preh_seguimiento_seguimento">
<textarea data-table="preh_seguimiento" data-field="x_seguimento" name="x_seguimento" id="x_seguimento" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_seguimiento_add->seguimento->getPlaceHolder()) ?>"<?php echo $preh_seguimiento_add->seguimento->editAttributes() ?>><?php echo $preh_seguimiento_add->seguimento->EditValue ?></textarea>
</span></script>
<?php echo $preh_seguimiento_add->seguimento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_seguimiento_add->despacho->Visible) { // despacho ?>
	<div id="r_despacho" class="form-group row">
		<label id="elh_preh_seguimiento_despacho" for="x_despacho" class="<?php echo $preh_seguimiento_add->LeftColumnClass ?>"><script id="tpc_preh_seguimiento_despacho" type="text/html"><?php echo $preh_seguimiento_add->despacho->caption() ?><?php echo $preh_seguimiento_add->despacho->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_seguimiento_add->RightColumnClass ?>"><div <?php echo $preh_seguimiento_add->despacho->cellAttributes() ?>>
<script id="tpx_preh_seguimiento_despacho" type="text/html"><span id="el_preh_seguimiento_despacho">
<input type="text" data-table="preh_seguimiento" data-field="x_despacho" name="x_despacho" id="x_despacho" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($preh_seguimiento_add->despacho->getPlaceHolder()) ?>" value="<?php echo $preh_seguimiento_add->despacho->EditValue ?>"<?php echo $preh_seguimiento_add->despacho->editAttributes() ?>>
</span></script>
<?php echo $preh_seguimiento_add->despacho->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_preh_seguimientoadd" class="ew-custom-template"></div>
<script id="tpm_preh_seguimientoadd" type="text/html">
<div id="ct_preh_seguimiento_add">{{include tmpl=~getTemplate("#tpx_preh_seguimiento_cod_casopreh")/}}
<?php echo $preh_seguimiento_add->seguimento->caption() ?></br>
{{include tmpl=~getTemplate("#tpx_preh_seguimiento_seguimento")/}}
{{include tmpl=~getTemplate("#tpx_preh_seguimiento_despacho")/}}
</br>
<?php
$valuecod = Get("cod_casopreh"); 
$fecha = strftime("%Y-%m-%d %H:%M:%S");
echo $fecha; 
echo "<br><div class='direct-chat-msg'>
	  <div class='direct-chat-text'>".
ExecuteHtml("SELECT fecha_seguimento,seguimento FROM preh_seguimiento WHERE cod_casopreh = '$valuecod'").
	   "</div>
		</div>";
?>
</div>
</script>

<?php if (!$preh_seguimiento_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $preh_seguimiento_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_seguimiento_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($preh_seguimiento->Rows) ?> };
	ew.applyTemplate("tpd_preh_seguimientoadd", "tpm_preh_seguimientoadd", "preh_seguimientoadd", "<?php echo $preh_seguimiento->CustomExport ?>", ew.templateData.rows[0]);
	$("script.preh_seguimientoadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$preh_seguimiento_add->showPageFooter();
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
$preh_seguimiento_add->terminate();
?>