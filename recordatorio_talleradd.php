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
$recordatorio_taller_add = new recordatorio_taller_add();

// Run the page
$recordatorio_taller_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recordatorio_taller_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var frecordatorio_talleradd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	frecordatorio_talleradd = currentForm = new ew.Form("frecordatorio_talleradd", "add");

	// Validate form
	frecordatorio_talleradd.validate = function() {
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
			<?php if ($recordatorio_taller_add->vehiculo->Required) { ?>
				elm = this.getElements("x" + infix + "_vehiculo[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_add->vehiculo->caption(), $recordatorio_taller_add->vehiculo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_add->servicio->Required) { ?>
				elm = this.getElements("x" + infix + "_servicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_add->servicio->caption(), $recordatorio_taller_add->servicio->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_add->frecuencia_km->Required) { ?>
				elm = this.getElements("x" + infix + "_frecuencia_km");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_add->frecuencia_km->caption(), $recordatorio_taller_add->frecuencia_km->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_add->frecuencia_tiempo->Required) { ?>
				elm = this.getElements("x" + infix + "_frecuencia_tiempo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_add->frecuencia_tiempo->caption(), $recordatorio_taller_add->frecuencia_tiempo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_add->anticipo_km->Required) { ?>
				elm = this.getElements("x" + infix + "_anticipo_km");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_add->anticipo_km->caption(), $recordatorio_taller_add->anticipo_km->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($recordatorio_taller_add->anticipo_tiempo->Required) { ?>
				elm = this.getElements("x" + infix + "_anticipo_tiempo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recordatorio_taller_add->anticipo_tiempo->caption(), $recordatorio_taller_add->anticipo_tiempo->RequiredErrorMessage)) ?>");
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
	frecordatorio_talleradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	frecordatorio_talleradd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	frecordatorio_talleradd.lists["x_vehiculo[]"] = <?php echo $recordatorio_taller_add->vehiculo->Lookup->toClientList($recordatorio_taller_add) ?>;
	frecordatorio_talleradd.lists["x_vehiculo[]"].options = <?php echo JsonEncode($recordatorio_taller_add->vehiculo->lookupOptions()) ?>;
	frecordatorio_talleradd.lists["x_servicio"] = <?php echo $recordatorio_taller_add->servicio->Lookup->toClientList($recordatorio_taller_add) ?>;
	frecordatorio_talleradd.lists["x_servicio"].options = <?php echo JsonEncode($recordatorio_taller_add->servicio->lookupOptions()) ?>;
	loadjs.done("frecordatorio_talleradd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $recordatorio_taller_add->showPageHeader(); ?>
<?php
$recordatorio_taller_add->showMessage();
?>
<form name="frecordatorio_talleradd" id="frecordatorio_talleradd" class="<?php echo $recordatorio_taller_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recordatorio_taller">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$recordatorio_taller_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($recordatorio_taller_add->vehiculo->Visible) { // vehiculo ?>
	<div id="r_vehiculo" class="form-group row">
		<label id="elh_recordatorio_taller_vehiculo" for="x_vehiculo" class="<?php echo $recordatorio_taller_add->LeftColumnClass ?>"><?php echo $recordatorio_taller_add->vehiculo->caption() ?><?php echo $recordatorio_taller_add->vehiculo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_add->RightColumnClass ?>"><div <?php echo $recordatorio_taller_add->vehiculo->cellAttributes() ?>>
<span id="el_recordatorio_taller_vehiculo">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_vehiculo"><?php echo EmptyValue(strval($recordatorio_taller_add->vehiculo->ViewValue)) ? $Language->phrase("PleaseSelect") : $recordatorio_taller_add->vehiculo->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($recordatorio_taller_add->vehiculo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($recordatorio_taller_add->vehiculo->ReadOnly || $recordatorio_taller_add->vehiculo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_vehiculo[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $recordatorio_taller_add->vehiculo->Lookup->getParamTag($recordatorio_taller_add, "p_x_vehiculo") ?>
<input type="hidden" data-table="recordatorio_taller" data-field="x_vehiculo" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $recordatorio_taller_add->vehiculo->displayValueSeparatorAttribute() ?>" name="x_vehiculo[]" id="x_vehiculo[]" value="<?php echo $recordatorio_taller_add->vehiculo->CurrentValue ?>"<?php echo $recordatorio_taller_add->vehiculo->editAttributes() ?>>
</span>
<?php echo $recordatorio_taller_add->vehiculo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_add->servicio->Visible) { // servicio ?>
	<div id="r_servicio" class="form-group row">
		<label id="elh_recordatorio_taller_servicio" for="x_servicio" class="<?php echo $recordatorio_taller_add->LeftColumnClass ?>"><?php echo $recordatorio_taller_add->servicio->caption() ?><?php echo $recordatorio_taller_add->servicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_add->RightColumnClass ?>"><div <?php echo $recordatorio_taller_add->servicio->cellAttributes() ?>>
<span id="el_recordatorio_taller_servicio">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="recordatorio_taller" data-field="x_servicio" data-value-separator="<?php echo $recordatorio_taller_add->servicio->displayValueSeparatorAttribute() ?>" id="x_servicio" name="x_servicio"<?php echo $recordatorio_taller_add->servicio->editAttributes() ?>>
			<?php echo $recordatorio_taller_add->servicio->selectOptionListHtml("x_servicio") ?>
		</select>
</div>
<?php echo $recordatorio_taller_add->servicio->Lookup->getParamTag($recordatorio_taller_add, "p_x_servicio") ?>
</span>
<?php echo $recordatorio_taller_add->servicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_add->frecuencia_km->Visible) { // frecuencia_km ?>
	<div id="r_frecuencia_km" class="form-group row">
		<label id="elh_recordatorio_taller_frecuencia_km" for="x_frecuencia_km" class="<?php echo $recordatorio_taller_add->LeftColumnClass ?>"><?php echo $recordatorio_taller_add->frecuencia_km->caption() ?><?php echo $recordatorio_taller_add->frecuencia_km->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_add->RightColumnClass ?>"><div <?php echo $recordatorio_taller_add->frecuencia_km->cellAttributes() ?>>
<span id="el_recordatorio_taller_frecuencia_km">
<input type="text" data-table="recordatorio_taller" data-field="x_frecuencia_km" name="x_frecuencia_km" id="x_frecuencia_km" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($recordatorio_taller_add->frecuencia_km->getPlaceHolder()) ?>" value="<?php echo $recordatorio_taller_add->frecuencia_km->EditValue ?>"<?php echo $recordatorio_taller_add->frecuencia_km->editAttributes() ?>>
</span>
<?php echo $recordatorio_taller_add->frecuencia_km->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_add->frecuencia_tiempo->Visible) { // frecuencia_tiempo ?>
	<div id="r_frecuencia_tiempo" class="form-group row">
		<label id="elh_recordatorio_taller_frecuencia_tiempo" for="x_frecuencia_tiempo" class="<?php echo $recordatorio_taller_add->LeftColumnClass ?>"><?php echo $recordatorio_taller_add->frecuencia_tiempo->caption() ?><?php echo $recordatorio_taller_add->frecuencia_tiempo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_add->RightColumnClass ?>"><div <?php echo $recordatorio_taller_add->frecuencia_tiempo->cellAttributes() ?>>
<span id="el_recordatorio_taller_frecuencia_tiempo">
<input type="text" data-table="recordatorio_taller" data-field="x_frecuencia_tiempo" name="x_frecuencia_tiempo" id="x_frecuencia_tiempo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($recordatorio_taller_add->frecuencia_tiempo->getPlaceHolder()) ?>" value="<?php echo $recordatorio_taller_add->frecuencia_tiempo->EditValue ?>"<?php echo $recordatorio_taller_add->frecuencia_tiempo->editAttributes() ?>>
</span>
<?php echo $recordatorio_taller_add->frecuencia_tiempo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_add->anticipo_km->Visible) { // anticipo_km ?>
	<div id="r_anticipo_km" class="form-group row">
		<label id="elh_recordatorio_taller_anticipo_km" for="x_anticipo_km" class="<?php echo $recordatorio_taller_add->LeftColumnClass ?>"><?php echo $recordatorio_taller_add->anticipo_km->caption() ?><?php echo $recordatorio_taller_add->anticipo_km->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_add->RightColumnClass ?>"><div <?php echo $recordatorio_taller_add->anticipo_km->cellAttributes() ?>>
<span id="el_recordatorio_taller_anticipo_km">
<input type="text" data-table="recordatorio_taller" data-field="x_anticipo_km" name="x_anticipo_km" id="x_anticipo_km" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($recordatorio_taller_add->anticipo_km->getPlaceHolder()) ?>" value="<?php echo $recordatorio_taller_add->anticipo_km->EditValue ?>"<?php echo $recordatorio_taller_add->anticipo_km->editAttributes() ?>>
</span>
<?php echo $recordatorio_taller_add->anticipo_km->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recordatorio_taller_add->anticipo_tiempo->Visible) { // anticipo_tiempo ?>
	<div id="r_anticipo_tiempo" class="form-group row">
		<label id="elh_recordatorio_taller_anticipo_tiempo" for="x_anticipo_tiempo" class="<?php echo $recordatorio_taller_add->LeftColumnClass ?>"><?php echo $recordatorio_taller_add->anticipo_tiempo->caption() ?><?php echo $recordatorio_taller_add->anticipo_tiempo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recordatorio_taller_add->RightColumnClass ?>"><div <?php echo $recordatorio_taller_add->anticipo_tiempo->cellAttributes() ?>>
<span id="el_recordatorio_taller_anticipo_tiempo">
<input type="text" data-table="recordatorio_taller" data-field="x_anticipo_tiempo" name="x_anticipo_tiempo" id="x_anticipo_tiempo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($recordatorio_taller_add->anticipo_tiempo->getPlaceHolder()) ?>" value="<?php echo $recordatorio_taller_add->anticipo_tiempo->EditValue ?>"<?php echo $recordatorio_taller_add->anticipo_tiempo->editAttributes() ?>>
</span>
<?php echo $recordatorio_taller_add->anticipo_tiempo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$recordatorio_taller_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $recordatorio_taller_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recordatorio_taller_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$recordatorio_taller_add->showPageFooter();
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
$recordatorio_taller_add->terminate();
?>