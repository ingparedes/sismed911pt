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
$obstetrico_registro_edit = new obstetrico_registro_edit();

// Run the page
$obstetrico_registro_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obstetrico_registro_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fobstetrico_registroedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fobstetrico_registroedit = currentForm = new ew.Form("fobstetrico_registroedit", "edit");

	// Validate form
	fobstetrico_registroedit.validate = function() {
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
			<?php if ($obstetrico_registro_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->id->caption(), $obstetrico_registro_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_edit->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->cod_casopreh->caption(), $obstetrico_registro_edit->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($obstetrico_registro_edit->cod_casopreh->errorMessage()) ?>");
			<?php if ($obstetrico_registro_edit->trabajoparto->Required) { ?>
				elm = this.getElements("x" + infix + "_trabajoparto");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->trabajoparto->caption(), $obstetrico_registro_edit->trabajoparto->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_edit->sangradovaginal->Required) { ?>
				elm = this.getElements("x" + infix + "_sangradovaginal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->sangradovaginal->caption(), $obstetrico_registro_edit->sangradovaginal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_edit->g->Required) { ?>
				elm = this.getElements("x" + infix + "_g");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->g->caption(), $obstetrico_registro_edit->g->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_edit->p->Required) { ?>
				elm = this.getElements("x" + infix + "_p");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->p->caption(), $obstetrico_registro_edit->p->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_edit->a->Required) { ?>
				elm = this.getElements("x" + infix + "_a");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->a->caption(), $obstetrico_registro_edit->a->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_edit->n->Required) { ?>
				elm = this.getElements("x" + infix + "_n");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->n->caption(), $obstetrico_registro_edit->n->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_edit->c->Required) { ?>
				elm = this.getElements("x" + infix + "_c");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->c->caption(), $obstetrico_registro_edit->c->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_edit->fuente->Required) { ?>
				elm = this.getElements("x" + infix + "_fuente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->fuente->caption(), $obstetrico_registro_edit->fuente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($obstetrico_registro_edit->tiempo->Required) { ?>
				elm = this.getElements("x" + infix + "_tiempo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $obstetrico_registro_edit->tiempo->caption(), $obstetrico_registro_edit->tiempo->RequiredErrorMessage)) ?>");
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
	fobstetrico_registroedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fobstetrico_registroedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fobstetrico_registroedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $obstetrico_registro_edit->showPageHeader(); ?>
<?php
$obstetrico_registro_edit->showMessage();
?>
<form name="fobstetrico_registroedit" id="fobstetrico_registroedit" class="<?php echo $obstetrico_registro_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obstetrico_registro">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$obstetrico_registro_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($obstetrico_registro_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_obstetrico_registro_id" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->id->caption() ?><?php echo $obstetrico_registro_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->id->cellAttributes() ?>>
<span id="el_obstetrico_registro_id">
<span<?php echo $obstetrico_registro_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($obstetrico_registro_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="obstetrico_registro" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($obstetrico_registro_edit->id->CurrentValue) ?>">
<?php echo $obstetrico_registro_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_edit->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_obstetrico_registro_cod_casopreh" for="x_cod_casopreh" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->cod_casopreh->caption() ?><?php echo $obstetrico_registro_edit->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->cod_casopreh->cellAttributes() ?>>
<span id="el_obstetrico_registro_cod_casopreh">
<input type="text" data-table="obstetrico_registro" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($obstetrico_registro_edit->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_edit->cod_casopreh->EditValue ?>"<?php echo $obstetrico_registro_edit->cod_casopreh->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_edit->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_edit->trabajoparto->Visible) { // trabajoparto ?>
	<div id="r_trabajoparto" class="form-group row">
		<label id="elh_obstetrico_registro_trabajoparto" for="x_trabajoparto" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->trabajoparto->caption() ?><?php echo $obstetrico_registro_edit->trabajoparto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->trabajoparto->cellAttributes() ?>>
<span id="el_obstetrico_registro_trabajoparto">
<input type="text" data-table="obstetrico_registro" data-field="x_trabajoparto" name="x_trabajoparto" id="x_trabajoparto" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($obstetrico_registro_edit->trabajoparto->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_edit->trabajoparto->EditValue ?>"<?php echo $obstetrico_registro_edit->trabajoparto->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_edit->trabajoparto->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_edit->sangradovaginal->Visible) { // sangradovaginal ?>
	<div id="r_sangradovaginal" class="form-group row">
		<label id="elh_obstetrico_registro_sangradovaginal" for="x_sangradovaginal" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->sangradovaginal->caption() ?><?php echo $obstetrico_registro_edit->sangradovaginal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->sangradovaginal->cellAttributes() ?>>
<span id="el_obstetrico_registro_sangradovaginal">
<input type="text" data-table="obstetrico_registro" data-field="x_sangradovaginal" name="x_sangradovaginal" id="x_sangradovaginal" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($obstetrico_registro_edit->sangradovaginal->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_edit->sangradovaginal->EditValue ?>"<?php echo $obstetrico_registro_edit->sangradovaginal->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_edit->sangradovaginal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_edit->g->Visible) { // g ?>
	<div id="r_g" class="form-group row">
		<label id="elh_obstetrico_registro_g" for="x_g" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->g->caption() ?><?php echo $obstetrico_registro_edit->g->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->g->cellAttributes() ?>>
<span id="el_obstetrico_registro_g">
<input type="text" data-table="obstetrico_registro" data-field="x_g" name="x_g" id="x_g" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_edit->g->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_edit->g->EditValue ?>"<?php echo $obstetrico_registro_edit->g->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_edit->g->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_edit->p->Visible) { // p ?>
	<div id="r_p" class="form-group row">
		<label id="elh_obstetrico_registro_p" for="x_p" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->p->caption() ?><?php echo $obstetrico_registro_edit->p->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->p->cellAttributes() ?>>
<span id="el_obstetrico_registro_p">
<input type="text" data-table="obstetrico_registro" data-field="x_p" name="x_p" id="x_p" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_edit->p->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_edit->p->EditValue ?>"<?php echo $obstetrico_registro_edit->p->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_edit->p->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_edit->a->Visible) { // a ?>
	<div id="r_a" class="form-group row">
		<label id="elh_obstetrico_registro_a" for="x_a" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->a->caption() ?><?php echo $obstetrico_registro_edit->a->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->a->cellAttributes() ?>>
<span id="el_obstetrico_registro_a">
<input type="text" data-table="obstetrico_registro" data-field="x_a" name="x_a" id="x_a" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_edit->a->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_edit->a->EditValue ?>"<?php echo $obstetrico_registro_edit->a->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_edit->a->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_edit->n->Visible) { // n ?>
	<div id="r_n" class="form-group row">
		<label id="elh_obstetrico_registro_n" for="x_n" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->n->caption() ?><?php echo $obstetrico_registro_edit->n->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->n->cellAttributes() ?>>
<span id="el_obstetrico_registro_n">
<input type="text" data-table="obstetrico_registro" data-field="x_n" name="x_n" id="x_n" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_edit->n->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_edit->n->EditValue ?>"<?php echo $obstetrico_registro_edit->n->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_edit->n->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_edit->c->Visible) { // c ?>
	<div id="r_c" class="form-group row">
		<label id="elh_obstetrico_registro_c" for="x_c" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->c->caption() ?><?php echo $obstetrico_registro_edit->c->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->c->cellAttributes() ?>>
<span id="el_obstetrico_registro_c">
<input type="text" data-table="obstetrico_registro" data-field="x_c" name="x_c" id="x_c" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_edit->c->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_edit->c->EditValue ?>"<?php echo $obstetrico_registro_edit->c->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_edit->c->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_edit->fuente->Visible) { // fuente ?>
	<div id="r_fuente" class="form-group row">
		<label id="elh_obstetrico_registro_fuente" for="x_fuente" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->fuente->caption() ?><?php echo $obstetrico_registro_edit->fuente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->fuente->cellAttributes() ?>>
<span id="el_obstetrico_registro_fuente">
<input type="text" data-table="obstetrico_registro" data-field="x_fuente" name="x_fuente" id="x_fuente" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($obstetrico_registro_edit->fuente->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_edit->fuente->EditValue ?>"<?php echo $obstetrico_registro_edit->fuente->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_edit->fuente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($obstetrico_registro_edit->tiempo->Visible) { // tiempo ?>
	<div id="r_tiempo" class="form-group row">
		<label id="elh_obstetrico_registro_tiempo" for="x_tiempo" class="<?php echo $obstetrico_registro_edit->LeftColumnClass ?>"><?php echo $obstetrico_registro_edit->tiempo->caption() ?><?php echo $obstetrico_registro_edit->tiempo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $obstetrico_registro_edit->RightColumnClass ?>"><div <?php echo $obstetrico_registro_edit->tiempo->cellAttributes() ?>>
<span id="el_obstetrico_registro_tiempo">
<input type="text" data-table="obstetrico_registro" data-field="x_tiempo" name="x_tiempo" id="x_tiempo" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($obstetrico_registro_edit->tiempo->getPlaceHolder()) ?>" value="<?php echo $obstetrico_registro_edit->tiempo->EditValue ?>"<?php echo $obstetrico_registro_edit->tiempo->editAttributes() ?>>
</span>
<?php echo $obstetrico_registro_edit->tiempo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$obstetrico_registro_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $obstetrico_registro_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $obstetrico_registro_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$obstetrico_registro_edit->showPageFooter();
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
$obstetrico_registro_edit->terminate();
?>