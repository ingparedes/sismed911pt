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
$obstetrico_registro_add = new obstetrico_registro_add();

// Run the page
$obstetrico_registro_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obstetrico_registro_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fobstetrico_registroadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fobstetrico_registroadd = currentForm = new ew.Form("fobstetrico_registroadd", "add");

	// Validate form
	fobstetrico_registroadd.validate = function() {
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
			<?php if ($obstetrico_registro_add->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_add->cod_casopreh->caption(), $obstetrico_registro_add->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obstetrico_registro_add->cod_casopreh->errorMessage()) ?>");
			<?php if ($obstetrico_registro_add->trabajoparto->Required) { ?>
				elm = this.getElements("x" + infix + "_trabajoparto");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_add->trabajoparto->caption(), $obstetrico_registro_add->trabajoparto->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_add->sangradovaginal->Required) { ?>
				elm = this.getElements("x" + infix + "_sangradovaginal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_add->sangradovaginal->caption(), $obstetrico_registro_add->sangradovaginal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_add->g->Required) { ?>
				elm = this.getElements("x" + infix + "_g");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_add->g->caption(), $obstetrico_registro_add->g->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_add->p->Required) { ?>
				elm = this.getElements("x" + infix + "_p");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_add->p->caption(), $obstetrico_registro_add->p->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_add->a->Required) { ?>
				elm = this.getElements("x" + infix + "_a");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_add->a->caption(), $obstetrico_registro_add->a->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_add->n->Required) { ?>
				elm = this.getElements("x" + infix + "_n");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_add->n->caption(), $obstetrico_registro_add->n->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_add->c->Required) { ?>
				elm = this.getElements("x" + infix + "_c");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_add->c->caption(), $obstetrico_registro_add->c->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_add->fuente->Required) { ?>
				elm = this.getElements("x" + infix + "_fuente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_add->fuente->caption(), $obstetrico_registro_add->fuente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_add->tiempo->Required) { ?>
				elm = this.getElements("x" + infix + "_tiempo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_add->tiempo->caption(), $obstetrico_registro_add->tiempo->RequiredErrorMessage)) ?>");
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
	fobstetrico_registroadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fobstetrico_registroadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fobstetrico_registroadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $obstetrico_registro_add->showPageHeader(); ?>
<?php
$obstetrico_registro_add->showMessage();
?>
<form name="fobstetrico_registroadd" id="fobstetrico_registroadd" class="<?php echo $obstetrico_registro_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obstetrico_registro">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$obstetrico_registro_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($obstetrico_registro_add->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_obstetrico_registro_cod_casopreh" for="x_cod_casopreh" class="<?php echo $obstetrico_registro_add->LeftColumnClass ?>"><?php echo $obstetrico_registro_add->cod_casopreh->caption() ?><?php echo $obstetrico_registro_add->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_add->RightColumnClass ?>"><div <?php echo $obstetrico_registro_add->cod_casopreh->cellAttributes() ?>>
<span id="el_obstetrico_registro_cod_casopreh">
<input type="text" data-table="obstetrico_registro" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($obstetrico_registro_add->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_add->cod_casopreh->EditValue ?>"<?php echo $obstetrico_registro_add->cod_casopreh->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_add->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_add->trabajoparto->Visible) { // trabajoparto ?>
	<div id="r_trabajoparto" class="form-group row">
		<label id="elh_obstetrico_registro_trabajoparto" for="x_trabajoparto" class="<?php echo $obstetrico_registro_add->LeftColumnClass ?>"><?php echo $obstetrico_registro_add->trabajoparto->caption() ?><?php echo $obstetrico_registro_add->trabajoparto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_add->RightColumnClass ?>"><div <?php echo $obstetrico_registro_add->trabajoparto->cellAttributes() ?>>
<span id="el_obstetrico_registro_trabajoparto">
<input type="text" data-table="obstetrico_registro" data-field="x_trabajoparto" name="x_trabajoparto" id="x_trabajoparto" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($obstetrico_registro_add->trabajoparto->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_add->trabajoparto->EditValue ?>"<?php echo $obstetrico_registro_add->trabajoparto->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_add->trabajoparto->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_add->sangradovaginal->Visible) { // sangradovaginal ?>
	<div id="r_sangradovaginal" class="form-group row">
		<label id="elh_obstetrico_registro_sangradovaginal" for="x_sangradovaginal" class="<?php echo $obstetrico_registro_add->LeftColumnClass ?>"><?php echo $obstetrico_registro_add->sangradovaginal->caption() ?><?php echo $obstetrico_registro_add->sangradovaginal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_add->RightColumnClass ?>"><div <?php echo $obstetrico_registro_add->sangradovaginal->cellAttributes() ?>>
<span id="el_obstetrico_registro_sangradovaginal">
<input type="text" data-table="obstetrico_registro" data-field="x_sangradovaginal" name="x_sangradovaginal" id="x_sangradovaginal" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($obstetrico_registro_add->sangradovaginal->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_add->sangradovaginal->EditValue ?>"<?php echo $obstetrico_registro_add->sangradovaginal->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_add->sangradovaginal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_add->g->Visible) { // g ?>
	<div id="r_g" class="form-group row">
		<label id="elh_obstetrico_registro_g" for="x_g" class="<?php echo $obstetrico_registro_add->LeftColumnClass ?>"><?php echo $obstetrico_registro_add->g->caption() ?><?php echo $obstetrico_registro_add->g->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_add->RightColumnClass ?>"><div <?php echo $obstetrico_registro_add->g->cellAttributes() ?>>
<span id="el_obstetrico_registro_g">
<input type="text" data-table="obstetrico_registro" data-field="x_g" name="x_g" id="x_g" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_add->g->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_add->g->EditValue ?>"<?php echo $obstetrico_registro_add->g->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_add->g->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_add->p->Visible) { // p ?>
	<div id="r_p" class="form-group row">
		<label id="elh_obstetrico_registro_p" for="x_p" class="<?php echo $obstetrico_registro_add->LeftColumnClass ?>"><?php echo $obstetrico_registro_add->p->caption() ?><?php echo $obstetrico_registro_add->p->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_add->RightColumnClass ?>"><div <?php echo $obstetrico_registro_add->p->cellAttributes() ?>>
<span id="el_obstetrico_registro_p">
<input type="text" data-table="obstetrico_registro" data-field="x_p" name="x_p" id="x_p" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_add->p->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_add->p->EditValue ?>"<?php echo $obstetrico_registro_add->p->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_add->p->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_add->a->Visible) { // a ?>
	<div id="r_a" class="form-group row">
		<label id="elh_obstetrico_registro_a" for="x_a" class="<?php echo $obstetrico_registro_add->LeftColumnClass ?>"><?php echo $obstetrico_registro_add->a->caption() ?><?php echo $obstetrico_registro_add->a->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_add->RightColumnClass ?>"><div <?php echo $obstetrico_registro_add->a->cellAttributes() ?>>
<span id="el_obstetrico_registro_a">
<input type="text" data-table="obstetrico_registro" data-field="x_a" name="x_a" id="x_a" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_add->a->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_add->a->EditValue ?>"<?php echo $obstetrico_registro_add->a->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_add->a->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_add->n->Visible) { // n ?>
	<div id="r_n" class="form-group row">
		<label id="elh_obstetrico_registro_n" for="x_n" class="<?php echo $obstetrico_registro_add->LeftColumnClass ?>"><?php echo $obstetrico_registro_add->n->caption() ?><?php echo $obstetrico_registro_add->n->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_add->RightColumnClass ?>"><div <?php echo $obstetrico_registro_add->n->cellAttributes() ?>>
<span id="el_obstetrico_registro_n">
<input type="text" data-table="obstetrico_registro" data-field="x_n" name="x_n" id="x_n" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_add->n->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_add->n->EditValue ?>"<?php echo $obstetrico_registro_add->n->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_add->n->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_add->c->Visible) { // c ?>
	<div id="r_c" class="form-group row">
		<label id="elh_obstetrico_registro_c" for="x_c" class="<?php echo $obstetrico_registro_add->LeftColumnClass ?>"><?php echo $obstetrico_registro_add->c->caption() ?><?php echo $obstetrico_registro_add->c->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_add->RightColumnClass ?>"><div <?php echo $obstetrico_registro_add->c->cellAttributes() ?>>
<span id="el_obstetrico_registro_c">
<input type="text" data-table="obstetrico_registro" data-field="x_c" name="x_c" id="x_c" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_add->c->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_add->c->EditValue ?>"<?php echo $obstetrico_registro_add->c->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_add->c->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_add->fuente->Visible) { // fuente ?>
	<div id="r_fuente" class="form-group row">
		<label id="elh_obstetrico_registro_fuente" for="x_fuente" class="<?php echo $obstetrico_registro_add->LeftColumnClass ?>"><?php echo $obstetrico_registro_add->fuente->caption() ?><?php echo $obstetrico_registro_add->fuente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_add->RightColumnClass ?>"><div <?php echo $obstetrico_registro_add->fuente->cellAttributes() ?>>
<span id="el_obstetrico_registro_fuente">
<input type="text" data-table="obstetrico_registro" data-field="x_fuente" name="x_fuente" id="x_fuente" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($obstetrico_registro_add->fuente->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_add->fuente->EditValue ?>"<?php echo $obstetrico_registro_add->fuente->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_add->fuente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_add->tiempo->Visible) { // tiempo ?>
	<div id="r_tiempo" class="form-group row">
		<label id="elh_obstetrico_registro_tiempo" for="x_tiempo" class="<?php echo $obstetrico_registro_add->LeftColumnClass ?>"><?php echo $obstetrico_registro_add->tiempo->caption() ?><?php echo $obstetrico_registro_add->tiempo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_add->RightColumnClass ?>"><div <?php echo $obstetrico_registro_add->tiempo->cellAttributes() ?>>
<span id="el_obstetrico_registro_tiempo">
<input type="text" data-table="obstetrico_registro" data-field="x_tiempo" name="x_tiempo" id="x_tiempo" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_add->tiempo->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_add->tiempo->EditValue ?>"<?php echo $obstetrico_registro_add->tiempo->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_add->tiempo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$obstetrico_registro_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $obstetrico_registro_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $obstetrico_registro_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$obstetrico_registro_add->showPageFooter();
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
$obstetrico_registro_add->terminate();
?>