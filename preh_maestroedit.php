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
$preh_maestro_edit = new preh_maestro_edit();

// Run the page
$preh_maestro_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_maestro_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_maestroedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpreh_maestroedit = currentForm = new ew.Form("fpreh_maestroedit", "edit");

	// Validate form
	fpreh_maestroedit.validate = function() {
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
			<?php if ($preh_maestro_edit->sede->Required) { ?>
				elm = this.getElements("x" + infix + "_sede");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_edit->sede->caption(), $preh_maestro_edit->sede->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_edit->hospital_destino->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital_destino");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_edit->hospital_destino->caption(), $preh_maestro_edit->hospital_destino->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_edit->nombre_medico->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_medico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_edit->nombre_medico->caption(), $preh_maestro_edit->nombre_medico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_edit->telefono_confirma->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono_confirma");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_edit->telefono_confirma->caption(), $preh_maestro_edit->telefono_confirma->RequiredErrorMessage)) ?>");
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
	fpreh_maestroedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpreh_maestroedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpreh_maestroedit.lists["x_hospital_destino"] = <?php echo $preh_maestro_edit->hospital_destino->Lookup->toClientList($preh_maestro_edit) ?>;
	fpreh_maestroedit.lists["x_hospital_destino"].options = <?php echo JsonEncode($preh_maestro_edit->hospital_destino->lookupOptions()) ?>;
	loadjs.done("fpreh_maestroedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $preh_maestro_edit->showPageHeader(); ?>
<?php
$preh_maestro_edit->showMessage();
?>
<form name="fpreh_maestroedit" id="fpreh_maestroedit" class="<?php echo $preh_maestro_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_maestro">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$preh_maestro_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($preh_maestro_edit->hospital_destino->Visible) { // hospital_destino ?>
	<div id="r_hospital_destino" class="form-group row">
		<label id="elh_preh_maestro_hospital_destino" for="x_hospital_destino" class="<?php echo $preh_maestro_edit->LeftColumnClass ?>"><?php echo $preh_maestro_edit->hospital_destino->caption() ?><?php echo $preh_maestro_edit->hospital_destino->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_maestro_edit->RightColumnClass ?>"><div <?php echo $preh_maestro_edit->hospital_destino->cellAttributes() ?>>
<span id="el_preh_maestro_hospital_destino">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_hospital_destino"><?php echo EmptyValue(strval($preh_maestro_edit->hospital_destino->ViewValue)) ? $Language->phrase("PleaseSelect") : $preh_maestro_edit->hospital_destino->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($preh_maestro_edit->hospital_destino->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($preh_maestro_edit->hospital_destino->ReadOnly || $preh_maestro_edit->hospital_destino->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_hospital_destino',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $preh_maestro_edit->hospital_destino->Lookup->getParamTag($preh_maestro_edit, "p_x_hospital_destino") ?>
<input type="hidden" data-table="preh_maestro" data-field="x_hospital_destino" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $preh_maestro_edit->hospital_destino->displayValueSeparatorAttribute() ?>" name="x_hospital_destino" id="x_hospital_destino" value="<?php echo $preh_maestro_edit->hospital_destino->CurrentValue ?>"<?php echo $preh_maestro_edit->hospital_destino->editAttributes() ?>>
</span>
<?php echo $preh_maestro_edit->hospital_destino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_edit->nombre_medico->Visible) { // nombre_medico ?>
	<div id="r_nombre_medico" class="form-group row">
		<label id="elh_preh_maestro_nombre_medico" for="x_nombre_medico" class="<?php echo $preh_maestro_edit->LeftColumnClass ?>"><?php echo $preh_maestro_edit->nombre_medico->caption() ?><?php echo $preh_maestro_edit->nombre_medico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_maestro_edit->RightColumnClass ?>"><div <?php echo $preh_maestro_edit->nombre_medico->cellAttributes() ?>>
<span id="el_preh_maestro_nombre_medico">
<input type="text" data-table="preh_maestro" data-field="x_nombre_medico" name="x_nombre_medico" id="x_nombre_medico" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($preh_maestro_edit->nombre_medico->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_edit->nombre_medico->EditValue ?>"<?php echo $preh_maestro_edit->nombre_medico->editAttributes() ?>>
</span>
<?php echo $preh_maestro_edit->nombre_medico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_edit->telefono_confirma->Visible) { // telefono_confirma ?>
	<div id="r_telefono_confirma" class="form-group row">
		<label id="elh_preh_maestro_telefono_confirma" for="x_telefono_confirma" class="<?php echo $preh_maestro_edit->LeftColumnClass ?>"><?php echo $preh_maestro_edit->telefono_confirma->caption() ?><?php echo $preh_maestro_edit->telefono_confirma->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_maestro_edit->RightColumnClass ?>"><div <?php echo $preh_maestro_edit->telefono_confirma->cellAttributes() ?>>
<span id="el_preh_maestro_telefono_confirma">
<input type="text" data-table="preh_maestro" data-field="x_telefono_confirma" name="x_telefono_confirma" id="x_telefono_confirma" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($preh_maestro_edit->telefono_confirma->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_edit->telefono_confirma->EditValue ?>"<?php echo $preh_maestro_edit->telefono_confirma->editAttributes() ?>>
</span>
<?php echo $preh_maestro_edit->telefono_confirma->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<span id="el_preh_maestro_sede">
<input type="hidden" data-table="preh_maestro" data-field="x_sede" name="x_sede" id="x_sede" value="<?php echo HtmlEncode($preh_maestro_edit->sede->CurrentValue) ?>">
</span>
	<input type="hidden" data-table="preh_maestro" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" value="<?php echo HtmlEncode($preh_maestro_edit->cod_casopreh->CurrentValue) ?>">
<?php if (!$preh_maestro_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $preh_maestro_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_maestro_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$preh_maestro_edit->showPageFooter();
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
$preh_maestro_edit->terminate();
?>