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
$recordatorio_taller_edit = new recordatorio_taller_edit();

// Run the page
$recordatorio_taller_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recordatorio_taller_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var frecordatorio_talleredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	frecordatorio_talleredit = currentForm = new ew.Form("frecordatorio_talleredit", "edit");

	// Validate form
	frecordatorio_talleredit.validate = function() {
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
			<?php if ($recordatorio_taller_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_edit->id->caption(), $recordatorio_taller_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_edit->vehiculo->Required) { ?>
				elm = this.getElements("x" + infix + "_vehiculo[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_edit->vehiculo->caption(), $recordatorio_taller_edit->vehiculo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_edit->servicio->Required) { ?>
				elm = this.getElements("x" + infix + "_servicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_edit->servicio->caption(), $recordatorio_taller_edit->servicio->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_edit->frecuencia_km->Required) { ?>
				elm = this.getElements("x" + infix + "_frecuencia_km");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_edit->frecuencia_km->caption(), $recordatorio_taller_edit->frecuencia_km->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_edit->frecuencia_tiempo->Required) { ?>
				elm = this.getElements("x" + infix + "_frecuencia_tiempo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_edit->frecuencia_tiempo->caption(), $recordatorio_taller_edit->frecuencia_tiempo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_edit->anticipo_km->Required) { ?>
				elm = this.getElements("x" + infix + "_anticipo_km");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_edit->anticipo_km->caption(), $recordatorio_taller_edit->anticipo_km->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_edit->anticipo_tiempo->Required) { ?>
				elm = this.getElements("x" + infix + "_anticipo_tiempo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_edit->anticipo_tiempo->caption(), $recordatorio_taller_edit->anticipo_tiempo->RequiredErrorMessage)) ?>");
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
	frecordatorio_talleredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	frecordatorio_talleredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	frecordatorio_talleredit.lists["x_vehiculo[]"] = <?php echo $recordatorio_taller_edit->vehiculo->Lookup->toClientList($recordatorio_taller_edit) ?>;
	frecordatorio_talleredit.lists["x_vehiculo[]"].options = <?php echo JsonEncode($recordatorio_taller_edit->vehiculo->lookupOptions()) ?>;
	frecordatorio_talleredit.lists["x_servicio"] = <?php echo $recordatorio_taller_edit->servicio->Lookup->toClientList($recordatorio_taller_edit) ?>;
	frecordatorio_talleredit.lists["x_servicio"].options = <?php echo JsonEncode($recordatorio_taller_edit->servicio->lookupOptions()) ?>;
	loadjs.done("frecordatorio_talleredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $recordatorio_taller_edit->showPageHeader(); ?>
<?php
$recordatorio_taller_edit->showMessage();
?>
<form name="frecordatorio_talleredit" id="frecordatorio_talleredit" class="<?php echo $recordatorio_taller_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recordatorio_taller">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$recordatorio_taller_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($recordatorio_taller_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_recordatorio_taller_id" class="<?php echo $recordatorio_taller_edit->LeftColumnClass ?>"><?php echo $recordatorio_taller_edit->id->caption() ?><?php echo $recordatorio_taller_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_edit->RightColumnClass ?>"><div <?php echo $recordatorio_taller_edit->id->cellAttributes() ?>>
<span id="el_recordatorio_taller_id">
<span<?php echo $recordatorio_taller_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($recordatorio_taller_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="recordatorio_taller" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($recordatorio_taller_edit->id->CurrentValue) ?>">
<?php echo $recordatorio_taller_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_edit->vehiculo->Visible) { // vehiculo ?>
	<div id="r_vehiculo" class="form-group row">
		<label id="elh_recordatorio_taller_vehiculo" for="x_vehiculo" class="<?php echo $recordatorio_taller_edit->LeftColumnClass ?>"><?php echo $recordatorio_taller_edit->vehiculo->caption() ?><?php echo $recordatorio_taller_edit->vehiculo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_edit->RightColumnClass ?>"><div <?php echo $recordatorio_taller_edit->vehiculo->cellAttributes() ?>>
<span id="el_recordatorio_taller_vehiculo">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_vehiculo"><?php echo EmptyValue(strval($recordatorio_taller_edit->vehiculo->ViewValue)) ? $Language->phrase("PleaseSelect") : $recordatorio_taller_edit->vehiculo->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($recordatorio_taller_edit->vehiculo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($recordatorio_taller_edit->vehiculo->ReadOnly || $recordatorio_taller_edit->vehiculo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_vehiculo[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $recordatorio_taller_edit->vehiculo->Lookup->getParamTag($recordatorio_taller_edit, "p_x_vehiculo") ?>
<input type="hidden" data-table="recordatorio_taller" data-field="x_vehiculo" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $recordatorio_taller_edit->vehiculo->displayValueSeparatorAttribute() ?>" name="x_vehiculo[]" id="x_vehiculo[]" value="<?php echo $recordatorio_taller_edit->vehiculo->CurrentValue ?>"<?php echo $recordatorio_taller_edit->vehiculo->editAttributes() ?>>
</span>
<?php echo $recordatorio_taller_edit->vehiculo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_edit->servicio->Visible) { // servicio ?>
	<div id="r_servicio" class="form-group row">
		<label id="elh_recordatorio_taller_servicio" for="x_servicio" class="<?php echo $recordatorio_taller_edit->LeftColumnClass ?>"><?php echo $recordatorio_taller_edit->servicio->caption() ?><?php echo $recordatorio_taller_edit->servicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_edit->RightColumnClass ?>"><div <?php echo $recordatorio_taller_edit->servicio->cellAttributes() ?>>
<span id="el_recordatorio_taller_servicio">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="recordatorio_taller" data-field="x_servicio" data-value-separator="<?php echo $recordatorio_taller_edit->servicio->displayValueSeparatorAttribute() ?>" id="x_servicio" name="x_servicio"<?php echo $recordatorio_taller_edit->servicio->editAttributes() ?>>
			<?php echo $recordatorio_taller_edit->servicio->selectOptionListHtml("x_servicio") ?>
		</select>
</div>
<?php echo $recordatorio_taller_edit->servicio->Lookup->getParamTag($recordatorio_taller_edit, "p_x_servicio") ?>
</span>
<?php echo $recordatorio_taller_edit->servicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_edit->frecuencia_km->Visible) { // frecuencia_km ?>
	<div id="r_frecuencia_km" class="form-group row">
		<label id="elh_recordatorio_taller_frecuencia_km" for="x_frecuencia_km" class="<?php echo $recordatorio_taller_edit->LeftColumnClass ?>"><?php echo $recordatorio_taller_edit->frecuencia_km->caption() ?><?php echo $recordatorio_taller_edit->frecuencia_km->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_edit->RightColumnClass ?>"><div <?php echo $recordatorio_taller_edit->frecuencia_km->cellAttributes() ?>>
<span id="el_recordatorio_taller_frecuencia_km">
<input type="text" data-table="recordatorio_taller" data-field="x_frecuencia_km" name="x_frecuencia_km" id="x_frecuencia_km" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($recordatorio_taller_edit->frecuencia_km->getPlaceHolder()) ?>" value="<?php echo $recordatorio_taller_edit->frecuencia_km->EditValue ?>"<?php echo $recordatorio_taller_edit->frecuencia_km->editAttributes() ?>>
</span>
<?php echo $recordatorio_taller_edit->frecuencia_km->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_edit->frecuencia_tiempo->Visible) { // frecuencia_tiempo ?>
	<div id="r_frecuencia_tiempo" class="form-group row">
		<label id="elh_recordatorio_taller_frecuencia_tiempo" for="x_frecuencia_tiempo" class="<?php echo $recordatorio_taller_edit->LeftColumnClass ?>"><?php echo $recordatorio_taller_edit->frecuencia_tiempo->caption() ?><?php echo $recordatorio_taller_edit->frecuencia_tiempo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_edit->RightColumnClass ?>"><div <?php echo $recordatorio_taller_edit->frecuencia_tiempo->cellAttributes() ?>>
<span id="el_recordatorio_taller_frecuencia_tiempo">
<input type="text" data-table="recordatorio_taller" data-field="x_frecuencia_tiempo" name="x_frecuencia_tiempo" id="x_frecuencia_tiempo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($recordatorio_taller_edit->frecuencia_tiempo->getPlaceHolder()) ?>" value="<?php echo $recordatorio_taller_edit->frecuencia_tiempo->EditValue ?>"<?php echo $recordatorio_taller_edit->frecuencia_tiempo->editAttributes() ?>>
</span>
<?php echo $recordatorio_taller_edit->frecuencia_tiempo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_edit->anticipo_km->Visible) { // anticipo_km ?>
	<div id="r_anticipo_km" class="form-group row">
		<label id="elh_recordatorio_taller_anticipo_km" for="x_anticipo_km" class="<?php echo $recordatorio_taller_edit->LeftColumnClass ?>"><?php echo $recordatorio_taller_edit->anticipo_km->caption() ?><?php echo $recordatorio_taller_edit->anticipo_km->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_edit->RightColumnClass ?>"><div <?php echo $recordatorio_taller_edit->anticipo_km->cellAttributes() ?>>
<span id="el_recordatorio_taller_anticipo_km">
<input type="text" data-table="recordatorio_taller" data-field="x_anticipo_km" name="x_anticipo_km" id="x_anticipo_km" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($recordatorio_taller_edit->anticipo_km->getPlaceHolder()) ?>" value="<?php echo $recordatorio_taller_edit->anticipo_km->EditValue ?>"<?php echo $recordatorio_taller_edit->anticipo_km->editAttributes() ?>>
</span>
<?php echo $recordatorio_taller_edit->anticipo_km->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_edit->anticipo_tiempo->Visible) { // anticipo_tiempo ?>
	<div id="r_anticipo_tiempo" class="form-group row">
		<label id="elh_recordatorio_taller_anticipo_tiempo" for="x_anticipo_tiempo" class="<?php echo $recordatorio_taller_edit->LeftColumnClass ?>"><?php echo $recordatorio_taller_edit->anticipo_tiempo->caption() ?><?php echo $recordatorio_taller_edit->anticipo_tiempo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_edit->RightColumnClass ?>"><div <?php echo $recordatorio_taller_edit->anticipo_tiempo->cellAttributes() ?>>
<span id="el_recordatorio_taller_anticipo_tiempo">
<input type="text" data-table="recordatorio_taller" data-field="x_anticipo_tiempo" name="x_anticipo_tiempo" id="x_anticipo_tiempo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($recordatorio_taller_edit->anticipo_tiempo->getPlaceHolder()) ?>" value="<?php echo $recordatorio_taller_edit->anticipo_tiempo->EditValue ?>"<?php echo $recordatorio_taller_edit->anticipo_tiempo->editAttributes() ?>>
</span>
<?php echo $recordatorio_taller_edit->anticipo_tiempo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$recordatorio_taller_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $recordatorio_taller_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recordatorio_taller_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$recordatorio_taller_edit->showPageFooter();
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
$recordatorio_taller_edit->terminate();
?>