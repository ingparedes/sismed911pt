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
$interh_seguimiento_add = new interh_seguimiento_add();

// Run the page
$interh_seguimiento_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_seguimiento_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_seguimientoadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	finterh_seguimientoadd = currentForm = new ew.Form("finterh_seguimientoadd", "add");

	// Validate form
	finterh_seguimientoadd.validate = function() {
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
			<?php if ($interh_seguimiento_add->fecha_seguimento->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_seguimento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_seguimiento_add->fecha_seguimento->caption(), $interh_seguimiento_add->fecha_seguimento->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_seguimiento_add->cod_casointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_seguimiento_add->cod_casointerh->caption(), $interh_seguimiento_add->cod_casointerh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_seguimiento_add->seguimento->Required) { ?>
				elm = this.getElements("x" + infix + "_seguimento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_seguimiento_add->seguimento->caption(), $interh_seguimiento_add->seguimento->RequiredErrorMessage)) ?>");
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
	finterh_seguimientoadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_seguimientoadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("finterh_seguimientoadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $interh_seguimiento_add->showPageHeader(); ?>
<?php
$interh_seguimiento_add->showMessage();
?>
<form name="finterh_seguimientoadd" id="finterh_seguimientoadd" class="<?php echo $interh_seguimiento_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_seguimiento">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$interh_seguimiento_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($interh_seguimiento_add->cod_casointerh->Visible) { // cod_casointerh ?>
	<div id="r_cod_casointerh" class="form-group row">
		<label id="elh_interh_seguimiento_cod_casointerh" class="<?php echo $interh_seguimiento_add->LeftColumnClass ?>"><script id="tpc_interh_seguimiento_cod_casointerh" type="text/html"><?php echo $interh_seguimiento_add->cod_casointerh->caption() ?><?php echo $interh_seguimiento_add->cod_casointerh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $interh_seguimiento_add->RightColumnClass ?>"><div <?php echo $interh_seguimiento_add->cod_casointerh->cellAttributes() ?>>
<script id="tpx_interh_seguimiento_cod_casointerh" type="text/html"><span id="el_interh_seguimiento_cod_casointerh">
<input type="text" data-table="interh_seguimiento" data-field="x_cod_casointerh" name="x_cod_casointerh" id="x_cod_casointerh" maxlength="10" placeholder="<?php echo HtmlEncode($interh_seguimiento_add->cod_casointerh->getPlaceHolder()) ?>" value="<?php echo $interh_seguimiento_add->cod_casointerh->EditValue ?>"<?php echo $interh_seguimiento_add->cod_casointerh->editAttributes() ?>>
</span></script>
<?php echo $interh_seguimiento_add->cod_casointerh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_seguimiento_add->seguimento->Visible) { // seguimento ?>
	<div id="r_seguimento" class="form-group row">
		<label id="elh_interh_seguimiento_seguimento" for="x_seguimento" class="<?php echo $interh_seguimiento_add->LeftColumnClass ?>"><script id="tpc_interh_seguimiento_seguimento" type="text/html"><?php echo $interh_seguimiento_add->seguimento->caption() ?><?php echo $interh_seguimiento_add->seguimento->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $interh_seguimiento_add->RightColumnClass ?>"><div <?php echo $interh_seguimiento_add->seguimento->cellAttributes() ?>>
<script id="tpx_interh_seguimiento_seguimento" type="text/html"><span id="el_interh_seguimiento_seguimento">
<textarea data-table="interh_seguimiento" data-field="x_seguimento" name="x_seguimento" id="x_seguimento" cols="35" rows="5" placeholder="<?php echo HtmlEncode($interh_seguimiento_add->seguimento->getPlaceHolder()) ?>"<?php echo $interh_seguimiento_add->seguimento->editAttributes() ?>><?php echo $interh_seguimiento_add->seguimento->EditValue ?></textarea>
</span></script>
<?php echo $interh_seguimiento_add->seguimento->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_interh_seguimientoadd" class="ew-custom-template"></div>
<script id="tpm_interh_seguimientoadd" type="text/html">
<div id="ct_interh_seguimiento_add"><?php
$valuecod = $_GET["cod_casointerh"]; 
$fecha = strftime("%Y-%m-%d %H:%M:%S");
?>
<br>
{{include tmpl=~getTemplate("#tpx_interh_seguimiento_cod_casointerh")/}}</br>
</br>
<div class="form-row">
<div class="form-group col-lg-4">
<?php echo $interh_seguimiento_add->seguimento->caption() ?></br>
{{include tmpl=~getTemplate("#tpx_interh_seguimiento_seguimento")/}}
</div>
</div>
<?php
echo $fecha."<br>";
if (!empty($valuecod)) {
	echo "<div class='direct-chat-msg'>
	  <div class='direct-chat-text'>".
	  ExecuteHtml("SELECT cod_casointerh, fecha_seguimento,seguimento FROM interh_seguimiento WHERE cod_casointerh = '$valuecod';").
	   "</div>
		</div>";
}
?>
</div>
</script>

<?php if (!$interh_seguimiento_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $interh_seguimiento_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_seguimiento_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($interh_seguimiento->Rows) ?> };
	ew.applyTemplate("tpd_interh_seguimientoadd", "tpm_interh_seguimientoadd", "interh_seguimientoadd", "<?php echo $interh_seguimiento->CustomExport ?>", ew.templateData.rows[0]);
	$("script.interh_seguimientoadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$interh_seguimiento_add->showPageFooter();
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
$interh_seguimiento_add->terminate();
?>