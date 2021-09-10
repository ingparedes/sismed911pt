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
$preh_maestro_list = new preh_maestro_list();

// Run the page
$preh_maestro_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_maestro_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_maestro_list->isExport()) { ?>
<script>
var fpreh_maestrolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpreh_maestrolist = currentForm = new ew.Form("fpreh_maestrolist", "list");
	fpreh_maestrolist.formKeyCountName = '<?php echo $preh_maestro_list->FormKeyCountName ?>';
	loadjs.done("fpreh_maestrolist");
});
var fpreh_maestrolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpreh_maestrolistsrch = currentSearchForm = new ew.Form("fpreh_maestrolistsrch");

	// Validate function for search
	fpreh_maestrolistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_fecha");
		if (elm && !ew.checkDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($preh_maestro_list->fecha->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_caso_multiple");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($preh_maestro_list->caso_multiple->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpreh_maestrolistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpreh_maestrolistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fpreh_maestrolistsrch.filterList = <?php echo $preh_maestro_list->getFilterList() ?>;
	loadjs.done("fpreh_maestrolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_maestro_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($preh_maestro_list->TotalRecords > 0 && $preh_maestro_list->ExportOptions->visible()) { ?>
<?php $preh_maestro_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_maestro_list->ImportOptions->visible()) { ?>
<?php $preh_maestro_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($preh_maestro_list->SearchOptions->visible()) { ?>
<?php $preh_maestro_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($preh_maestro_list->FilterOptions->visible()) { ?>
<?php $preh_maestro_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$preh_maestro_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$preh_maestro_list->isExport() && !$preh_maestro->CurrentAction) { ?>
<form name="fpreh_maestrolistsrch" id="fpreh_maestrolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpreh_maestrolistsrch-search-panel" class="<?php echo $preh_maestro_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="preh_maestro">
	<div class="ew-extended-search">
<?php

// Render search row
$preh_maestro->RowType = ROWTYPE_SEARCH;
$preh_maestro->resetAttributes();
$preh_maestro_list->renderRow();
?>
<?php if ($preh_maestro_list->fecha->Visible) { // fecha ?>
	<?php
		$preh_maestro_list->SearchColumnCount++;
		if (($preh_maestro_list->SearchColumnCount - 1) % $preh_maestro_list->SearchFieldsPerRow == 0) {
			$preh_maestro_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $preh_maestro_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_fecha" class="ew-cell form-group">
		<label for="x_fecha" class="ew-search-caption ew-label"><?php echo $preh_maestro_list->fecha->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_fecha" id="z_fecha" value="BETWEEN">
</span>
		<span id="el_preh_maestro_fecha" class="ew-search-field">
<input type="text" data-table="preh_maestro" data-field="x_fecha" data-format="109" name="x_fecha" id="x_fecha" maxlength="8" placeholder="<?php echo HtmlEncode($preh_maestro_list->fecha->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_list->fecha->EditValue ?>"<?php echo $preh_maestro_list->fecha->editAttributes() ?>>
<?php if (!$preh_maestro_list->fecha->ReadOnly && !$preh_maestro_list->fecha->Disabled && !isset($preh_maestro_list->fecha->EditAttrs["readonly"]) && !isset($preh_maestro_list->fecha->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpreh_maestrolistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_maestrolistsrch", "x_fecha", {"ignoreReadonly":true,"useCurrent":false,"format":109});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_preh_maestro_fecha" class="ew-search-field2">
<input type="text" data-table="preh_maestro" data-field="x_fecha" data-format="109" name="y_fecha" id="y_fecha" maxlength="8" placeholder="<?php echo HtmlEncode($preh_maestro_list->fecha->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_list->fecha->EditValue2 ?>"<?php echo $preh_maestro_list->fecha->editAttributes() ?>>
<?php if (!$preh_maestro_list->fecha->ReadOnly && !$preh_maestro_list->fecha->Disabled && !isset($preh_maestro_list->fecha->EditAttrs["readonly"]) && !isset($preh_maestro_list->fecha->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpreh_maestrolistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_maestrolistsrch", "y_fecha", {"ignoreReadonly":true,"useCurrent":false,"format":109});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($preh_maestro_list->SearchColumnCount % $preh_maestro_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->caso_multiple->Visible) { // caso_multiple ?>
	<?php
		$preh_maestro_list->SearchColumnCount++;
		if (($preh_maestro_list->SearchColumnCount - 1) % $preh_maestro_list->SearchFieldsPerRow == 0) {
			$preh_maestro_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $preh_maestro_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_caso_multiple" class="ew-cell form-group">
		<label for="x_caso_multiple" class="ew-search-caption ew-label"><?php echo $preh_maestro_list->caso_multiple->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_caso_multiple" id="z_caso_multiple" value="=">
</span>
		<span id="el_preh_maestro_caso_multiple" class="ew-search-field">
<input type="text" data-table="preh_maestro" data-field="x_caso_multiple" name="x_caso_multiple" id="x_caso_multiple" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($preh_maestro_list->caso_multiple->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_list->caso_multiple->EditValue ?>"<?php echo $preh_maestro_list->caso_multiple->editAttributes() ?>>
</span>
	</div>
	<?php if ($preh_maestro_list->SearchColumnCount % $preh_maestro_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($preh_maestro_list->SearchColumnCount % $preh_maestro_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $preh_maestro_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($preh_maestro_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($preh_maestro_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $preh_maestro_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($preh_maestro_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($preh_maestro_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($preh_maestro_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($preh_maestro_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $preh_maestro_list->showPageHeader(); ?>
<?php
$preh_maestro_list->showMessage();
?>
<?php if ($preh_maestro_list->TotalRecords > 0 || $preh_maestro->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($preh_maestro_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> preh_maestro">
<?php if (!$preh_maestro_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$preh_maestro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_maestro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_maestro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpreh_maestrolist" id="fpreh_maestrolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_maestro">
<div id="gmp_preh_maestro" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($preh_maestro_list->TotalRecords > 0 || $preh_maestro_list->isGridEdit()) { ?>
<table id="tbl_preh_maestrolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$preh_maestro->RowType = ROWTYPE_HEADER;

// Render list options
$preh_maestro_list->renderListOptions();

// Render list options (header, left)
$preh_maestro_list->ListOptions->render("header", "left");
?>
<?php if ($preh_maestro_list->cod_casopreh->Visible) { // cod_casopreh ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->cod_casopreh) == "") { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_maestro_list->cod_casopreh->headerCellClass() ?>"><div id="elh_preh_maestro_cod_casopreh" class="preh_maestro_cod_casopreh"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->cod_casopreh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_casopreh" class="<?php echo $preh_maestro_list->cod_casopreh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->cod_casopreh) ?>', 1);"><div id="elh_preh_maestro_cod_casopreh" class="preh_maestro_cod_casopreh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->cod_casopreh->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->cod_casopreh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->cod_casopreh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->fecha->Visible) { // fecha ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->fecha) == "") { ?>
		<th data-name="fecha" class="<?php echo $preh_maestro_list->fecha->headerCellClass() ?>"><div id="elh_preh_maestro_fecha" class="preh_maestro_fecha"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->fecha->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha" class="<?php echo $preh_maestro_list->fecha->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->fecha) ?>', 1);"><div id="elh_preh_maestro_fecha" class="preh_maestro_fecha">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->fecha->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->fecha->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->fecha->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->tiempo->Visible) { // tiempo ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->tiempo) == "") { ?>
		<th data-name="tiempo" class="<?php echo $preh_maestro_list->tiempo->headerCellClass() ?>"><div id="elh_preh_maestro_tiempo" class="preh_maestro_tiempo"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->tiempo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tiempo" class="<?php echo $preh_maestro_list->tiempo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->tiempo) ?>', 1);"><div id="elh_preh_maestro_tiempo" class="preh_maestro_tiempo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->tiempo->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->tiempo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->tiempo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->direccion->Visible) { // direccion ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->direccion) == "") { ?>
		<th data-name="direccion" class="<?php echo $preh_maestro_list->direccion->headerCellClass() ?>"><div id="elh_preh_maestro_direccion" class="preh_maestro_direccion"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->direccion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="direccion" class="<?php echo $preh_maestro_list->direccion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->direccion) ?>', 1);"><div id="elh_preh_maestro_direccion" class="preh_maestro_direccion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->direccion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->direccion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->direccion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->incidente->Visible) { // incidente ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->incidente) == "") { ?>
		<th data-name="incidente" class="<?php echo $preh_maestro_list->incidente->headerCellClass() ?>"><div id="elh_preh_maestro_incidente" class="preh_maestro_incidente"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->incidente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="incidente" class="<?php echo $preh_maestro_list->incidente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->incidente) ?>', 1);"><div id="elh_preh_maestro_incidente" class="preh_maestro_incidente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->incidente->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->incidente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->incidente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->prioridad->Visible) { // prioridad ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->prioridad) == "") { ?>
		<th data-name="prioridad" class="<?php echo $preh_maestro_list->prioridad->headerCellClass() ?>"><div id="elh_preh_maestro_prioridad" class="preh_maestro_prioridad"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->prioridad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prioridad" class="<?php echo $preh_maestro_list->prioridad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->prioridad) ?>', 1);"><div id="elh_preh_maestro_prioridad" class="preh_maestro_prioridad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->prioridad->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->prioridad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->prioridad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->estado->Visible) { // estado ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->estado) == "") { ?>
		<th data-name="estado" class="<?php echo $preh_maestro_list->estado->headerCellClass() ?>"><div id="elh_preh_maestro_estado" class="preh_maestro_estado"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->estado->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estado" class="<?php echo $preh_maestro_list->estado->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->estado) ?>', 1);"><div id="elh_preh_maestro_estado" class="preh_maestro_estado">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->estado->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->estado->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->estado->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->caso_multiple->Visible) { // caso_multiple ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->caso_multiple) == "") { ?>
		<th data-name="caso_multiple" class="<?php echo $preh_maestro_list->caso_multiple->headerCellClass() ?>"><div id="elh_preh_maestro_caso_multiple" class="preh_maestro_caso_multiple"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->caso_multiple->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="caso_multiple" class="<?php echo $preh_maestro_list->caso_multiple->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->caso_multiple) ?>', 1);"><div id="elh_preh_maestro_caso_multiple" class="preh_maestro_caso_multiple">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->caso_multiple->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->caso_multiple->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->caso_multiple->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->paciente->Visible) { // paciente ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->paciente) == "") { ?>
		<th data-name="paciente" class="<?php echo $preh_maestro_list->paciente->headerCellClass() ?>"><div id="elh_preh_maestro_paciente" class="preh_maestro_paciente"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->paciente->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paciente" class="<?php echo $preh_maestro_list->paciente->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->paciente) ?>', 1);"><div id="elh_preh_maestro_paciente" class="preh_maestro_paciente">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->paciente->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->paciente->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->paciente->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->hospital_destino->Visible) { // hospital_destino ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->hospital_destino) == "") { ?>
		<th data-name="hospital_destino" class="<?php echo $preh_maestro_list->hospital_destino->headerCellClass() ?>"><div id="elh_preh_maestro_hospital_destino" class="preh_maestro_hospital_destino"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->hospital_destino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hospital_destino" class="<?php echo $preh_maestro_list->hospital_destino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->hospital_destino) ?>', 1);"><div id="elh_preh_maestro_hospital_destino" class="preh_maestro_hospital_destino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->hospital_destino->caption() ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->hospital_destino->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->hospital_destino->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->nombre_medico->Visible) { // nombre_medico ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->nombre_medico) == "") { ?>
		<th data-name="nombre_medico" class="<?php echo $preh_maestro_list->nombre_medico->headerCellClass() ?>"><div id="elh_preh_maestro_nombre_medico" class="preh_maestro_nombre_medico"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->nombre_medico->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_medico" class="<?php echo $preh_maestro_list->nombre_medico->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->nombre_medico) ?>', 1);"><div id="elh_preh_maestro_nombre_medico" class="preh_maestro_nombre_medico">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->nombre_medico->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->nombre_medico->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->nombre_medico->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->telefono->Visible) { // telefono ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->telefono) == "") { ?>
		<th data-name="telefono" class="<?php echo $preh_maestro_list->telefono->headerCellClass() ?>"><div id="elh_preh_maestro_telefono" class="preh_maestro_telefono"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->telefono->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telefono" class="<?php echo $preh_maestro_list->telefono->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->telefono) ?>', 1);"><div id="elh_preh_maestro_telefono" class="preh_maestro_telefono">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->telefono->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->telefono->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->telefono->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($preh_maestro_list->nombre_reporta->Visible) { // nombre_reporta ?>
	<?php if ($preh_maestro_list->SortUrl($preh_maestro_list->nombre_reporta) == "") { ?>
		<th data-name="nombre_reporta" class="<?php echo $preh_maestro_list->nombre_reporta->headerCellClass() ?>"><div id="elh_preh_maestro_nombre_reporta" class="preh_maestro_nombre_reporta"><div class="ew-table-header-caption"><?php echo $preh_maestro_list->nombre_reporta->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_reporta" class="<?php echo $preh_maestro_list->nombre_reporta->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $preh_maestro_list->SortUrl($preh_maestro_list->nombre_reporta) ?>', 1);"><div id="elh_preh_maestro_nombre_reporta" class="preh_maestro_nombre_reporta">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $preh_maestro_list->nombre_reporta->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($preh_maestro_list->nombre_reporta->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($preh_maestro_list->nombre_reporta->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$preh_maestro_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($preh_maestro_list->ExportAll && $preh_maestro_list->isExport()) {
	$preh_maestro_list->StopRecord = $preh_maestro_list->TotalRecords;
} else {

	// Set the last record to display
	if ($preh_maestro_list->TotalRecords > $preh_maestro_list->StartRecord + $preh_maestro_list->DisplayRecords - 1)
		$preh_maestro_list->StopRecord = $preh_maestro_list->StartRecord + $preh_maestro_list->DisplayRecords - 1;
	else
		$preh_maestro_list->StopRecord = $preh_maestro_list->TotalRecords;
}
$preh_maestro_list->RecordCount = $preh_maestro_list->StartRecord - 1;
if ($preh_maestro_list->Recordset && !$preh_maestro_list->Recordset->EOF) {
	$preh_maestro_list->Recordset->moveFirst();
	$selectLimit = $preh_maestro_list->UseSelectLimit;
	if (!$selectLimit && $preh_maestro_list->StartRecord > 1)
		$preh_maestro_list->Recordset->move($preh_maestro_list->StartRecord - 1);
} elseif (!$preh_maestro->AllowAddDeleteRow && $preh_maestro_list->StopRecord == 0) {
	$preh_maestro_list->StopRecord = $preh_maestro->GridAddRowCount;
}

// Initialize aggregate
$preh_maestro->RowType = ROWTYPE_AGGREGATEINIT;
$preh_maestro->resetAttributes();
$preh_maestro_list->renderRow();
while ($preh_maestro_list->RecordCount < $preh_maestro_list->StopRecord) {
	$preh_maestro_list->RecordCount++;
	if ($preh_maestro_list->RecordCount >= $preh_maestro_list->StartRecord) {
		$preh_maestro_list->RowCount++;

		// Set up key count
		$preh_maestro_list->KeyCount = $preh_maestro_list->RowIndex;

		// Init row class and style
		$preh_maestro->resetAttributes();
		$preh_maestro->CssClass = "";
		if ($preh_maestro_list->isGridAdd()) {
		} else {
			$preh_maestro_list->loadRowValues($preh_maestro_list->Recordset); // Load row values
		}
		$preh_maestro->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$preh_maestro->RowAttrs->merge(["data-rowindex" => $preh_maestro_list->RowCount, "id" => "r" . $preh_maestro_list->RowCount . "_preh_maestro", "data-rowtype" => $preh_maestro->RowType]);

		// Render row
		$preh_maestro_list->renderRow();

		// Render list options
		$preh_maestro_list->renderListOptions();
?>
	<tr <?php echo $preh_maestro->rowAttributes() ?>>
<?php

// Render list options (body, left)
$preh_maestro_list->ListOptions->render("body", "left", $preh_maestro_list->RowCount);
?>
	<?php if ($preh_maestro_list->cod_casopreh->Visible) { // cod_casopreh ?>
		<td data-name="cod_casopreh" <?php echo $preh_maestro_list->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_cod_casopreh">
<span<?php echo $preh_maestro_list->cod_casopreh->viewAttributes() ?>><?php if (!EmptyString($preh_maestro_list->cod_casopreh->TooltipValue) && $preh_maestro_list->cod_casopreh->linkAttributes() != "") { ?>
<a<?php echo $preh_maestro_list->cod_casopreh->linkAttributes() ?>><?php echo $preh_maestro_list->cod_casopreh->getViewValue() ?></a>
<?php } else { ?>
<?php echo $preh_maestro_list->cod_casopreh->getViewValue() ?>
<?php } ?>
<span id="tt_preh_maestro_x<?php echo $preh_maestro_list->RowCount ?>_cod_casopreh" class="d-none">
<?php echo $preh_maestro_list->cod_casopreh->TooltipValue ?>
</span></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->fecha->Visible) { // fecha ?>
		<td data-name="fecha" <?php echo $preh_maestro_list->fecha->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_fecha">
<span<?php echo $preh_maestro_list->fecha->viewAttributes() ?>><?php echo $preh_maestro_list->fecha->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->tiempo->Visible) { // tiempo ?>
		<td data-name="tiempo" <?php echo $preh_maestro_list->tiempo->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_tiempo">
<span<?php echo $preh_maestro_list->tiempo->viewAttributes() ?>><?php
echo "<i class='far fa-clock'></i> ".CurrentPage()->tiempo->CurrentValue. " MIN";
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->direccion->Visible) { // direccion ?>
		<td data-name="direccion" <?php echo $preh_maestro_list->direccion->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_direccion">
<span<?php echo $preh_maestro_list->direccion->viewAttributes() ?>><?php echo $preh_maestro_list->direccion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->incidente->Visible) { // incidente ?>
		<td data-name="incidente" <?php echo $preh_maestro_list->incidente->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_incidente">
<span<?php echo $preh_maestro_list->incidente->viewAttributes() ?>><?php echo $preh_maestro_list->incidente->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->prioridad->Visible) { // prioridad ?>
		<td data-name="prioridad" <?php echo $preh_maestro_list->prioridad->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_prioridad">
<span<?php echo $preh_maestro_list->prioridad->viewAttributes() ?>><?php echo $preh_maestro_list->prioridad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->estado->Visible) { // estado ?>
		<td data-name="estado" <?php echo $preh_maestro_list->estado->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_estado">
<span<?php echo $preh_maestro_list->estado->viewAttributes() ?>><?php
$amb = ExecuteScalar("SELECT preh_servicio_ambulancia.cod_ambulancia FROM preh_maestro INNER JOIN preh_servicio_ambulancia ON preh_maestro.cod_casopreh =  preh_servicio_ambulancia.id_maestrointerh WHERE preh_maestro.cod_casopreh = ".CurrentPage()->cod_casopreh->CurrentValue);
if ( $amb <> '')
echo "<small><li class = 'badge bg-info'> <i class='fas fa-check'></i> Asignada ".$amb."</li></small>";
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->caso_multiple->Visible) { // caso_multiple ?>
		<td data-name="caso_multiple" <?php echo $preh_maestro_list->caso_multiple->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_caso_multiple">
<span<?php echo $preh_maestro_list->caso_multiple->viewAttributes() ?>><?php echo $preh_maestro_list->caso_multiple->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->paciente->Visible) { // paciente ?>
		<td data-name="paciente" <?php echo $preh_maestro_list->paciente->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_paciente">
<span<?php echo $preh_maestro_list->paciente->viewAttributes() ?>><?php
$pte = ExecuteScalar("SELECT concat_ws(' ','ID',num_doc,nombre1,nombre2,apellido1,apellido2) as pte FROM pacientegeneral WHERE prehospitalario = '1' and cod_pacienteinterh = ".CurrentPage()->cod_casopreh->CurrentValue);
echo $pte;
?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->hospital_destino->Visible) { // hospital_destino ?>
		<td data-name="hospital_destino" <?php echo $preh_maestro_list->hospital_destino->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_hospital_destino">
<span<?php echo $preh_maestro_list->hospital_destino->viewAttributes() ?>><?php echo $preh_maestro_list->hospital_destino->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->nombre_medico->Visible) { // nombre_medico ?>
		<td data-name="nombre_medico" <?php echo $preh_maestro_list->nombre_medico->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_nombre_medico">
<span<?php echo $preh_maestro_list->nombre_medico->viewAttributes() ?>><?php echo $preh_maestro_list->nombre_medico->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->telefono->Visible) { // telefono ?>
		<td data-name="telefono" <?php echo $preh_maestro_list->telefono->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_telefono">
<span<?php echo $preh_maestro_list->telefono->viewAttributes() ?>><?php echo $preh_maestro_list->telefono->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($preh_maestro_list->nombre_reporta->Visible) { // nombre_reporta ?>
		<td data-name="nombre_reporta" <?php echo $preh_maestro_list->nombre_reporta->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_list->RowCount ?>_preh_maestro_nombre_reporta">
<span<?php echo $preh_maestro_list->nombre_reporta->viewAttributes() ?>><?php echo $preh_maestro_list->nombre_reporta->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$preh_maestro_list->ListOptions->render("body", "right", $preh_maestro_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$preh_maestro_list->isGridAdd())
		$preh_maestro_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$preh_maestro->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($preh_maestro_list->Recordset)
	$preh_maestro_list->Recordset->Close();
?>
<?php if (!$preh_maestro_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$preh_maestro_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $preh_maestro_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $preh_maestro_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($preh_maestro_list->TotalRecords == 0 && !$preh_maestro->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $preh_maestro_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$preh_maestro_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_maestro_list->isExport()) { ?>
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
$preh_maestro_list->terminate();
?>