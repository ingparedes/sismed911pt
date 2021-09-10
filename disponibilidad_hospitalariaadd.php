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
$disponibilidad_hospitalaria_add = new disponibilidad_hospitalaria_add();

// Run the page
$disponibilidad_hospitalaria_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$disponibilidad_hospitalaria_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdisponibilidad_hospitalariaadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fdisponibilidad_hospitalariaadd = currentForm = new ew.Form("fdisponibilidad_hospitalariaadd", "add");

	// Validate form
	fdisponibilidad_hospitalariaadd.validate = function() {
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
			<?php if ($disponibilidad_hospitalaria_add->fecha_disponibilidad->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_disponibilidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $disponibilidad_hospitalaria_add->fecha_disponibilidad->caption(), $disponibilidad_hospitalaria_add->fecha_disponibilidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($disponibilidad_hospitalaria_add->cod_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $disponibilidad_hospitalaria_add->cod_hospital->caption(), $disponibilidad_hospitalaria_add->cod_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($disponibilidad_hospitalaria_add->servicio_disponibilidad->Required) { ?>
				elm = this.getElements("x" + infix + "_servicio_disponibilidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $disponibilidad_hospitalaria_add->servicio_disponibilidad->caption(), $disponibilidad_hospitalaria_add->servicio_disponibilidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($disponibilidad_hospitalaria_add->estado_disponibilidad->Required) { ?>
				elm = this.getElements("x" + infix + "_estado_disponibilidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $disponibilidad_hospitalaria_add->estado_disponibilidad->caption(), $disponibilidad_hospitalaria_add->estado_disponibilidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($disponibilidad_hospitalaria_add->cantidad_camas->Required) { ?>
				elm = this.getElements("x" + infix + "_cantidad_camas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $disponibilidad_hospitalaria_add->cantidad_camas->caption(), $disponibilidad_hospitalaria_add->cantidad_camas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($disponibilidad_hospitalaria_add->nombre_reporta->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_reporta");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $disponibilidad_hospitalaria_add->nombre_reporta->caption(), $disponibilidad_hospitalaria_add->nombre_reporta->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($disponibilidad_hospitalaria_add->telefono->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $disponibilidad_hospitalaria_add->telefono->caption(), $disponibilidad_hospitalaria_add->telefono->RequiredErrorMessage)) ?>");
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
	fdisponibilidad_hospitalariaadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdisponibilidad_hospitalariaadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fdisponibilidad_hospitalariaadd.lists["x_cod_hospital"] = <?php echo $disponibilidad_hospitalaria_add->cod_hospital->Lookup->toClientList($disponibilidad_hospitalaria_add) ?>;
	fdisponibilidad_hospitalariaadd.lists["x_cod_hospital"].options = <?php echo JsonEncode($disponibilidad_hospitalaria_add->cod_hospital->lookupOptions()) ?>;
	fdisponibilidad_hospitalariaadd.lists["x_servicio_disponibilidad"] = <?php echo $disponibilidad_hospitalaria_add->servicio_disponibilidad->Lookup->toClientList($disponibilidad_hospitalaria_add) ?>;
	fdisponibilidad_hospitalariaadd.lists["x_servicio_disponibilidad"].options = <?php echo JsonEncode($disponibilidad_hospitalaria_add->servicio_disponibilidad->lookupOptions()) ?>;
	fdisponibilidad_hospitalariaadd.lists["x_estado_disponibilidad"] = <?php echo $disponibilidad_hospitalaria_add->estado_disponibilidad->Lookup->toClientList($disponibilidad_hospitalaria_add) ?>;
	fdisponibilidad_hospitalariaadd.lists["x_estado_disponibilidad"].options = <?php echo JsonEncode($disponibilidad_hospitalaria_add->estado_disponibilidad->options(FALSE, TRUE)) ?>;
	loadjs.done("fdisponibilidad_hospitalariaadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $disponibilidad_hospitalaria_add->showPageHeader(); ?>
<?php
$disponibilidad_hospitalaria_add->showMessage();
?>
<form name="fdisponibilidad_hospitalariaadd" id="fdisponibilidad_hospitalariaadd" class="<?php echo $disponibilidad_hospitalaria_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="disponibilidad_hospitalaria">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$disponibilidad_hospitalaria_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($disponibilidad_hospitalaria_add->cod_hospital->Visible) { // cod_hospital ?>
	<div id="r_cod_hospital" class="form-group row">
		<label id="elh_disponibilidad_hospitalaria_cod_hospital" for="x_cod_hospital" class="<?php echo $disponibilidad_hospitalaria_add->LeftColumnClass ?>"><?php echo $disponibilidad_hospitalaria_add->cod_hospital->caption() ?><?php echo $disponibilidad_hospitalaria_add->cod_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $disponibilidad_hospitalaria_add->RightColumnClass ?>"><div <?php echo $disponibilidad_hospitalaria_add->cod_hospital->cellAttributes() ?>>
<span id="el_disponibilidad_hospitalaria_cod_hospital">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_cod_hospital"><?php echo EmptyValue(strval($disponibilidad_hospitalaria_add->cod_hospital->ViewValue)) ? $Language->phrase("PleaseSelect") : $disponibilidad_hospitalaria_add->cod_hospital->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($disponibilidad_hospitalaria_add->cod_hospital->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($disponibilidad_hospitalaria_add->cod_hospital->ReadOnly || $disponibilidad_hospitalaria_add->cod_hospital->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_cod_hospital',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "hospitalesgeneral") && !$disponibilidad_hospitalaria_add->cod_hospital->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_cod_hospital" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $disponibilidad_hospitalaria_add->cod_hospital->caption() ?>" data-title="<?php echo $disponibilidad_hospitalaria_add->cod_hospital->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_cod_hospital',url:'hospitalesgeneraladdopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $disponibilidad_hospitalaria_add->cod_hospital->Lookup->getParamTag($disponibilidad_hospitalaria_add, "p_x_cod_hospital") ?>
<input type="hidden" data-table="disponibilidad_hospitalaria" data-field="x_cod_hospital" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $disponibilidad_hospitalaria_add->cod_hospital->displayValueSeparatorAttribute() ?>" name="x_cod_hospital" id="x_cod_hospital" value="<?php echo $disponibilidad_hospitalaria_add->cod_hospital->CurrentValue ?>"<?php echo $disponibilidad_hospitalaria_add->cod_hospital->editAttributes() ?>>
</span>
<?php echo $disponibilidad_hospitalaria_add->cod_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_add->servicio_disponibilidad->Visible) { // servicio_disponibilidad ?>
	<div id="r_servicio_disponibilidad" class="form-group row">
		<label id="elh_disponibilidad_hospitalaria_servicio_disponibilidad" for="x_servicio_disponibilidad" class="<?php echo $disponibilidad_hospitalaria_add->LeftColumnClass ?>"><?php echo $disponibilidad_hospitalaria_add->servicio_disponibilidad->caption() ?><?php echo $disponibilidad_hospitalaria_add->servicio_disponibilidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $disponibilidad_hospitalaria_add->RightColumnClass ?>"><div <?php echo $disponibilidad_hospitalaria_add->servicio_disponibilidad->cellAttributes() ?>>
<span id="el_disponibilidad_hospitalaria_servicio_disponibilidad">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="disponibilidad_hospitalaria" data-field="x_servicio_disponibilidad" data-value-separator="<?php echo $disponibilidad_hospitalaria_add->servicio_disponibilidad->displayValueSeparatorAttribute() ?>" id="x_servicio_disponibilidad" name="x_servicio_disponibilidad"<?php echo $disponibilidad_hospitalaria_add->servicio_disponibilidad->editAttributes() ?>>
			<?php echo $disponibilidad_hospitalaria_add->servicio_disponibilidad->selectOptionListHtml("x_servicio_disponibilidad") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "servicio_disponibilidad") && !$disponibilidad_hospitalaria_add->servicio_disponibilidad->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_servicio_disponibilidad" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $disponibilidad_hospitalaria_add->servicio_disponibilidad->caption() ?>" data-title="<?php echo $disponibilidad_hospitalaria_add->servicio_disponibilidad->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_servicio_disponibilidad',url:'servicio_disponibilidadaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $disponibilidad_hospitalaria_add->servicio_disponibilidad->Lookup->getParamTag($disponibilidad_hospitalaria_add, "p_x_servicio_disponibilidad") ?>
</span>
<?php echo $disponibilidad_hospitalaria_add->servicio_disponibilidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_add->estado_disponibilidad->Visible) { // estado_disponibilidad ?>
	<div id="r_estado_disponibilidad" class="form-group row">
		<label id="elh_disponibilidad_hospitalaria_estado_disponibilidad" class="<?php echo $disponibilidad_hospitalaria_add->LeftColumnClass ?>"><?php echo $disponibilidad_hospitalaria_add->estado_disponibilidad->caption() ?><?php echo $disponibilidad_hospitalaria_add->estado_disponibilidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $disponibilidad_hospitalaria_add->RightColumnClass ?>"><div <?php echo $disponibilidad_hospitalaria_add->estado_disponibilidad->cellAttributes() ?>>
<span id="el_disponibilidad_hospitalaria_estado_disponibilidad">
<div id="tp_x_estado_disponibilidad" class="ew-template"><input type="radio" class="custom-control-input" data-table="disponibilidad_hospitalaria" data-field="x_estado_disponibilidad" data-value-separator="<?php echo $disponibilidad_hospitalaria_add->estado_disponibilidad->displayValueSeparatorAttribute() ?>" name="x_estado_disponibilidad" id="x_estado_disponibilidad" value="{value}"<?php echo $disponibilidad_hospitalaria_add->estado_disponibilidad->editAttributes() ?>></div>
<div id="dsl_x_estado_disponibilidad" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $disponibilidad_hospitalaria_add->estado_disponibilidad->radioButtonListHtml(FALSE, "x_estado_disponibilidad") ?>
</div></div>
</span>
<?php echo $disponibilidad_hospitalaria_add->estado_disponibilidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_add->cantidad_camas->Visible) { // cantidad_camas ?>
	<div id="r_cantidad_camas" class="form-group row">
		<label id="elh_disponibilidad_hospitalaria_cantidad_camas" for="x_cantidad_camas" class="<?php echo $disponibilidad_hospitalaria_add->LeftColumnClass ?>"><?php echo $disponibilidad_hospitalaria_add->cantidad_camas->caption() ?><?php echo $disponibilidad_hospitalaria_add->cantidad_camas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $disponibilidad_hospitalaria_add->RightColumnClass ?>"><div <?php echo $disponibilidad_hospitalaria_add->cantidad_camas->cellAttributes() ?>>
<span id="el_disponibilidad_hospitalaria_cantidad_camas">
<input type="text" data-table="disponibilidad_hospitalaria" data-field="x_cantidad_camas" name="x_cantidad_camas" id="x_cantidad_camas" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($disponibilidad_hospitalaria_add->cantidad_camas->getPlaceHolder()) ?>" value="<?php echo $disponibilidad_hospitalaria_add->cantidad_camas->EditValue ?>"<?php echo $disponibilidad_hospitalaria_add->cantidad_camas->editAttributes() ?>>
</span>
<?php echo $disponibilidad_hospitalaria_add->cantidad_camas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_add->nombre_reporta->Visible) { // nombre_reporta ?>
	<div id="r_nombre_reporta" class="form-group row">
		<label id="elh_disponibilidad_hospitalaria_nombre_reporta" for="x_nombre_reporta" class="<?php echo $disponibilidad_hospitalaria_add->LeftColumnClass ?>"><?php echo $disponibilidad_hospitalaria_add->nombre_reporta->caption() ?><?php echo $disponibilidad_hospitalaria_add->nombre_reporta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $disponibilidad_hospitalaria_add->RightColumnClass ?>"><div <?php echo $disponibilidad_hospitalaria_add->nombre_reporta->cellAttributes() ?>>
<span id="el_disponibilidad_hospitalaria_nombre_reporta">
<input type="text" data-table="disponibilidad_hospitalaria" data-field="x_nombre_reporta" name="x_nombre_reporta" id="x_nombre_reporta" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($disponibilidad_hospitalaria_add->nombre_reporta->getPlaceHolder()) ?>" value="<?php echo $disponibilidad_hospitalaria_add->nombre_reporta->EditValue ?>"<?php echo $disponibilidad_hospitalaria_add->nombre_reporta->editAttributes() ?>>
</span>
<?php echo $disponibilidad_hospitalaria_add->nombre_reporta->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($disponibilidad_hospitalaria_add->telefono->Visible) { // telefono ?>
	<div id="r_telefono" class="form-group row">
		<label id="elh_disponibilidad_hospitalaria_telefono" for="x_telefono" class="<?php echo $disponibilidad_hospitalaria_add->LeftColumnClass ?>"><?php echo $disponibilidad_hospitalaria_add->telefono->caption() ?><?php echo $disponibilidad_hospitalaria_add->telefono->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $disponibilidad_hospitalaria_add->RightColumnClass ?>"><div <?php echo $disponibilidad_hospitalaria_add->telefono->cellAttributes() ?>>
<span id="el_disponibilidad_hospitalaria_telefono">
<input type="text" data-table="disponibilidad_hospitalaria" data-field="x_telefono" name="x_telefono" id="x_telefono" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($disponibilidad_hospitalaria_add->telefono->getPlaceHolder()) ?>" value="<?php echo $disponibilidad_hospitalaria_add->telefono->EditValue ?>"<?php echo $disponibilidad_hospitalaria_add->telefono->editAttributes() ?>>
</span>
<?php echo $disponibilidad_hospitalaria_add->telefono->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$disponibilidad_hospitalaria_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $disponibilidad_hospitalaria_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $disponibilidad_hospitalaria_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$disponibilidad_hospitalaria_add->showPageFooter();
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
$disponibilidad_hospitalaria_add->terminate();
?>