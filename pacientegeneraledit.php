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
$pacientegeneral_edit = new pacientegeneral_edit();

// Run the page
$pacientegeneral_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pacientegeneral_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpacientegeneraledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpacientegeneraledit = currentForm = new ew.Form("fpacientegeneraledit", "edit");

	// Validate form
	fpacientegeneraledit.validate = function() {
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
			<?php if ($pacientegeneral_edit->cod_casointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->cod_casointerh->caption(), $pacientegeneral_edit->cod_casointerh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casointerh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pacientegeneral_edit->cod_casointerh->errorMessage()) ?>");
			<?php if ($pacientegeneral_edit->expendiente->Required) { ?>
				elm = this.getElements("x" + infix + "_expendiente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->expendiente->caption(), $pacientegeneral_edit->expendiente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->tipo_doc->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_doc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->tipo_doc->caption(), $pacientegeneral_edit->tipo_doc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->num_doc->Required) { ?>
				elm = this.getElements("x" + infix + "_num_doc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->num_doc->caption(), $pacientegeneral_edit->num_doc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->nombre1->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->nombre1->caption(), $pacientegeneral_edit->nombre1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->nombre2->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->nombre2->caption(), $pacientegeneral_edit->nombre2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->apellido1->Required) { ?>
				elm = this.getElements("x" + infix + "_apellido1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->apellido1->caption(), $pacientegeneral_edit->apellido1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->apellido2->Required) { ?>
				elm = this.getElements("x" + infix + "_apellido2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->apellido2->caption(), $pacientegeneral_edit->apellido2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->genero->Required) { ?>
				elm = this.getElements("x" + infix + "_genero");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->genero->caption(), $pacientegeneral_edit->genero->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->edad->Required) { ?>
				elm = this.getElements("x" + infix + "_edad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->edad->caption(), $pacientegeneral_edit->edad->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_edad");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pacientegeneral_edit->edad->errorMessage()) ?>");
			<?php if ($pacientegeneral_edit->fecha_nacido->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_nacido");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->fecha_nacido->caption(), $pacientegeneral_edit->fecha_nacido->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_nacido");
				if (elm && !ew.checkDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pacientegeneral_edit->fecha_nacido->errorMessage()) ?>");
			<?php if ($pacientegeneral_edit->cod_edad->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_edad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->cod_edad->caption(), $pacientegeneral_edit->cod_edad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->telefono->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->telefono->caption(), $pacientegeneral_edit->telefono->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->celular->Required) { ?>
				elm = this.getElements("x" + infix + "_celular");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->celular->caption(), $pacientegeneral_edit->celular->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->direccion->Required) { ?>
				elm = this.getElements("x" + infix + "_direccion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->direccion->caption(), $pacientegeneral_edit->direccion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->aseguradro->Required) { ?>
				elm = this.getElements("x" + infix + "_aseguradro");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->aseguradro->caption(), $pacientegeneral_edit->aseguradro->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->observacion->Required) { ?>
				elm = this.getElements("x" + infix + "_observacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->observacion->caption(), $pacientegeneral_edit->observacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_edit->nss->Required) { ?>
				elm = this.getElements("x" + infix + "_nss");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_edit->nss->caption(), $pacientegeneral_edit->nss->RequiredErrorMessage)) ?>");
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
	fpacientegeneraledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpacientegeneraledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpacientegeneraledit.lists["x_tipo_doc"] = <?php echo $pacientegeneral_edit->tipo_doc->Lookup->toClientList($pacientegeneral_edit) ?>;
	fpacientegeneraledit.lists["x_tipo_doc"].options = <?php echo JsonEncode($pacientegeneral_edit->tipo_doc->lookupOptions()) ?>;
	fpacientegeneraledit.lists["x_genero"] = <?php echo $pacientegeneral_edit->genero->Lookup->toClientList($pacientegeneral_edit) ?>;
	fpacientegeneraledit.lists["x_genero"].options = <?php echo JsonEncode($pacientegeneral_edit->genero->lookupOptions()) ?>;
	fpacientegeneraledit.lists["x_cod_edad"] = <?php echo $pacientegeneral_edit->cod_edad->Lookup->toClientList($pacientegeneral_edit) ?>;
	fpacientegeneraledit.lists["x_cod_edad"].options = <?php echo JsonEncode($pacientegeneral_edit->cod_edad->lookupOptions()) ?>;
	fpacientegeneraledit.lists["x_aseguradro"] = <?php echo $pacientegeneral_edit->aseguradro->Lookup->toClientList($pacientegeneral_edit) ?>;
	fpacientegeneraledit.lists["x_aseguradro"].options = <?php echo JsonEncode($pacientegeneral_edit->aseguradro->lookupOptions()) ?>;
	loadjs.done("fpacientegeneraledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $pacientegeneral_edit->showPageHeader(); ?>
<?php
$pacientegeneral_edit->showMessage();
?>
<form name="fpacientegeneraledit" id="fpacientegeneraledit" class="<?php echo $pacientegeneral_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pacientegeneral">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pacientegeneral_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($pacientegeneral_edit->cod_casointerh->Visible) { // cod_casointerh ?>
	<div id="r_cod_casointerh" class="form-group row">
		<label id="elh_pacientegeneral_cod_casointerh" for="x_cod_casointerh" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_cod_casointerh" type="text/html"><?php echo $pacientegeneral_edit->cod_casointerh->caption() ?><?php echo $pacientegeneral_edit->cod_casointerh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->cod_casointerh->cellAttributes() ?>>
<input type="text" data-table="pacientegeneral" data-field="x_cod_casointerh" name="x_cod_casointerh" id="x_cod_casointerh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->cod_casointerh->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->cod_casointerh->EditValue ?>"<?php echo $pacientegeneral_edit->cod_casointerh->editAttributes() ?>>
<input type="hidden" data-table="pacientegeneral" data-field="x_cod_casointerh" name="o_cod_casointerh" id="o_cod_casointerh" value="<?php echo HtmlEncode($pacientegeneral_edit->cod_casointerh->OldValue != null ? $pacientegeneral_edit->cod_casointerh->OldValue : $pacientegeneral_edit->cod_casointerh->CurrentValue) ?>">
<?php echo $pacientegeneral_edit->cod_casointerh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->expendiente->Visible) { // expendiente ?>
	<div id="r_expendiente" class="form-group row">
		<label id="elh_pacientegeneral_expendiente" for="x_expendiente" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_expendiente" type="text/html"><?php echo $pacientegeneral_edit->expendiente->caption() ?><?php echo $pacientegeneral_edit->expendiente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->expendiente->cellAttributes() ?>>
<script id="tpx_pacientegeneral_expendiente" type="text/html"><span id="el_pacientegeneral_expendiente">
<input type="text" data-table="pacientegeneral" data-field="x_expendiente" name="x_expendiente" id="x_expendiente" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->expendiente->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->expendiente->EditValue ?>"<?php echo $pacientegeneral_edit->expendiente->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->expendiente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->tipo_doc->Visible) { // tipo_doc ?>
	<div id="r_tipo_doc" class="form-group row">
		<label id="elh_pacientegeneral_tipo_doc" for="x_tipo_doc" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_tipo_doc" type="text/html"><?php echo $pacientegeneral_edit->tipo_doc->caption() ?><?php echo $pacientegeneral_edit->tipo_doc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->tipo_doc->cellAttributes() ?>>
<script id="tpx_pacientegeneral_tipo_doc" type="text/html"><span id="el_pacientegeneral_tipo_doc">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pacientegeneral" data-field="x_tipo_doc" data-value-separator="<?php echo $pacientegeneral_edit->tipo_doc->displayValueSeparatorAttribute() ?>" id="x_tipo_doc" name="x_tipo_doc"<?php echo $pacientegeneral_edit->tipo_doc->editAttributes() ?>>
			<?php echo $pacientegeneral_edit->tipo_doc->selectOptionListHtml("x_tipo_doc") ?>
		</select>
</div>
<?php echo $pacientegeneral_edit->tipo_doc->Lookup->getParamTag($pacientegeneral_edit, "p_x_tipo_doc") ?>
</span></script>
<?php echo $pacientegeneral_edit->tipo_doc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->num_doc->Visible) { // num_doc ?>
	<div id="r_num_doc" class="form-group row">
		<label id="elh_pacientegeneral_num_doc" for="x_num_doc" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_num_doc" type="text/html"><?php echo $pacientegeneral_edit->num_doc->caption() ?><?php echo $pacientegeneral_edit->num_doc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->num_doc->cellAttributes() ?>>
<script id="tpx_pacientegeneral_num_doc" type="text/html"><span id="el_pacientegeneral_num_doc">
<input type="text" data-table="pacientegeneral" data-field="x_num_doc" name="x_num_doc" id="x_num_doc" size="12" maxlength="40" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->num_doc->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->num_doc->EditValue ?>"<?php echo $pacientegeneral_edit->num_doc->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->num_doc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->nombre1->Visible) { // nombre1 ?>
	<div id="r_nombre1" class="form-group row">
		<label id="elh_pacientegeneral_nombre1" for="x_nombre1" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_nombre1" type="text/html"><?php echo $pacientegeneral_edit->nombre1->caption() ?><?php echo $pacientegeneral_edit->nombre1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->nombre1->cellAttributes() ?>>
<script id="tpx_pacientegeneral_nombre1" type="text/html"><span id="el_pacientegeneral_nombre1">
<input type="text" data-table="pacientegeneral" data-field="x_nombre1" name="x_nombre1" id="x_nombre1" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->nombre1->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->nombre1->EditValue ?>"<?php echo $pacientegeneral_edit->nombre1->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->nombre1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->nombre2->Visible) { // nombre2 ?>
	<div id="r_nombre2" class="form-group row">
		<label id="elh_pacientegeneral_nombre2" for="x_nombre2" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_nombre2" type="text/html"><?php echo $pacientegeneral_edit->nombre2->caption() ?><?php echo $pacientegeneral_edit->nombre2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->nombre2->cellAttributes() ?>>
<script id="tpx_pacientegeneral_nombre2" type="text/html"><span id="el_pacientegeneral_nombre2">
<input type="text" data-table="pacientegeneral" data-field="x_nombre2" name="x_nombre2" id="x_nombre2" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->nombre2->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->nombre2->EditValue ?>"<?php echo $pacientegeneral_edit->nombre2->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->nombre2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->apellido1->Visible) { // apellido1 ?>
	<div id="r_apellido1" class="form-group row">
		<label id="elh_pacientegeneral_apellido1" for="x_apellido1" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_apellido1" type="text/html"><?php echo $pacientegeneral_edit->apellido1->caption() ?><?php echo $pacientegeneral_edit->apellido1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->apellido1->cellAttributes() ?>>
<script id="tpx_pacientegeneral_apellido1" type="text/html"><span id="el_pacientegeneral_apellido1">
<input type="text" data-table="pacientegeneral" data-field="x_apellido1" name="x_apellido1" id="x_apellido1" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->apellido1->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->apellido1->EditValue ?>"<?php echo $pacientegeneral_edit->apellido1->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->apellido1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->apellido2->Visible) { // apellido2 ?>
	<div id="r_apellido2" class="form-group row">
		<label id="elh_pacientegeneral_apellido2" for="x_apellido2" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_apellido2" type="text/html"><?php echo $pacientegeneral_edit->apellido2->caption() ?><?php echo $pacientegeneral_edit->apellido2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->apellido2->cellAttributes() ?>>
<script id="tpx_pacientegeneral_apellido2" type="text/html"><span id="el_pacientegeneral_apellido2">
<input type="text" data-table="pacientegeneral" data-field="x_apellido2" name="x_apellido2" id="x_apellido2" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->apellido2->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->apellido2->EditValue ?>"<?php echo $pacientegeneral_edit->apellido2->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->apellido2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->genero->Visible) { // genero ?>
	<div id="r_genero" class="form-group row">
		<label id="elh_pacientegeneral_genero" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_genero" type="text/html"><?php echo $pacientegeneral_edit->genero->caption() ?><?php echo $pacientegeneral_edit->genero->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->genero->cellAttributes() ?>>
<script id="tpx_pacientegeneral_genero" type="text/html"><span id="el_pacientegeneral_genero">
<div id="tp_x_genero" class="ew-template"><input type="radio" class="custom-control-input" data-table="pacientegeneral" data-field="x_genero" data-value-separator="<?php echo $pacientegeneral_edit->genero->displayValueSeparatorAttribute() ?>" name="x_genero" id="x_genero" value="{value}"<?php echo $pacientegeneral_edit->genero->editAttributes() ?>></div>
<div id="dsl_x_genero" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pacientegeneral_edit->genero->radioButtonListHtml(FALSE, "x_genero") ?>
</div></div>
<?php echo $pacientegeneral_edit->genero->Lookup->getParamTag($pacientegeneral_edit, "p_x_genero") ?>
</span></script>
<?php echo $pacientegeneral_edit->genero->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->edad->Visible) { // edad ?>
	<div id="r_edad" class="form-group row">
		<label id="elh_pacientegeneral_edad" for="x_edad" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_edad" type="text/html"><?php echo $pacientegeneral_edit->edad->caption() ?><?php echo $pacientegeneral_edit->edad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->edad->cellAttributes() ?>>
<script id="tpx_pacientegeneral_edad" type="text/html"><span id="el_pacientegeneral_edad">
<input type="text" data-table="pacientegeneral" data-field="x_edad" name="x_edad" id="x_edad" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->edad->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->edad->EditValue ?>"<?php echo $pacientegeneral_edit->edad->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->edad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->fecha_nacido->Visible) { // fecha_nacido ?>
	<div id="r_fecha_nacido" class="form-group row">
		<label id="elh_pacientegeneral_fecha_nacido" for="x_fecha_nacido" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_fecha_nacido" type="text/html"><?php echo $pacientegeneral_edit->fecha_nacido->caption() ?><?php echo $pacientegeneral_edit->fecha_nacido->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->fecha_nacido->cellAttributes() ?>>
<script id="tpx_pacientegeneral_fecha_nacido" type="text/html"><span id="el_pacientegeneral_fecha_nacido">
<input type="text" data-table="pacientegeneral" data-field="x_fecha_nacido" name="x_fecha_nacido" id="x_fecha_nacido" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->fecha_nacido->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->fecha_nacido->EditValue ?>"<?php echo $pacientegeneral_edit->fecha_nacido->editAttributes() ?>>
<?php if (!$pacientegeneral_edit->fecha_nacido->ReadOnly && !$pacientegeneral_edit->fecha_nacido->Disabled && !isset($pacientegeneral_edit->fecha_nacido->EditAttrs["readonly"]) && !isset($pacientegeneral_edit->fecha_nacido->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="pacientegeneraledit_js">
loadjs.ready(["fpacientegeneraledit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpacientegeneraledit", "x_fecha_nacido", {"ignoreReadonly":true,"useCurrent":false,"format":5});
});
</script>
<?php echo $pacientegeneral_edit->fecha_nacido->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->cod_edad->Visible) { // cod_edad ?>
	<div id="r_cod_edad" class="form-group row">
		<label id="elh_pacientegeneral_cod_edad" for="x_cod_edad" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_cod_edad" type="text/html"><?php echo $pacientegeneral_edit->cod_edad->caption() ?><?php echo $pacientegeneral_edit->cod_edad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->cod_edad->cellAttributes() ?>>
<script id="tpx_pacientegeneral_cod_edad" type="text/html"><span id="el_pacientegeneral_cod_edad">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pacientegeneral" data-field="x_cod_edad" data-value-separator="<?php echo $pacientegeneral_edit->cod_edad->displayValueSeparatorAttribute() ?>" id="x_cod_edad" name="x_cod_edad"<?php echo $pacientegeneral_edit->cod_edad->editAttributes() ?>>
			<?php echo $pacientegeneral_edit->cod_edad->selectOptionListHtml("x_cod_edad") ?>
		</select>
</div>
<?php echo $pacientegeneral_edit->cod_edad->Lookup->getParamTag($pacientegeneral_edit, "p_x_cod_edad") ?>
</span></script>
<?php echo $pacientegeneral_edit->cod_edad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->telefono->Visible) { // telefono ?>
	<div id="r_telefono" class="form-group row">
		<label id="elh_pacientegeneral_telefono" for="x_telefono" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_telefono" type="text/html"><?php echo $pacientegeneral_edit->telefono->caption() ?><?php echo $pacientegeneral_edit->telefono->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->telefono->cellAttributes() ?>>
<script id="tpx_pacientegeneral_telefono" type="text/html"><span id="el_pacientegeneral_telefono">
<input type="text" data-table="pacientegeneral" data-field="x_telefono" name="x_telefono" id="x_telefono" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->telefono->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->telefono->EditValue ?>"<?php echo $pacientegeneral_edit->telefono->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->telefono->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->celular->Visible) { // celular ?>
	<div id="r_celular" class="form-group row">
		<label id="elh_pacientegeneral_celular" for="x_celular" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_celular" type="text/html"><?php echo $pacientegeneral_edit->celular->caption() ?><?php echo $pacientegeneral_edit->celular->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->celular->cellAttributes() ?>>
<script id="tpx_pacientegeneral_celular" type="text/html"><span id="el_pacientegeneral_celular">
<input type="text" data-table="pacientegeneral" data-field="x_celular" name="x_celular" id="x_celular" size="30" maxlength="13" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->celular->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->celular->EditValue ?>"<?php echo $pacientegeneral_edit->celular->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->celular->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->direccion->Visible) { // direccion ?>
	<div id="r_direccion" class="form-group row">
		<label id="elh_pacientegeneral_direccion" for="x_direccion" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_direccion" type="text/html"><?php echo $pacientegeneral_edit->direccion->caption() ?><?php echo $pacientegeneral_edit->direccion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->direccion->cellAttributes() ?>>
<script id="tpx_pacientegeneral_direccion" type="text/html"><span id="el_pacientegeneral_direccion">
<input type="text" data-table="pacientegeneral" data-field="x_direccion" name="x_direccion" id="x_direccion" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->direccion->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->direccion->EditValue ?>"<?php echo $pacientegeneral_edit->direccion->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->direccion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->aseguradro->Visible) { // aseguradro ?>
	<div id="r_aseguradro" class="form-group row">
		<label id="elh_pacientegeneral_aseguradro" for="x_aseguradro" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_aseguradro" type="text/html"><?php echo $pacientegeneral_edit->aseguradro->caption() ?><?php echo $pacientegeneral_edit->aseguradro->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->aseguradro->cellAttributes() ?>>
<script id="tpx_pacientegeneral_aseguradro" type="text/html"><span id="el_pacientegeneral_aseguradro">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pacientegeneral" data-field="x_aseguradro" data-value-separator="<?php echo $pacientegeneral_edit->aseguradro->displayValueSeparatorAttribute() ?>" id="x_aseguradro" name="x_aseguradro"<?php echo $pacientegeneral_edit->aseguradro->editAttributes() ?>>
			<?php echo $pacientegeneral_edit->aseguradro->selectOptionListHtml("x_aseguradro") ?>
		</select>
</div>
<?php echo $pacientegeneral_edit->aseguradro->Lookup->getParamTag($pacientegeneral_edit, "p_x_aseguradro") ?>
</span></script>
<?php echo $pacientegeneral_edit->aseguradro->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->observacion->Visible) { // observacion ?>
	<div id="r_observacion" class="form-group row">
		<label id="elh_pacientegeneral_observacion" for="x_observacion" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_observacion" type="text/html"><?php echo $pacientegeneral_edit->observacion->caption() ?><?php echo $pacientegeneral_edit->observacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->observacion->cellAttributes() ?>>
<script id="tpx_pacientegeneral_observacion" type="text/html"><span id="el_pacientegeneral_observacion">
<textarea data-table="pacientegeneral" data-field="x_observacion" name="x_observacion" id="x_observacion" cols="10" rows="2" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->observacion->getPlaceHolder()) ?>"<?php echo $pacientegeneral_edit->observacion->editAttributes() ?>><?php echo $pacientegeneral_edit->observacion->EditValue ?></textarea>
</span></script>
<?php echo $pacientegeneral_edit->observacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pacientegeneral_edit->nss->Visible) { // nss ?>
	<div id="r_nss" class="form-group row">
		<label id="elh_pacientegeneral_nss" for="x_nss" class="<?php echo $pacientegeneral_edit->LeftColumnClass ?>"><script id="tpc_pacientegeneral_nss" type="text/html"><?php echo $pacientegeneral_edit->nss->caption() ?><?php echo $pacientegeneral_edit->nss->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pacientegeneral_edit->RightColumnClass ?>"><div <?php echo $pacientegeneral_edit->nss->cellAttributes() ?>>
<script id="tpx_pacientegeneral_nss" type="text/html"><span id="el_pacientegeneral_nss">
<input type="text" data-table="pacientegeneral" data-field="x_nss" name="x_nss" id="x_nss" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($pacientegeneral_edit->nss->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_edit->nss->EditValue ?>"<?php echo $pacientegeneral_edit->nss->editAttributes() ?>>
</span></script>
<?php echo $pacientegeneral_edit->nss->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pacientegeneraledit" class="ew-custom-template"></div>
<script id="tpm_pacientegeneraledit" type="text/html">
<div id="ct_pacientegeneral_edit">
<hr>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->tipo_doc->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_tipo_doc")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->num_doc->caption() ?></label></br>
	 {{include tmpl=~getTemplate("#tpx_pacientegeneral_num_doc")/}}
	 <?php 
	 $url_sql= Executescalar("SELECT idpersonas FROM webservices;");	  
	 echo "<button  onClick = \"busca_doc('".$url_sql."');\" class=\"btn btn-default\" type=\"button\"><i class=\"fas fa-address-card\"></i></button>";		
	?>	 	 
	<div id = "datos_doc">
	</div>
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->expendiente->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_expendiente")/}}
	</div>
 </div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->nombre1->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_nombre1")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->nombre2->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_nombre2")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->apellido1->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_apellido1")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->apellido2->caption() ?></label></br>
	 {{include tmpl=~getTemplate("#tpx_pacientegeneral_apellido2")/}}
	</div>
 </div>
 <div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->genero->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_genero")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->edad->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_edad")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->cod_edad->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_cod_edad")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->fecha_nacido->caption() ?></label></br>
	 {{include tmpl=~getTemplate("#tpx_pacientegeneral_fecha_nacido")/}}
	</div>
 </div>
  <div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->telefono->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_telefono")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->direccion->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_direccion")/}}
	</div>
	</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $pacientegeneral_edit->nss->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_nss")/}}
	</div>
	<div class="form-group col-md-4">
	<label><?php echo $pacientegeneral_edit->observacion->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_pacientegeneral_observacion")/}}
	 </div>
 </div>
 </div>
</div>
</script>
<script type="text/html" class="pacientegeneraledit_js">


function obtenerDatos(acode) {

/*
	let url = "https://s3.amazonaws.com/dolartoday/data.json?acode="+acode; //Ruta de solicitud 
	console.log(acode);
	const api = new XMLHttpRequest();
	api.open('GET', url, true);
	api.send();
	api.onreadystatechange = function () {
		if (this.status==200 && this.readyState == 4) { //cambiar a respuesta de central
			let datos = JSON.parse(this.responseText);
			let item = datos.USDCOL;
			document.getElementById('x_num_doc').value = `${item.rate}${item.ratetrm}`;
		}
	}
*/
}

function busca_doc(url){
	var doc =document.getElementById("x_num_doc").value;
	console.log(doc);

	//var url = url;
	var parametros = {
		"doc" : doc, "url": url
	};
	$.ajax({
		data: parametros,
		url: "pacientes.php",
		type: "POST",
		success:function(respose){
			$("#datos_doc").html(respose);

		//	document.getElementById("x_nombre1").value = html(respose);
			console.log(html(respose));
		}
	});
}

</script>

<?php if (!$pacientegeneral_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pacientegeneral_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pacientegeneral_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pacientegeneral->Rows) ?> };
	ew.applyTemplate("tpd_pacientegeneraledit", "tpm_pacientegeneraledit", "pacientegeneraledit", "<?php echo $pacientegeneral->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pacientegeneraledit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pacientegeneral_edit->showPageFooter();
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
$pacientegeneral_edit->terminate();
?>