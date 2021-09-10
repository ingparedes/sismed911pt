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
$pacientegeneral_list = new pacientegeneral_list();

// Run the page
$pacientegeneral_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pacientegeneral_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pacientegeneral_list->isExport()) { ?>
<script>
var fpacientegenerallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpacientegenerallist = currentForm = new ew.Form("fpacientegenerallist", "list");
	fpacientegenerallist.formKeyCountName = '<?php echo $pacientegeneral_list->FormKeyCountName ?>';

	// Validate form
	fpacientegenerallist.validate = function() {
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
			<?php if ($pacientegeneral_list->cod_casointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->cod_casointerh->caption(), $pacientegeneral_list->cod_casointerh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casointerh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pacientegeneral_list->cod_casointerh->errorMessage()) ?>");
			<?php if ($pacientegeneral_list->id_paciente->Required) { ?>
				elm = this.getElements("x" + infix + "_id_paciente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->id_paciente->caption(), $pacientegeneral_list->id_paciente->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_paciente");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pacientegeneral_list->id_paciente->errorMessage()) ?>");
			<?php if ($pacientegeneral_list->expendiente->Required) { ?>
				elm = this.getElements("x" + infix + "_expendiente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->expendiente->caption(), $pacientegeneral_list->expendiente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->tipo_doc->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_doc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->tipo_doc->caption(), $pacientegeneral_list->tipo_doc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->num_doc->Required) { ?>
				elm = this.getElements("x" + infix + "_num_doc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->num_doc->caption(), $pacientegeneral_list->num_doc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->nombre1->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->nombre1->caption(), $pacientegeneral_list->nombre1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->nombre2->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->nombre2->caption(), $pacientegeneral_list->nombre2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->apellido1->Required) { ?>
				elm = this.getElements("x" + infix + "_apellido1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->apellido1->caption(), $pacientegeneral_list->apellido1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->apellido2->Required) { ?>
				elm = this.getElements("x" + infix + "_apellido2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->apellido2->caption(), $pacientegeneral_list->apellido2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->genero->Required) { ?>
				elm = this.getElements("x" + infix + "_genero");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->genero->caption(), $pacientegeneral_list->genero->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->edad->Required) { ?>
				elm = this.getElements("x" + infix + "_edad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->edad->caption(), $pacientegeneral_list->edad->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_edad");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pacientegeneral_list->edad->errorMessage()) ?>");
			<?php if ($pacientegeneral_list->fecha_nacido->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_nacido");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->fecha_nacido->caption(), $pacientegeneral_list->fecha_nacido->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_nacido");
				if (elm && !ew.checkDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pacientegeneral_list->fecha_nacido->errorMessage()) ?>");
			<?php if ($pacientegeneral_list->cod_edad->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_edad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->cod_edad->caption(), $pacientegeneral_list->cod_edad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->telefono->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->telefono->caption(), $pacientegeneral_list->telefono->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->celular->Required) { ?>
				elm = this.getElements("x" + infix + "_celular");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->celular->caption(), $pacientegeneral_list->celular->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->direccion->Required) { ?>
				elm = this.getElements("x" + infix + "_direccion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->direccion->caption(), $pacientegeneral_list->direccion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->aseguradro->Required) { ?>
				elm = this.getElements("x" + infix + "_aseguradro");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->aseguradro->caption(), $pacientegeneral_list->aseguradro->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->nss->Required) { ?>
				elm = this.getElements("x" + infix + "_nss");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->nss->caption(), $pacientegeneral_list->nss->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pacientegeneral_list->prehospitalario->Required) { ?>
				elm = this.getElements("x" + infix + "_prehospitalario");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pacientegeneral_list->prehospitalario->caption(), $pacientegeneral_list->prehospitalario->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fpacientegenerallist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpacientegenerallist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpacientegenerallist.lists["x_tipo_doc"] = <?php echo $pacientegeneral_list->tipo_doc->Lookup->toClientList($pacientegeneral_list) ?>;
	fpacientegenerallist.lists["x_tipo_doc"].options = <?php echo JsonEncode($pacientegeneral_list->tipo_doc->lookupOptions()) ?>;
	fpacientegenerallist.lists["x_genero"] = <?php echo $pacientegeneral_list->genero->Lookup->toClientList($pacientegeneral_list) ?>;
	fpacientegenerallist.lists["x_genero"].options = <?php echo JsonEncode($pacientegeneral_list->genero->lookupOptions()) ?>;
	fpacientegenerallist.lists["x_cod_edad"] = <?php echo $pacientegeneral_list->cod_edad->Lookup->toClientList($pacientegeneral_list) ?>;
	fpacientegenerallist.lists["x_cod_edad"].options = <?php echo JsonEncode($pacientegeneral_list->cod_edad->lookupOptions()) ?>;
	fpacientegenerallist.lists["x_aseguradro"] = <?php echo $pacientegeneral_list->aseguradro->Lookup->toClientList($pacientegeneral_list) ?>;
	fpacientegenerallist.lists["x_aseguradro"].options = <?php echo JsonEncode($pacientegeneral_list->aseguradro->lookupOptions()) ?>;
	loadjs.done("fpacientegenerallist");
});
var fpacientegenerallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpacientegenerallistsrch = currentSearchForm = new ew.Form("fpacientegenerallistsrch");

	// Dynamic selection lists
	// Filters

	fpacientegenerallistsrch.filterList = <?php echo $pacientegeneral_list->getFilterList() ?>;
	loadjs.done("fpacientegenerallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pacientegeneral_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pacientegeneral_list->TotalRecords > 0 && $pacientegeneral_list->ExportOptions->visible()) { ?>
<?php $pacientegeneral_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pacientegeneral_list->ImportOptions->visible()) { ?>
<?php $pacientegeneral_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pacientegeneral_list->SearchOptions->visible()) { ?>
<?php $pacientegeneral_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pacientegeneral_list->FilterOptions->visible()) { ?>
<?php $pacientegeneral_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pacientegeneral_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pacientegeneral_list->isExport() && !$pacientegeneral->CurrentAction) { ?>
<form name="fpacientegenerallistsrch" id="fpacientegenerallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpacientegenerallistsrch-search-panel" class="<?php echo $pacientegeneral_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pacientegeneral">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pacientegeneral_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pacientegeneral_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pacientegeneral_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pacientegeneral_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pacientegeneral_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pacientegeneral_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pacientegeneral_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pacientegeneral_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pacientegeneral_list->showPageHeader(); ?>
<?php
$pacientegeneral_list->showMessage();
?>
<?php if ($pacientegeneral_list->TotalRecords > 0 || $pacientegeneral->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pacientegeneral_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pacientegeneral">
<?php if (!$pacientegeneral_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pacientegeneral_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pacientegeneral_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pacientegeneral_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpacientegenerallist" id="fpacientegenerallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pacientegeneral">
<div id="gmp_pacientegeneral" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pacientegeneral_list->TotalRecords > 0 || $pacientegeneral_list->isAdd() || $pacientegeneral_list->isCopy() || $pacientegeneral_list->isGridEdit()) { ?>
<table id="tbl_pacientegenerallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pacientegeneral->RowType = ROWTYPE_HEADER;

// Render list options
$pacientegeneral_list->renderListOptions();

// Render list options (header, left)
$pacientegeneral_list->ListOptions->render("header", "left");
?>
<?php if ($pacientegeneral_list->cod_casointerh->Visible) { // cod_casointerh ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->cod_casointerh) == "") { ?>
		<th data-name="cod_casointerh" class="<?php echo $pacientegeneral_list->cod_casointerh->headerCellClass() ?>"><div id="elh_pacientegeneral_cod_casointerh" class="pacientegeneral_cod_casointerh"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->cod_casointerh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casointerh" class="<?php echo $pacientegeneral_list->cod_casointerh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->cod_casointerh) ?>', 1);"><div id="elh_pacientegeneral_cod_casointerh" class="pacientegeneral_cod_casointerh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->cod_casointerh->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->cod_casointerh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->cod_casointerh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->id_paciente->Visible) { // id_paciente ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->id_paciente) == "") { ?>
		<th data-name="id_paciente" class="<?php echo $pacientegeneral_list->id_paciente->headerCellClass() ?>"><div id="elh_pacientegeneral_id_paciente" class="pacientegeneral_id_paciente"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->id_paciente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_paciente" class="<?php echo $pacientegeneral_list->id_paciente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->id_paciente) ?>', 1);"><div id="elh_pacientegeneral_id_paciente" class="pacientegeneral_id_paciente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->id_paciente->caption() ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->id_paciente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->id_paciente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->expendiente->Visible) { // expendiente ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->expendiente) == "") { ?>
		<th data-name="expendiente" class="<?php echo $pacientegeneral_list->expendiente->headerCellClass() ?>"><div id="elh_pacientegeneral_expendiente" class="pacientegeneral_expendiente"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->expendiente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="expendiente" class="<?php echo $pacientegeneral_list->expendiente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->expendiente) ?>', 1);"><div id="elh_pacientegeneral_expendiente" class="pacientegeneral_expendiente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->expendiente->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->expendiente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->expendiente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->tipo_doc->Visible) { // tipo_doc ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->tipo_doc) == "") { ?>
		<th data-name="tipo_doc" class="<?php echo $pacientegeneral_list->tipo_doc->headerCellClass() ?>"><div id="elh_pacientegeneral_tipo_doc" class="pacientegeneral_tipo_doc"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->tipo_doc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_doc" class="<?php echo $pacientegeneral_list->tipo_doc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->tipo_doc) ?>', 1);"><div id="elh_pacientegeneral_tipo_doc" class="pacientegeneral_tipo_doc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->tipo_doc->caption() ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->tipo_doc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->tipo_doc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->num_doc->Visible) { // num_doc ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->num_doc) == "") { ?>
		<th data-name="num_doc" class="<?php echo $pacientegeneral_list->num_doc->headerCellClass() ?>"><div id="elh_pacientegeneral_num_doc" class="pacientegeneral_num_doc"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->num_doc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="num_doc" class="<?php echo $pacientegeneral_list->num_doc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->num_doc) ?>', 1);"><div id="elh_pacientegeneral_num_doc" class="pacientegeneral_num_doc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->num_doc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->num_doc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->num_doc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->nombre1->Visible) { // nombre1 ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->nombre1) == "") { ?>
		<th data-name="nombre1" class="<?php echo $pacientegeneral_list->nombre1->headerCellClass() ?>"><div id="elh_pacientegeneral_nombre1" class="pacientegeneral_nombre1"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->nombre1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre1" class="<?php echo $pacientegeneral_list->nombre1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->nombre1) ?>', 1);"><div id="elh_pacientegeneral_nombre1" class="pacientegeneral_nombre1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->nombre1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->nombre1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->nombre1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->nombre2->Visible) { // nombre2 ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->nombre2) == "") { ?>
		<th data-name="nombre2" class="<?php echo $pacientegeneral_list->nombre2->headerCellClass() ?>"><div id="elh_pacientegeneral_nombre2" class="pacientegeneral_nombre2"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->nombre2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre2" class="<?php echo $pacientegeneral_list->nombre2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->nombre2) ?>', 1);"><div id="elh_pacientegeneral_nombre2" class="pacientegeneral_nombre2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->nombre2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->nombre2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->nombre2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->apellido1->Visible) { // apellido1 ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->apellido1) == "") { ?>
		<th data-name="apellido1" class="<?php echo $pacientegeneral_list->apellido1->headerCellClass() ?>"><div id="elh_pacientegeneral_apellido1" class="pacientegeneral_apellido1"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->apellido1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="apellido1" class="<?php echo $pacientegeneral_list->apellido1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->apellido1) ?>', 1);"><div id="elh_pacientegeneral_apellido1" class="pacientegeneral_apellido1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->apellido1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->apellido1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->apellido1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->apellido2->Visible) { // apellido2 ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->apellido2) == "") { ?>
		<th data-name="apellido2" class="<?php echo $pacientegeneral_list->apellido2->headerCellClass() ?>"><div id="elh_pacientegeneral_apellido2" class="pacientegeneral_apellido2"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->apellido2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="apellido2" class="<?php echo $pacientegeneral_list->apellido2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->apellido2) ?>', 1);"><div id="elh_pacientegeneral_apellido2" class="pacientegeneral_apellido2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->apellido2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->apellido2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->apellido2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->genero->Visible) { // genero ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->genero) == "") { ?>
		<th data-name="genero" class="<?php echo $pacientegeneral_list->genero->headerCellClass() ?>"><div id="elh_pacientegeneral_genero" class="pacientegeneral_genero"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->genero->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="genero" class="<?php echo $pacientegeneral_list->genero->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->genero) ?>', 1);"><div id="elh_pacientegeneral_genero" class="pacientegeneral_genero">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->genero->caption() ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->genero->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->genero->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->edad->Visible) { // edad ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->edad) == "") { ?>
		<th data-name="edad" class="<?php echo $pacientegeneral_list->edad->headerCellClass() ?>"><div id="elh_pacientegeneral_edad" class="pacientegeneral_edad"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->edad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="edad" class="<?php echo $pacientegeneral_list->edad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->edad) ?>', 1);"><div id="elh_pacientegeneral_edad" class="pacientegeneral_edad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->edad->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->edad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->edad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->fecha_nacido->Visible) { // fecha_nacido ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->fecha_nacido) == "") { ?>
		<th data-name="fecha_nacido" class="<?php echo $pacientegeneral_list->fecha_nacido->headerCellClass() ?>"><div id="elh_pacientegeneral_fecha_nacido" class="pacientegeneral_fecha_nacido"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->fecha_nacido->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_nacido" class="<?php echo $pacientegeneral_list->fecha_nacido->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->fecha_nacido) ?>', 1);"><div id="elh_pacientegeneral_fecha_nacido" class="pacientegeneral_fecha_nacido">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->fecha_nacido->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->fecha_nacido->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->fecha_nacido->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->cod_edad->Visible) { // cod_edad ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->cod_edad) == "") { ?>
		<th data-name="cod_edad" class="<?php echo $pacientegeneral_list->cod_edad->headerCellClass() ?>"><div id="elh_pacientegeneral_cod_edad" class="pacientegeneral_cod_edad"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->cod_edad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_edad" class="<?php echo $pacientegeneral_list->cod_edad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->cod_edad) ?>', 1);"><div id="elh_pacientegeneral_cod_edad" class="pacientegeneral_cod_edad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->cod_edad->caption() ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->cod_edad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->cod_edad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->telefono->Visible) { // telefono ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->telefono) == "") { ?>
		<th data-name="telefono" class="<?php echo $pacientegeneral_list->telefono->headerCellClass() ?>"><div id="elh_pacientegeneral_telefono" class="pacientegeneral_telefono"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->telefono->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telefono" class="<?php echo $pacientegeneral_list->telefono->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->telefono) ?>', 1);"><div id="elh_pacientegeneral_telefono" class="pacientegeneral_telefono">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->telefono->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->telefono->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->telefono->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->celular->Visible) { // celular ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->celular) == "") { ?>
		<th data-name="celular" class="<?php echo $pacientegeneral_list->celular->headerCellClass() ?>"><div id="elh_pacientegeneral_celular" class="pacientegeneral_celular"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->celular->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="celular" class="<?php echo $pacientegeneral_list->celular->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->celular) ?>', 1);"><div id="elh_pacientegeneral_celular" class="pacientegeneral_celular">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->celular->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->celular->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->celular->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->direccion->Visible) { // direccion ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->direccion) == "") { ?>
		<th data-name="direccion" class="<?php echo $pacientegeneral_list->direccion->headerCellClass() ?>"><div id="elh_pacientegeneral_direccion" class="pacientegeneral_direccion"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->direccion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="direccion" class="<?php echo $pacientegeneral_list->direccion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->direccion) ?>', 1);"><div id="elh_pacientegeneral_direccion" class="pacientegeneral_direccion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->direccion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->direccion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->direccion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->aseguradro->Visible) { // aseguradro ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->aseguradro) == "") { ?>
		<th data-name="aseguradro" class="<?php echo $pacientegeneral_list->aseguradro->headerCellClass() ?>"><div id="elh_pacientegeneral_aseguradro" class="pacientegeneral_aseguradro"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->aseguradro->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="aseguradro" class="<?php echo $pacientegeneral_list->aseguradro->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->aseguradro) ?>', 1);"><div id="elh_pacientegeneral_aseguradro" class="pacientegeneral_aseguradro">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->aseguradro->caption() ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->aseguradro->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->aseguradro->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->nss->Visible) { // nss ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->nss) == "") { ?>
		<th data-name="nss" class="<?php echo $pacientegeneral_list->nss->headerCellClass() ?>"><div id="elh_pacientegeneral_nss" class="pacientegeneral_nss"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->nss->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nss" class="<?php echo $pacientegeneral_list->nss->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->nss) ?>', 1);"><div id="elh_pacientegeneral_nss" class="pacientegeneral_nss">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->nss->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->nss->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->nss->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pacientegeneral_list->prehospitalario->Visible) { // prehospitalario ?>
	<?php if ($pacientegeneral_list->SortUrl($pacientegeneral_list->prehospitalario) == "") { ?>
		<th data-name="prehospitalario" class="<?php echo $pacientegeneral_list->prehospitalario->headerCellClass() ?>"><div id="elh_pacientegeneral_prehospitalario" class="pacientegeneral_prehospitalario"><div class="ew-table-header-caption"><?php echo $pacientegeneral_list->prehospitalario->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prehospitalario" class="<?php echo $pacientegeneral_list->prehospitalario->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pacientegeneral_list->SortUrl($pacientegeneral_list->prehospitalario) ?>', 1);"><div id="elh_pacientegeneral_prehospitalario" class="pacientegeneral_prehospitalario">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pacientegeneral_list->prehospitalario->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pacientegeneral_list->prehospitalario->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pacientegeneral_list->prehospitalario->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pacientegeneral_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($pacientegeneral_list->isAdd() || $pacientegeneral_list->isCopy()) {
		$pacientegeneral_list->RowIndex = 0;
		$pacientegeneral_list->KeyCount = $pacientegeneral_list->RowIndex;
		if ($pacientegeneral_list->isAdd())
			$pacientegeneral_list->loadRowValues();
		if ($pacientegeneral->EventCancelled) // Insert failed
			$pacientegeneral_list->restoreFormValues(); // Restore form values

		// Set row properties
		$pacientegeneral->resetAttributes();
		$pacientegeneral->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_pacientegeneral", "data-rowtype" => ROWTYPE_ADD]);
		$pacientegeneral->RowType = ROWTYPE_ADD;

		// Render row
		$pacientegeneral_list->renderRow();

		// Render list options
		$pacientegeneral_list->renderListOptions();
		$pacientegeneral_list->StartRowCount = 0;
?>
	<tr <?php echo $pacientegeneral->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pacientegeneral_list->ListOptions->render("body", "left", $pacientegeneral_list->RowCount);
?>
	<?php if ($pacientegeneral_list->cod_casointerh->Visible) { // cod_casointerh ?>
		<td data-name="cod_casointerh">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_cod_casointerh" class="form-group pacientegeneral_cod_casointerh">
<input type="text" data-table="pacientegeneral" data-field="x_cod_casointerh" name="x<?php echo $pacientegeneral_list->RowIndex ?>_cod_casointerh" id="x<?php echo $pacientegeneral_list->RowIndex ?>_cod_casointerh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($pacientegeneral_list->cod_casointerh->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->cod_casointerh->EditValue ?>"<?php echo $pacientegeneral_list->cod_casointerh->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_cod_casointerh" name="o<?php echo $pacientegeneral_list->RowIndex ?>_cod_casointerh" id="o<?php echo $pacientegeneral_list->RowIndex ?>_cod_casointerh" value="<?php echo HtmlEncode($pacientegeneral_list->cod_casointerh->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->id_paciente->Visible) { // id_paciente ?>
		<td data-name="id_paciente">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_id_paciente" class="form-group pacientegeneral_id_paciente">
<input type="text" data-table="pacientegeneral" data-field="x_id_paciente" name="x<?php echo $pacientegeneral_list->RowIndex ?>_id_paciente" id="x<?php echo $pacientegeneral_list->RowIndex ?>_id_paciente" maxlength="4" placeholder="<?php echo HtmlEncode($pacientegeneral_list->id_paciente->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->id_paciente->EditValue ?>"<?php echo $pacientegeneral_list->id_paciente->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_id_paciente" name="o<?php echo $pacientegeneral_list->RowIndex ?>_id_paciente" id="o<?php echo $pacientegeneral_list->RowIndex ?>_id_paciente" value="<?php echo HtmlEncode($pacientegeneral_list->id_paciente->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->expendiente->Visible) { // expendiente ?>
		<td data-name="expendiente">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_expendiente" class="form-group pacientegeneral_expendiente">
<input type="text" data-table="pacientegeneral" data-field="x_expendiente" name="x<?php echo $pacientegeneral_list->RowIndex ?>_expendiente" id="x<?php echo $pacientegeneral_list->RowIndex ?>_expendiente" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($pacientegeneral_list->expendiente->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->expendiente->EditValue ?>"<?php echo $pacientegeneral_list->expendiente->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_expendiente" name="o<?php echo $pacientegeneral_list->RowIndex ?>_expendiente" id="o<?php echo $pacientegeneral_list->RowIndex ?>_expendiente" value="<?php echo HtmlEncode($pacientegeneral_list->expendiente->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->tipo_doc->Visible) { // tipo_doc ?>
		<td data-name="tipo_doc">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_tipo_doc" class="form-group pacientegeneral_tipo_doc">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pacientegeneral" data-field="x_tipo_doc" data-value-separator="<?php echo $pacientegeneral_list->tipo_doc->displayValueSeparatorAttribute() ?>" id="x<?php echo $pacientegeneral_list->RowIndex ?>_tipo_doc" name="x<?php echo $pacientegeneral_list->RowIndex ?>_tipo_doc"<?php echo $pacientegeneral_list->tipo_doc->editAttributes() ?>>
			<?php echo $pacientegeneral_list->tipo_doc->selectOptionListHtml("x{$pacientegeneral_list->RowIndex}_tipo_doc") ?>
		</select>
</div>
<?php echo $pacientegeneral_list->tipo_doc->Lookup->getParamTag($pacientegeneral_list, "p_x" . $pacientegeneral_list->RowIndex . "_tipo_doc") ?>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_tipo_doc" name="o<?php echo $pacientegeneral_list->RowIndex ?>_tipo_doc" id="o<?php echo $pacientegeneral_list->RowIndex ?>_tipo_doc" value="<?php echo HtmlEncode($pacientegeneral_list->tipo_doc->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->num_doc->Visible) { // num_doc ?>
		<td data-name="num_doc">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_num_doc" class="form-group pacientegeneral_num_doc">
<input type="text" data-table="pacientegeneral" data-field="x_num_doc" name="x<?php echo $pacientegeneral_list->RowIndex ?>_num_doc" id="x<?php echo $pacientegeneral_list->RowIndex ?>_num_doc" size="12" maxlength="40" placeholder="<?php echo HtmlEncode($pacientegeneral_list->num_doc->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->num_doc->EditValue ?>"<?php echo $pacientegeneral_list->num_doc->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_num_doc" name="o<?php echo $pacientegeneral_list->RowIndex ?>_num_doc" id="o<?php echo $pacientegeneral_list->RowIndex ?>_num_doc" value="<?php echo HtmlEncode($pacientegeneral_list->num_doc->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->nombre1->Visible) { // nombre1 ?>
		<td data-name="nombre1">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_nombre1" class="form-group pacientegeneral_nombre1">
<input type="text" data-table="pacientegeneral" data-field="x_nombre1" name="x<?php echo $pacientegeneral_list->RowIndex ?>_nombre1" id="x<?php echo $pacientegeneral_list->RowIndex ?>_nombre1" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($pacientegeneral_list->nombre1->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->nombre1->EditValue ?>"<?php echo $pacientegeneral_list->nombre1->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_nombre1" name="o<?php echo $pacientegeneral_list->RowIndex ?>_nombre1" id="o<?php echo $pacientegeneral_list->RowIndex ?>_nombre1" value="<?php echo HtmlEncode($pacientegeneral_list->nombre1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->nombre2->Visible) { // nombre2 ?>
		<td data-name="nombre2">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_nombre2" class="form-group pacientegeneral_nombre2">
<input type="text" data-table="pacientegeneral" data-field="x_nombre2" name="x<?php echo $pacientegeneral_list->RowIndex ?>_nombre2" id="x<?php echo $pacientegeneral_list->RowIndex ?>_nombre2" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($pacientegeneral_list->nombre2->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->nombre2->EditValue ?>"<?php echo $pacientegeneral_list->nombre2->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_nombre2" name="o<?php echo $pacientegeneral_list->RowIndex ?>_nombre2" id="o<?php echo $pacientegeneral_list->RowIndex ?>_nombre2" value="<?php echo HtmlEncode($pacientegeneral_list->nombre2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->apellido1->Visible) { // apellido1 ?>
		<td data-name="apellido1">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_apellido1" class="form-group pacientegeneral_apellido1">
<input type="text" data-table="pacientegeneral" data-field="x_apellido1" name="x<?php echo $pacientegeneral_list->RowIndex ?>_apellido1" id="x<?php echo $pacientegeneral_list->RowIndex ?>_apellido1" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($pacientegeneral_list->apellido1->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->apellido1->EditValue ?>"<?php echo $pacientegeneral_list->apellido1->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_apellido1" name="o<?php echo $pacientegeneral_list->RowIndex ?>_apellido1" id="o<?php echo $pacientegeneral_list->RowIndex ?>_apellido1" value="<?php echo HtmlEncode($pacientegeneral_list->apellido1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->apellido2->Visible) { // apellido2 ?>
		<td data-name="apellido2">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_apellido2" class="form-group pacientegeneral_apellido2">
<input type="text" data-table="pacientegeneral" data-field="x_apellido2" name="x<?php echo $pacientegeneral_list->RowIndex ?>_apellido2" id="x<?php echo $pacientegeneral_list->RowIndex ?>_apellido2" size="20" maxlength="50" placeholder="<?php echo HtmlEncode($pacientegeneral_list->apellido2->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->apellido2->EditValue ?>"<?php echo $pacientegeneral_list->apellido2->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_apellido2" name="o<?php echo $pacientegeneral_list->RowIndex ?>_apellido2" id="o<?php echo $pacientegeneral_list->RowIndex ?>_apellido2" value="<?php echo HtmlEncode($pacientegeneral_list->apellido2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->genero->Visible) { // genero ?>
		<td data-name="genero">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_genero" class="form-group pacientegeneral_genero">
<div id="tp_x<?php echo $pacientegeneral_list->RowIndex ?>_genero" class="ew-template"><input type="radio" class="custom-control-input" data-table="pacientegeneral" data-field="x_genero" data-value-separator="<?php echo $pacientegeneral_list->genero->displayValueSeparatorAttribute() ?>" name="x<?php echo $pacientegeneral_list->RowIndex ?>_genero" id="x<?php echo $pacientegeneral_list->RowIndex ?>_genero" value="{value}"<?php echo $pacientegeneral_list->genero->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pacientegeneral_list->RowIndex ?>_genero" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pacientegeneral_list->genero->radioButtonListHtml(FALSE, "x{$pacientegeneral_list->RowIndex}_genero") ?>
</div></div>
<?php echo $pacientegeneral_list->genero->Lookup->getParamTag($pacientegeneral_list, "p_x" . $pacientegeneral_list->RowIndex . "_genero") ?>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_genero" name="o<?php echo $pacientegeneral_list->RowIndex ?>_genero" id="o<?php echo $pacientegeneral_list->RowIndex ?>_genero" value="<?php echo HtmlEncode($pacientegeneral_list->genero->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->edad->Visible) { // edad ?>
		<td data-name="edad">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_edad" class="form-group pacientegeneral_edad">
<input type="text" data-table="pacientegeneral" data-field="x_edad" name="x<?php echo $pacientegeneral_list->RowIndex ?>_edad" id="x<?php echo $pacientegeneral_list->RowIndex ?>_edad" size="2" maxlength="2" placeholder="<?php echo HtmlEncode($pacientegeneral_list->edad->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->edad->EditValue ?>"<?php echo $pacientegeneral_list->edad->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_edad" name="o<?php echo $pacientegeneral_list->RowIndex ?>_edad" id="o<?php echo $pacientegeneral_list->RowIndex ?>_edad" value="<?php echo HtmlEncode($pacientegeneral_list->edad->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->fecha_nacido->Visible) { // fecha_nacido ?>
		<td data-name="fecha_nacido">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_fecha_nacido" class="form-group pacientegeneral_fecha_nacido">
<input type="text" data-table="pacientegeneral" data-field="x_fecha_nacido" name="x<?php echo $pacientegeneral_list->RowIndex ?>_fecha_nacido" id="x<?php echo $pacientegeneral_list->RowIndex ?>_fecha_nacido" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pacientegeneral_list->fecha_nacido->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->fecha_nacido->EditValue ?>"<?php echo $pacientegeneral_list->fecha_nacido->editAttributes() ?>>
<?php if (!$pacientegeneral_list->fecha_nacido->ReadOnly && !$pacientegeneral_list->fecha_nacido->Disabled && !isset($pacientegeneral_list->fecha_nacido->EditAttrs["readonly"]) && !isset($pacientegeneral_list->fecha_nacido->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpacientegenerallist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpacientegenerallist", "x<?php echo $pacientegeneral_list->RowIndex ?>_fecha_nacido", {"ignoreReadonly":true,"useCurrent":false,"format":5});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_fecha_nacido" name="o<?php echo $pacientegeneral_list->RowIndex ?>_fecha_nacido" id="o<?php echo $pacientegeneral_list->RowIndex ?>_fecha_nacido" value="<?php echo HtmlEncode($pacientegeneral_list->fecha_nacido->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->cod_edad->Visible) { // cod_edad ?>
		<td data-name="cod_edad">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_cod_edad" class="form-group pacientegeneral_cod_edad">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pacientegeneral" data-field="x_cod_edad" data-value-separator="<?php echo $pacientegeneral_list->cod_edad->displayValueSeparatorAttribute() ?>" id="x<?php echo $pacientegeneral_list->RowIndex ?>_cod_edad" name="x<?php echo $pacientegeneral_list->RowIndex ?>_cod_edad"<?php echo $pacientegeneral_list->cod_edad->editAttributes() ?>>
			<?php echo $pacientegeneral_list->cod_edad->selectOptionListHtml("x{$pacientegeneral_list->RowIndex}_cod_edad") ?>
		</select>
</div>
<?php echo $pacientegeneral_list->cod_edad->Lookup->getParamTag($pacientegeneral_list, "p_x" . $pacientegeneral_list->RowIndex . "_cod_edad") ?>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_cod_edad" name="o<?php echo $pacientegeneral_list->RowIndex ?>_cod_edad" id="o<?php echo $pacientegeneral_list->RowIndex ?>_cod_edad" value="<?php echo HtmlEncode($pacientegeneral_list->cod_edad->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->telefono->Visible) { // telefono ?>
		<td data-name="telefono">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_telefono" class="form-group pacientegeneral_telefono">
<input type="text" data-table="pacientegeneral" data-field="x_telefono" name="x<?php echo $pacientegeneral_list->RowIndex ?>_telefono" id="x<?php echo $pacientegeneral_list->RowIndex ?>_telefono" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($pacientegeneral_list->telefono->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->telefono->EditValue ?>"<?php echo $pacientegeneral_list->telefono->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_telefono" name="o<?php echo $pacientegeneral_list->RowIndex ?>_telefono" id="o<?php echo $pacientegeneral_list->RowIndex ?>_telefono" value="<?php echo HtmlEncode($pacientegeneral_list->telefono->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->celular->Visible) { // celular ?>
		<td data-name="celular">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_celular" class="form-group pacientegeneral_celular">
<input type="text" data-table="pacientegeneral" data-field="x_celular" name="x<?php echo $pacientegeneral_list->RowIndex ?>_celular" id="x<?php echo $pacientegeneral_list->RowIndex ?>_celular" size="30" maxlength="13" placeholder="<?php echo HtmlEncode($pacientegeneral_list->celular->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->celular->EditValue ?>"<?php echo $pacientegeneral_list->celular->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_celular" name="o<?php echo $pacientegeneral_list->RowIndex ?>_celular" id="o<?php echo $pacientegeneral_list->RowIndex ?>_celular" value="<?php echo HtmlEncode($pacientegeneral_list->celular->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->direccion->Visible) { // direccion ?>
		<td data-name="direccion">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_direccion" class="form-group pacientegeneral_direccion">
<input type="text" data-table="pacientegeneral" data-field="x_direccion" name="x<?php echo $pacientegeneral_list->RowIndex ?>_direccion" id="x<?php echo $pacientegeneral_list->RowIndex ?>_direccion" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($pacientegeneral_list->direccion->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->direccion->EditValue ?>"<?php echo $pacientegeneral_list->direccion->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_direccion" name="o<?php echo $pacientegeneral_list->RowIndex ?>_direccion" id="o<?php echo $pacientegeneral_list->RowIndex ?>_direccion" value="<?php echo HtmlEncode($pacientegeneral_list->direccion->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->aseguradro->Visible) { // aseguradro ?>
		<td data-name="aseguradro">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_aseguradro" class="form-group pacientegeneral_aseguradro">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pacientegeneral" data-field="x_aseguradro" data-value-separator="<?php echo $pacientegeneral_list->aseguradro->displayValueSeparatorAttribute() ?>" id="x<?php echo $pacientegeneral_list->RowIndex ?>_aseguradro" name="x<?php echo $pacientegeneral_list->RowIndex ?>_aseguradro"<?php echo $pacientegeneral_list->aseguradro->editAttributes() ?>>
			<?php echo $pacientegeneral_list->aseguradro->selectOptionListHtml("x{$pacientegeneral_list->RowIndex}_aseguradro") ?>
		</select>
</div>
<?php echo $pacientegeneral_list->aseguradro->Lookup->getParamTag($pacientegeneral_list, "p_x" . $pacientegeneral_list->RowIndex . "_aseguradro") ?>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_aseguradro" name="o<?php echo $pacientegeneral_list->RowIndex ?>_aseguradro" id="o<?php echo $pacientegeneral_list->RowIndex ?>_aseguradro" value="<?php echo HtmlEncode($pacientegeneral_list->aseguradro->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->nss->Visible) { // nss ?>
		<td data-name="nss">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_nss" class="form-group pacientegeneral_nss">
<input type="text" data-table="pacientegeneral" data-field="x_nss" name="x<?php echo $pacientegeneral_list->RowIndex ?>_nss" id="x<?php echo $pacientegeneral_list->RowIndex ?>_nss" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($pacientegeneral_list->nss->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->nss->EditValue ?>"<?php echo $pacientegeneral_list->nss->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_nss" name="o<?php echo $pacientegeneral_list->RowIndex ?>_nss" id="o<?php echo $pacientegeneral_list->RowIndex ?>_nss" value="<?php echo HtmlEncode($pacientegeneral_list->nss->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->prehospitalario->Visible) { // prehospitalario ?>
		<td data-name="prehospitalario">
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_prehospitalario" class="form-group pacientegeneral_prehospitalario">
<input type="text" data-table="pacientegeneral" data-field="x_prehospitalario" name="x<?php echo $pacientegeneral_list->RowIndex ?>_prehospitalario" id="x<?php echo $pacientegeneral_list->RowIndex ?>_prehospitalario" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pacientegeneral_list->prehospitalario->getPlaceHolder()) ?>" value="<?php echo $pacientegeneral_list->prehospitalario->EditValue ?>"<?php echo $pacientegeneral_list->prehospitalario->editAttributes() ?>>
</span>
<input type="hidden" data-table="pacientegeneral" data-field="x_prehospitalario" name="o<?php echo $pacientegeneral_list->RowIndex ?>_prehospitalario" id="o<?php echo $pacientegeneral_list->RowIndex ?>_prehospitalario" value="<?php echo HtmlEncode($pacientegeneral_list->prehospitalario->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pacientegeneral_list->ListOptions->render("body", "right", $pacientegeneral_list->RowCount);
?>
<script>
loadjs.ready(["fpacientegenerallist", "load"], function() {
	fpacientegenerallist.updateLists(<?php echo $pacientegeneral_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($pacientegeneral_list->ExportAll && $pacientegeneral_list->isExport()) {
	$pacientegeneral_list->StopRecord = $pacientegeneral_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pacientegeneral_list->TotalRecords > $pacientegeneral_list->StartRecord + $pacientegeneral_list->DisplayRecords - 1)
		$pacientegeneral_list->StopRecord = $pacientegeneral_list->StartRecord + $pacientegeneral_list->DisplayRecords - 1;
	else
		$pacientegeneral_list->StopRecord = $pacientegeneral_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($pacientegeneral->isConfirm() || $pacientegeneral_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pacientegeneral_list->FormKeyCountName) && ($pacientegeneral_list->isGridAdd() || $pacientegeneral_list->isGridEdit() || $pacientegeneral->isConfirm())) {
		$pacientegeneral_list->KeyCount = $CurrentForm->getValue($pacientegeneral_list->FormKeyCountName);
		$pacientegeneral_list->StopRecord = $pacientegeneral_list->StartRecord + $pacientegeneral_list->KeyCount - 1;
	}
}
$pacientegeneral_list->RecordCount = $pacientegeneral_list->StartRecord - 1;
if ($pacientegeneral_list->Recordset && !$pacientegeneral_list->Recordset->EOF) {
	$pacientegeneral_list->Recordset->moveFirst();
	$selectLimit = $pacientegeneral_list->UseSelectLimit;
	if (!$selectLimit && $pacientegeneral_list->StartRecord > 1)
		$pacientegeneral_list->Recordset->move($pacientegeneral_list->StartRecord - 1);
} elseif (!$pacientegeneral->AllowAddDeleteRow && $pacientegeneral_list->StopRecord == 0) {
	$pacientegeneral_list->StopRecord = $pacientegeneral->GridAddRowCount;
}

// Initialize aggregate
$pacientegeneral->RowType = ROWTYPE_AGGREGATEINIT;
$pacientegeneral->resetAttributes();
$pacientegeneral_list->renderRow();
while ($pacientegeneral_list->RecordCount < $pacientegeneral_list->StopRecord) {
	$pacientegeneral_list->RecordCount++;
	if ($pacientegeneral_list->RecordCount >= $pacientegeneral_list->StartRecord) {
		$pacientegeneral_list->RowCount++;

		// Set up key count
		$pacientegeneral_list->KeyCount = $pacientegeneral_list->RowIndex;

		// Init row class and style
		$pacientegeneral->resetAttributes();
		$pacientegeneral->CssClass = "";
		if ($pacientegeneral_list->isGridAdd()) {
			$pacientegeneral_list->loadRowValues(); // Load default values
		} else {
			$pacientegeneral_list->loadRowValues($pacientegeneral_list->Recordset); // Load row values
		}
		$pacientegeneral->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pacientegeneral->RowAttrs->merge(["data-rowindex" => $pacientegeneral_list->RowCount, "id" => "r" . $pacientegeneral_list->RowCount . "_pacientegeneral", "data-rowtype" => $pacientegeneral->RowType]);

		// Render row
		$pacientegeneral_list->renderRow();

		// Render list options
		$pacientegeneral_list->renderListOptions();
?>
	<tr <?php echo $pacientegeneral->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pacientegeneral_list->ListOptions->render("body", "left", $pacientegeneral_list->RowCount);
?>
	<?php if ($pacientegeneral_list->cod_casointerh->Visible) { // cod_casointerh ?>
		<td data-name="cod_casointerh" <?php echo $pacientegeneral_list->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_cod_casointerh">
<span<?php echo $pacientegeneral_list->cod_casointerh->viewAttributes() ?>><?php echo $pacientegeneral_list->cod_casointerh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->id_paciente->Visible) { // id_paciente ?>
		<td data-name="id_paciente" <?php echo $pacientegeneral_list->id_paciente->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_id_paciente">
<span<?php echo $pacientegeneral_list->id_paciente->viewAttributes() ?>><?php echo $pacientegeneral_list->id_paciente->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->expendiente->Visible) { // expendiente ?>
		<td data-name="expendiente" <?php echo $pacientegeneral_list->expendiente->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_expendiente">
<span<?php echo $pacientegeneral_list->expendiente->viewAttributes() ?>><?php echo $pacientegeneral_list->expendiente->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->tipo_doc->Visible) { // tipo_doc ?>
		<td data-name="tipo_doc" <?php echo $pacientegeneral_list->tipo_doc->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_tipo_doc">
<span<?php echo $pacientegeneral_list->tipo_doc->viewAttributes() ?>><?php echo $pacientegeneral_list->tipo_doc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->num_doc->Visible) { // num_doc ?>
		<td data-name="num_doc" <?php echo $pacientegeneral_list->num_doc->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_num_doc">
<span<?php echo $pacientegeneral_list->num_doc->viewAttributes() ?>><?php echo $pacientegeneral_list->num_doc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->nombre1->Visible) { // nombre1 ?>
		<td data-name="nombre1" <?php echo $pacientegeneral_list->nombre1->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_nombre1">
<span<?php echo $pacientegeneral_list->nombre1->viewAttributes() ?>><?php echo $pacientegeneral_list->nombre1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->nombre2->Visible) { // nombre2 ?>
		<td data-name="nombre2" <?php echo $pacientegeneral_list->nombre2->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_nombre2">
<span<?php echo $pacientegeneral_list->nombre2->viewAttributes() ?>><?php echo $pacientegeneral_list->nombre2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->apellido1->Visible) { // apellido1 ?>
		<td data-name="apellido1" <?php echo $pacientegeneral_list->apellido1->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_apellido1">
<span<?php echo $pacientegeneral_list->apellido1->viewAttributes() ?>><?php echo $pacientegeneral_list->apellido1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->apellido2->Visible) { // apellido2 ?>
		<td data-name="apellido2" <?php echo $pacientegeneral_list->apellido2->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_apellido2">
<span<?php echo $pacientegeneral_list->apellido2->viewAttributes() ?>><?php echo $pacientegeneral_list->apellido2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->genero->Visible) { // genero ?>
		<td data-name="genero" <?php echo $pacientegeneral_list->genero->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_genero">
<span<?php echo $pacientegeneral_list->genero->viewAttributes() ?>><?php echo $pacientegeneral_list->genero->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->edad->Visible) { // edad ?>
		<td data-name="edad" <?php echo $pacientegeneral_list->edad->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_edad">
<span<?php echo $pacientegeneral_list->edad->viewAttributes() ?>><?php echo $pacientegeneral_list->edad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->fecha_nacido->Visible) { // fecha_nacido ?>
		<td data-name="fecha_nacido" <?php echo $pacientegeneral_list->fecha_nacido->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_fecha_nacido">
<span<?php echo $pacientegeneral_list->fecha_nacido->viewAttributes() ?>><?php echo $pacientegeneral_list->fecha_nacido->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->cod_edad->Visible) { // cod_edad ?>
		<td data-name="cod_edad" <?php echo $pacientegeneral_list->cod_edad->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_cod_edad">
<span<?php echo $pacientegeneral_list->cod_edad->viewAttributes() ?>><?php echo $pacientegeneral_list->cod_edad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->telefono->Visible) { // telefono ?>
		<td data-name="telefono" <?php echo $pacientegeneral_list->telefono->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_telefono">
<span<?php echo $pacientegeneral_list->telefono->viewAttributes() ?>><?php echo $pacientegeneral_list->telefono->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->celular->Visible) { // celular ?>
		<td data-name="celular" <?php echo $pacientegeneral_list->celular->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_celular">
<span<?php echo $pacientegeneral_list->celular->viewAttributes() ?>><?php echo $pacientegeneral_list->celular->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->direccion->Visible) { // direccion ?>
		<td data-name="direccion" <?php echo $pacientegeneral_list->direccion->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_direccion">
<span<?php echo $pacientegeneral_list->direccion->viewAttributes() ?>><?php echo $pacientegeneral_list->direccion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->aseguradro->Visible) { // aseguradro ?>
		<td data-name="aseguradro" <?php echo $pacientegeneral_list->aseguradro->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_aseguradro">
<span<?php echo $pacientegeneral_list->aseguradro->viewAttributes() ?>><?php echo $pacientegeneral_list->aseguradro->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->nss->Visible) { // nss ?>
		<td data-name="nss" <?php echo $pacientegeneral_list->nss->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_nss">
<span<?php echo $pacientegeneral_list->nss->viewAttributes() ?>><?php echo $pacientegeneral_list->nss->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pacientegeneral_list->prehospitalario->Visible) { // prehospitalario ?>
		<td data-name="prehospitalario" <?php echo $pacientegeneral_list->prehospitalario->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_list->RowCount ?>_pacientegeneral_prehospitalario">
<span<?php echo $pacientegeneral_list->prehospitalario->viewAttributes() ?>><?php echo $pacientegeneral_list->prehospitalario->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pacientegeneral_list->ListOptions->render("body", "right", $pacientegeneral_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pacientegeneral_list->isGridAdd())
		$pacientegeneral_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($pacientegeneral_list->isAdd() || $pacientegeneral_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $pacientegeneral_list->FormKeyCountName ?>" id="<?php echo $pacientegeneral_list->FormKeyCountName ?>" value="<?php echo $pacientegeneral_list->KeyCount ?>">
<?php } ?>
<?php if (!$pacientegeneral->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pacientegeneral_list->Recordset)
	$pacientegeneral_list->Recordset->Close();
?>
<?php if (!$pacientegeneral_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pacientegeneral_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pacientegeneral_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pacientegeneral_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pacientegeneral_list->TotalRecords == 0 && !$pacientegeneral->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pacientegeneral_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pacientegeneral_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pacientegeneral_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pacientegeneral_list->terminate();
?>