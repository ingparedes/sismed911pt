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
$ambulancias_add = new ambulancias_add();

// Run the page
$ambulancias_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ambulancias_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fambulanciasadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fambulanciasadd = currentForm = new ew.Form("fambulanciasadd", "add");

	// Validate form
	fambulanciasadd.validate = function() {
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
			<?php if ($ambulancias_add->cod_ambulancias->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_ambulancias");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->cod_ambulancias->caption(), $ambulancias_add->cod_ambulancias->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->placas->Required) { ?>
				elm = this.getElements("x" + infix + "_placas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->placas->caption(), $ambulancias_add->placas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->chasis->Required) { ?>
				elm = this.getElements("x" + infix + "_chasis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->chasis->caption(), $ambulancias_add->chasis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->marca->Required) { ?>
				elm = this.getElements("x" + infix + "_marca");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->marca->caption(), $ambulancias_add->marca->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->modelo->Required) { ?>
				elm = this.getElements("x" + infix + "_modelo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->modelo->caption(), $ambulancias_add->modelo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->tipo_translado->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_translado");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->tipo_translado->caption(), $ambulancias_add->tipo_translado->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->tipo_conbustible->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_conbustible");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->tipo_conbustible->caption(), $ambulancias_add->tipo_conbustible->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->modalidad->Required) { ?>
				elm = this.getElements("x" + infix + "_modalidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->modalidad->caption(), $ambulancias_add->modalidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->estado->Required) { ?>
				elm = this.getElements("x" + infix + "_estado");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->estado->caption(), $ambulancias_add->estado->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->ubicacion->Required) { ?>
				elm = this.getElements("x" + infix + "_ubicacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->ubicacion->caption(), $ambulancias_add->ubicacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->disponible->Required) { ?>
				elm = this.getElements("x" + infix + "_disponible");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->disponible->caption(), $ambulancias_add->disponible->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->fecha_iniseguro->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_iniseguro");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->fecha_iniseguro->caption(), $ambulancias_add->fecha_iniseguro->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_iniseguro");
				if (elm && !ew.checkDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ambulancias_add->fecha_iniseguro->errorMessage()) ?>");
			<?php if ($ambulancias_add->fecha_finseguro->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_finseguro");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->fecha_finseguro->caption(), $ambulancias_add->fecha_finseguro->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_finseguro");
				if (elm && !ew.checkDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ambulancias_add->fecha_finseguro->errorMessage()) ?>");
			<?php if ($ambulancias_add->entidad->Required) { ?>
				elm = this.getElements("x" + infix + "_entidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->entidad->caption(), $ambulancias_add->entidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->observacion->Required) { ?>
				elm = this.getElements("x" + infix + "_observacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->observacion->caption(), $ambulancias_add->observacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->asiganda->Required) { ?>
				elm = this.getElements("x" + infix + "_asiganda");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->asiganda->caption(), $ambulancias_add->asiganda->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->config_manteni->Required) { ?>
				elm = this.getElements("x" + infix + "_config_manteni");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->config_manteni->caption(), $ambulancias_add->config_manteni->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->fecha_creacion->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_creacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->fecha_creacion->caption(), $ambulancias_add->fecha_creacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->longitudambulancia->Required) { ?>
				elm = this.getElements("x" + infix + "_longitudambulancia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->longitudambulancia->caption(), $ambulancias_add->longitudambulancia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->latituambulancia->Required) { ?>
				elm = this.getElements("x" + infix + "_latituambulancia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->latituambulancia->caption(), $ambulancias_add->latituambulancia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_add->especial->Required) { ?>
				elm = this.getElements("x" + infix + "_especial");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_add->especial->caption(), $ambulancias_add->especial->RequiredErrorMessage)) ?>");
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
	fambulanciasadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fambulanciasadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fambulanciasadd.lists["x_tipo_translado"] = <?php echo $ambulancias_add->tipo_translado->Lookup->toClientList($ambulancias_add) ?>;
	fambulanciasadd.lists["x_tipo_translado"].options = <?php echo JsonEncode($ambulancias_add->tipo_translado->lookupOptions()) ?>;
	fambulanciasadd.lists["x_modalidad"] = <?php echo $ambulancias_add->modalidad->Lookup->toClientList($ambulancias_add) ?>;
	fambulanciasadd.lists["x_modalidad"].options = <?php echo JsonEncode($ambulancias_add->modalidad->lookupOptions()) ?>;
	fambulanciasadd.lists["x_estado"] = <?php echo $ambulancias_add->estado->Lookup->toClientList($ambulancias_add) ?>;
	fambulanciasadd.lists["x_estado"].options = <?php echo JsonEncode($ambulancias_add->estado->options(FALSE, TRUE)) ?>;
	fambulanciasadd.lists["x_ubicacion"] = <?php echo $ambulancias_add->ubicacion->Lookup->toClientList($ambulancias_add) ?>;
	fambulanciasadd.lists["x_ubicacion"].options = <?php echo JsonEncode($ambulancias_add->ubicacion->lookupOptions()) ?>;
	fambulanciasadd.lists["x_entidad"] = <?php echo $ambulancias_add->entidad->Lookup->toClientList($ambulancias_add) ?>;
	fambulanciasadd.lists["x_entidad"].options = <?php echo JsonEncode($ambulancias_add->entidad->lookupOptions()) ?>;
	fambulanciasadd.autoSuggests["x_entidad"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fambulanciasadd.lists["x_especial"] = <?php echo $ambulancias_add->especial->Lookup->toClientList($ambulancias_add) ?>;
	fambulanciasadd.lists["x_especial"].options = <?php echo JsonEncode($ambulancias_add->especial->lookupOptions()) ?>;
	loadjs.done("fambulanciasadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ambulancias_add->showPageHeader(); ?>
<?php
$ambulancias_add->showMessage();
?>
<form name="fambulanciasadd" id="fambulanciasadd" class="<?php echo $ambulancias_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ambulancias">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ambulancias_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ambulancias_add->cod_ambulancias->Visible) { // cod_ambulancias ?>
	<div id="r_cod_ambulancias" class="form-group row">
		<label id="elh_ambulancias_cod_ambulancias" for="x_cod_ambulancias" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_cod_ambulancias" type="text/html"><?php echo $ambulancias_add->cod_ambulancias->caption() ?><?php echo $ambulancias_add->cod_ambulancias->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->cod_ambulancias->cellAttributes() ?>>
<script id="tpx_ambulancias_cod_ambulancias" type="text/html"><span id="el_ambulancias_cod_ambulancias">
<input type="text" data-table="ambulancias" data-field="x_cod_ambulancias" name="x_cod_ambulancias" id="x_cod_ambulancias" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($ambulancias_add->cod_ambulancias->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->cod_ambulancias->EditValue ?>"<?php echo $ambulancias_add->cod_ambulancias->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->cod_ambulancias->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->placas->Visible) { // placas ?>
	<div id="r_placas" class="form-group row">
		<label id="elh_ambulancias_placas" for="x_placas" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_placas" type="text/html"><?php echo $ambulancias_add->placas->caption() ?><?php echo $ambulancias_add->placas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->placas->cellAttributes() ?>>
<script id="tpx_ambulancias_placas" type="text/html"><span id="el_ambulancias_placas">
<input type="text" data-table="ambulancias" data-field="x_placas" name="x_placas" id="x_placas" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($ambulancias_add->placas->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->placas->EditValue ?>"<?php echo $ambulancias_add->placas->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->placas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->chasis->Visible) { // chasis ?>
	<div id="r_chasis" class="form-group row">
		<label id="elh_ambulancias_chasis" for="x_chasis" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_chasis" type="text/html"><?php echo $ambulancias_add->chasis->caption() ?><?php echo $ambulancias_add->chasis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->chasis->cellAttributes() ?>>
<script id="tpx_ambulancias_chasis" type="text/html"><span id="el_ambulancias_chasis">
<input type="text" data-table="ambulancias" data-field="x_chasis" name="x_chasis" id="x_chasis" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($ambulancias_add->chasis->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->chasis->EditValue ?>"<?php echo $ambulancias_add->chasis->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->chasis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->marca->Visible) { // marca ?>
	<div id="r_marca" class="form-group row">
		<label id="elh_ambulancias_marca" for="x_marca" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_marca" type="text/html"><?php echo $ambulancias_add->marca->caption() ?><?php echo $ambulancias_add->marca->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->marca->cellAttributes() ?>>
<script id="tpx_ambulancias_marca" type="text/html"><span id="el_ambulancias_marca">
<input type="text" data-table="ambulancias" data-field="x_marca" name="x_marca" id="x_marca" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ambulancias_add->marca->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->marca->EditValue ?>"<?php echo $ambulancias_add->marca->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->marca->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->modelo->Visible) { // modelo ?>
	<div id="r_modelo" class="form-group row">
		<label id="elh_ambulancias_modelo" for="x_modelo" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_modelo" type="text/html"><?php echo $ambulancias_add->modelo->caption() ?><?php echo $ambulancias_add->modelo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->modelo->cellAttributes() ?>>
<script id="tpx_ambulancias_modelo" type="text/html"><span id="el_ambulancias_modelo">
<input type="text" data-table="ambulancias" data-field="x_modelo" name="x_modelo" id="x_modelo" size="30" maxlength="32" placeholder="<?php echo HtmlEncode($ambulancias_add->modelo->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->modelo->EditValue ?>"<?php echo $ambulancias_add->modelo->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->modelo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->tipo_translado->Visible) { // tipo_translado ?>
	<div id="r_tipo_translado" class="form-group row">
		<label id="elh_ambulancias_tipo_translado" for="x_tipo_translado" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_tipo_translado" type="text/html"><?php echo $ambulancias_add->tipo_translado->caption() ?><?php echo $ambulancias_add->tipo_translado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->tipo_translado->cellAttributes() ?>>
<script id="tpx_ambulancias_tipo_translado" type="text/html"><span id="el_ambulancias_tipo_translado">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ambulancias" data-field="x_tipo_translado" data-value-separator="<?php echo $ambulancias_add->tipo_translado->displayValueSeparatorAttribute() ?>" id="x_tipo_translado" name="x_tipo_translado"<?php echo $ambulancias_add->tipo_translado->editAttributes() ?>>
			<?php echo $ambulancias_add->tipo_translado->selectOptionListHtml("x_tipo_translado") ?>
		</select>
</div>
<?php echo $ambulancias_add->tipo_translado->Lookup->getParamTag($ambulancias_add, "p_x_tipo_translado") ?>
</span></script>
<?php echo $ambulancias_add->tipo_translado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->tipo_conbustible->Visible) { // tipo_conbustible ?>
	<div id="r_tipo_conbustible" class="form-group row">
		<label id="elh_ambulancias_tipo_conbustible" for="x_tipo_conbustible" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_tipo_conbustible" type="text/html"><?php echo $ambulancias_add->tipo_conbustible->caption() ?><?php echo $ambulancias_add->tipo_conbustible->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->tipo_conbustible->cellAttributes() ?>>
<script id="tpx_ambulancias_tipo_conbustible" type="text/html"><span id="el_ambulancias_tipo_conbustible">
<input type="text" data-table="ambulancias" data-field="x_tipo_conbustible" name="x_tipo_conbustible" id="x_tipo_conbustible" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($ambulancias_add->tipo_conbustible->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->tipo_conbustible->EditValue ?>"<?php echo $ambulancias_add->tipo_conbustible->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->tipo_conbustible->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->modalidad->Visible) { // modalidad ?>
	<div id="r_modalidad" class="form-group row">
		<label id="elh_ambulancias_modalidad" for="x_modalidad" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_modalidad" type="text/html"><?php echo $ambulancias_add->modalidad->caption() ?><?php echo $ambulancias_add->modalidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->modalidad->cellAttributes() ?>>
<script id="tpx_ambulancias_modalidad" type="text/html"><span id="el_ambulancias_modalidad">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ambulancias" data-field="x_modalidad" data-value-separator="<?php echo $ambulancias_add->modalidad->displayValueSeparatorAttribute() ?>" id="x_modalidad" name="x_modalidad"<?php echo $ambulancias_add->modalidad->editAttributes() ?>>
			<?php echo $ambulancias_add->modalidad->selectOptionListHtml("x_modalidad") ?>
		</select>
</div>
<?php echo $ambulancias_add->modalidad->Lookup->getParamTag($ambulancias_add, "p_x_modalidad") ?>
</span></script>
<?php echo $ambulancias_add->modalidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->estado->Visible) { // estado ?>
	<div id="r_estado" class="form-group row">
		<label id="elh_ambulancias_estado" for="x_estado" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_estado" type="text/html"><?php echo $ambulancias_add->estado->caption() ?><?php echo $ambulancias_add->estado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->estado->cellAttributes() ?>>
<script id="tpx_ambulancias_estado" type="text/html"><span id="el_ambulancias_estado">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ambulancias" data-field="x_estado" data-value-separator="<?php echo $ambulancias_add->estado->displayValueSeparatorAttribute() ?>" id="x_estado" name="x_estado"<?php echo $ambulancias_add->estado->editAttributes() ?>>
			<?php echo $ambulancias_add->estado->selectOptionListHtml("x_estado") ?>
		</select>
</div>
</span></script>
<?php echo $ambulancias_add->estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->ubicacion->Visible) { // ubicacion ?>
	<div id="r_ubicacion" class="form-group row">
		<label id="elh_ambulancias_ubicacion" for="x_ubicacion" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_ubicacion" type="text/html"><?php echo $ambulancias_add->ubicacion->caption() ?><?php echo $ambulancias_add->ubicacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->ubicacion->cellAttributes() ?>>
<script id="tpx_ambulancias_ubicacion" type="text/html"><span id="el_ambulancias_ubicacion">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ambulancias" data-field="x_ubicacion" data-value-separator="<?php echo $ambulancias_add->ubicacion->displayValueSeparatorAttribute() ?>" id="x_ubicacion" name="x_ubicacion"<?php echo $ambulancias_add->ubicacion->editAttributes() ?>>
			<?php echo $ambulancias_add->ubicacion->selectOptionListHtml("x_ubicacion") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "base_ambulancia") && !$ambulancias_add->ubicacion->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ubicacion" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ambulancias_add->ubicacion->caption() ?>" data-title="<?php echo $ambulancias_add->ubicacion->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ubicacion',url:'base_ambulanciaaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ambulancias_add->ubicacion->Lookup->getParamTag($ambulancias_add, "p_x_ubicacion") ?>
</span></script>
<?php echo $ambulancias_add->ubicacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->disponible->Visible) { // disponible ?>
	<div id="r_disponible" class="form-group row">
		<label id="elh_ambulancias_disponible" for="x_disponible" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_disponible" type="text/html"><?php echo $ambulancias_add->disponible->caption() ?><?php echo $ambulancias_add->disponible->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->disponible->cellAttributes() ?>>
<script id="tpx_ambulancias_disponible" type="text/html"><span id="el_ambulancias_disponible">
<input type="text" data-table="ambulancias" data-field="x_disponible" name="x_disponible" id="x_disponible" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($ambulancias_add->disponible->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->disponible->EditValue ?>"<?php echo $ambulancias_add->disponible->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->disponible->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->fecha_iniseguro->Visible) { // fecha_iniseguro ?>
	<div id="r_fecha_iniseguro" class="form-group row">
		<label id="elh_ambulancias_fecha_iniseguro" for="x_fecha_iniseguro" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_fecha_iniseguro" type="text/html"><?php echo $ambulancias_add->fecha_iniseguro->caption() ?><?php echo $ambulancias_add->fecha_iniseguro->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->fecha_iniseguro->cellAttributes() ?>>
<script id="tpx_ambulancias_fecha_iniseguro" type="text/html"><span id="el_ambulancias_fecha_iniseguro">
<input type="text" data-table="ambulancias" data-field="x_fecha_iniseguro" data-format="5" name="x_fecha_iniseguro" id="x_fecha_iniseguro" maxlength="8" placeholder="<?php echo HtmlEncode($ambulancias_add->fecha_iniseguro->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->fecha_iniseguro->EditValue ?>"<?php echo $ambulancias_add->fecha_iniseguro->editAttributes() ?>>
<?php if (!$ambulancias_add->fecha_iniseguro->ReadOnly && !$ambulancias_add->fecha_iniseguro->Disabled && !isset($ambulancias_add->fecha_iniseguro->EditAttrs["readonly"]) && !isset($ambulancias_add->fecha_iniseguro->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ambulanciasadd_js">
loadjs.ready(["fambulanciasadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fambulanciasadd", "x_fecha_iniseguro", {"ignoreReadonly":true,"useCurrent":false,"format":5});
});
</script>
<?php echo $ambulancias_add->fecha_iniseguro->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->fecha_finseguro->Visible) { // fecha_finseguro ?>
	<div id="r_fecha_finseguro" class="form-group row">
		<label id="elh_ambulancias_fecha_finseguro" for="x_fecha_finseguro" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_fecha_finseguro" type="text/html"><?php echo $ambulancias_add->fecha_finseguro->caption() ?><?php echo $ambulancias_add->fecha_finseguro->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->fecha_finseguro->cellAttributes() ?>>
<script id="tpx_ambulancias_fecha_finseguro" type="text/html"><span id="el_ambulancias_fecha_finseguro">
<input type="text" data-table="ambulancias" data-field="x_fecha_finseguro" data-format="5" name="x_fecha_finseguro" id="x_fecha_finseguro" maxlength="8" placeholder="<?php echo HtmlEncode($ambulancias_add->fecha_finseguro->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->fecha_finseguro->EditValue ?>"<?php echo $ambulancias_add->fecha_finseguro->editAttributes() ?>>
<?php if (!$ambulancias_add->fecha_finseguro->ReadOnly && !$ambulancias_add->fecha_finseguro->Disabled && !isset($ambulancias_add->fecha_finseguro->EditAttrs["readonly"]) && !isset($ambulancias_add->fecha_finseguro->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ambulanciasadd_js">
loadjs.ready(["fambulanciasadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fambulanciasadd", "x_fecha_finseguro", {"ignoreReadonly":true,"useCurrent":false,"format":5});
});
</script>
<?php echo $ambulancias_add->fecha_finseguro->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->entidad->Visible) { // entidad ?>
	<div id="r_entidad" class="form-group row">
		<label id="elh_ambulancias_entidad" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_entidad" type="text/html"><?php echo $ambulancias_add->entidad->caption() ?><?php echo $ambulancias_add->entidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->entidad->cellAttributes() ?>>
<script id="tpx_ambulancias_entidad" type="text/html"><span id="el_ambulancias_entidad">
<?php
$onchange = $ambulancias_add->entidad->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$ambulancias_add->entidad->EditAttrs["onchange"] = "";
?>
<span id="as_x_entidad">
	<input type="text" class="form-control" name="sv_x_entidad" id="sv_x_entidad" value="<?php echo RemoveHtml($ambulancias_add->entidad->EditValue) ?>" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($ambulancias_add->entidad->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ambulancias_add->entidad->getPlaceHolder()) ?>"<?php echo $ambulancias_add->entidad->editAttributes() ?>>
</span>
<input type="hidden" data-table="ambulancias" data-field="x_entidad" data-value-separator="<?php echo $ambulancias_add->entidad->displayValueSeparatorAttribute() ?>" name="x_entidad" id="x_entidad" value="<?php echo HtmlEncode($ambulancias_add->entidad->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $ambulancias_add->entidad->Lookup->getParamTag($ambulancias_add, "p_x_entidad") ?>
</span></script>
<script type="text/html" class="ambulanciasadd_js">
loadjs.ready(["fambulanciasadd"], function() {
	fambulanciasadd.createAutoSuggest({"id":"x_entidad","forceSelect":false});
});
</script>
<?php echo $ambulancias_add->entidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->observacion->Visible) { // observacion ?>
	<div id="r_observacion" class="form-group row">
		<label id="elh_ambulancias_observacion" for="x_observacion" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_observacion" type="text/html"><?php echo $ambulancias_add->observacion->caption() ?><?php echo $ambulancias_add->observacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->observacion->cellAttributes() ?>>
<script id="tpx_ambulancias_observacion" type="text/html"><span id="el_ambulancias_observacion">
<input type="text" data-table="ambulancias" data-field="x_observacion" name="x_observacion" id="x_observacion" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($ambulancias_add->observacion->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->observacion->EditValue ?>"<?php echo $ambulancias_add->observacion->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->observacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->asiganda->Visible) { // asiganda ?>
	<div id="r_asiganda" class="form-group row">
		<label id="elh_ambulancias_asiganda" for="x_asiganda" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_asiganda" type="text/html"><?php echo $ambulancias_add->asiganda->caption() ?><?php echo $ambulancias_add->asiganda->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->asiganda->cellAttributes() ?>>
<script id="tpx_ambulancias_asiganda" type="text/html"><span id="el_ambulancias_asiganda">
<input type="text" data-table="ambulancias" data-field="x_asiganda" name="x_asiganda" id="x_asiganda" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($ambulancias_add->asiganda->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->asiganda->EditValue ?>"<?php echo $ambulancias_add->asiganda->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->asiganda->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->config_manteni->Visible) { // config_manteni ?>
	<div id="r_config_manteni" class="form-group row">
		<label id="elh_ambulancias_config_manteni" for="x_config_manteni" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_config_manteni" type="text/html"><?php echo $ambulancias_add->config_manteni->caption() ?><?php echo $ambulancias_add->config_manteni->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->config_manteni->cellAttributes() ?>>
<script id="tpx_ambulancias_config_manteni" type="text/html"><span id="el_ambulancias_config_manteni">
<input type="text" data-table="ambulancias" data-field="x_config_manteni" name="x_config_manteni" id="x_config_manteni" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($ambulancias_add->config_manteni->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->config_manteni->EditValue ?>"<?php echo $ambulancias_add->config_manteni->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->config_manteni->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->longitudambulancia->Visible) { // longitudambulancia ?>
	<div id="r_longitudambulancia" class="form-group row">
		<label id="elh_ambulancias_longitudambulancia" for="x_longitudambulancia" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_longitudambulancia" type="text/html"><?php echo $ambulancias_add->longitudambulancia->caption() ?><?php echo $ambulancias_add->longitudambulancia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->longitudambulancia->cellAttributes() ?>>
<script id="tpx_ambulancias_longitudambulancia" type="text/html"><span id="el_ambulancias_longitudambulancia">
<input type="text" data-table="ambulancias" data-field="x_longitudambulancia" name="x_longitudambulancia" id="x_longitudambulancia" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($ambulancias_add->longitudambulancia->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->longitudambulancia->EditValue ?>"<?php echo $ambulancias_add->longitudambulancia->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->longitudambulancia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->latituambulancia->Visible) { // latituambulancia ?>
	<div id="r_latituambulancia" class="form-group row">
		<label id="elh_ambulancias_latituambulancia" for="x_latituambulancia" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_latituambulancia" type="text/html"><?php echo $ambulancias_add->latituambulancia->caption() ?><?php echo $ambulancias_add->latituambulancia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->latituambulancia->cellAttributes() ?>>
<script id="tpx_ambulancias_latituambulancia" type="text/html"><span id="el_ambulancias_latituambulancia">
<input type="text" data-table="ambulancias" data-field="x_latituambulancia" name="x_latituambulancia" id="x_latituambulancia" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($ambulancias_add->latituambulancia->getPlaceHolder()) ?>" value="<?php echo $ambulancias_add->latituambulancia->EditValue ?>"<?php echo $ambulancias_add->latituambulancia->editAttributes() ?>>
</span></script>
<?php echo $ambulancias_add->latituambulancia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_add->especial->Visible) { // especial ?>
	<div id="r_especial" class="form-group row">
		<label id="elh_ambulancias_especial" for="x_especial" class="<?php echo $ambulancias_add->LeftColumnClass ?>"><script id="tpc_ambulancias_especial" type="text/html"><?php echo $ambulancias_add->especial->caption() ?><?php echo $ambulancias_add->especial->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ambulancias_add->RightColumnClass ?>"><div <?php echo $ambulancias_add->especial->cellAttributes() ?>>
<script id="tpx_ambulancias_especial" type="text/html"><span id="el_ambulancias_especial">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ambulancias" data-field="x_especial" data-value-separator="<?php echo $ambulancias_add->especial->displayValueSeparatorAttribute() ?>" id="x_especial" name="x_especial"<?php echo $ambulancias_add->especial->editAttributes() ?>>
			<?php echo $ambulancias_add->especial->selectOptionListHtml("x_especial") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "especial_ambulancia") && !$ambulancias_add->especial->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_especial" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ambulancias_add->especial->caption() ?>" data-title="<?php echo $ambulancias_add->especial->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_especial',url:'especial_ambulanciaaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ambulancias_add->especial->Lookup->getParamTag($ambulancias_add, "p_x_especial") ?>
</span></script>
<?php echo $ambulancias_add->especial->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ambulanciasadd" class="ew-custom-template"></div>
<script id="tpm_ambulanciasadd" type="text/html">
<div id="ct_ambulancias_add">    <!-- Main content -->
<div class="container">
	<div class="container-fluid">
		<div class="row">
		  <!-- left column -->
		  <div class="col-md-6">
			<!-- general form elements -->
			<div class="card card-primary">
		<label><?php echo $ambulancias_add->cod_ambulancias->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_ambulancias_cod_ambulancias")/}}</div>
  		 <label><?php echo $ambulancias_add->placas->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_ambulancias_placas")/}}</div>
  		 <label><?php echo $ambulancias_add->chasis->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_ambulancias_chasis")/}}</div>
  		 <label><?php echo $ambulancias_add->marca->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_ambulancias_marca")/}}</div>
  		<label><?php echo $ambulancias_add->modelo->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_ambulancias_modelo")/}}</div>
			 </div>
		   </div>
		   <div class="col-md-6">
			<!-- general form elements disabled -->
			<div class="card card-info">
			   		 <label><?php echo $ambulancias_add->tipo_conbustible->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_ambulancias_tipo_conbustible")/}}</div>
  		 <label><?php echo $ambulancias_add->especial->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_ambulancias_especial")/}}</div>
		<label><?php echo $ambulancias_add->ubicacion->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_ambulancias_ubicacion")/}}</div>
  		 <label><?php echo $ambulancias_add->fecha_iniseguro->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_ambulancias_fecha_iniseguro")/}}</div>
  		 <label><?php echo $ambulancias_add->fecha_finseguro->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_ambulancias_fecha_finseguro")/}}</div>
		 </div>
		</div>       
  </div>       
</div>
</script>

<?php
	if (in_array("mante_amb", explode(",", $ambulancias->getCurrentDetailTable())) && $mante_amb->DetailAdd) {
?>
<?php if ($ambulancias->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("mante_amb", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "mante_ambgrid.php" ?>
<?php } ?>
<?php if (!$ambulancias_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ambulancias_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ambulancias_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ambulancias->Rows) ?> };
	ew.applyTemplate("tpd_ambulanciasadd", "tpm_ambulanciasadd", "ambulanciasadd", "<?php echo $ambulancias->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ambulanciasadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ambulancias_add->showPageFooter();
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
$ambulancias_add->terminate();
?>