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
$hospitalesgeneral_list = new hospitalesgeneral_list();

// Run the page
$hospitalesgeneral_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospitalesgeneral_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$hospitalesgeneral_list->isExport()) { ?>
<script>
var fhospitalesgenerallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fhospitalesgenerallist = currentForm = new ew.Form("fhospitalesgenerallist", "list");
	fhospitalesgenerallist.formKeyCountName = '<?php echo $hospitalesgeneral_list->FormKeyCountName ?>';
	loadjs.done("fhospitalesgenerallist");
});
var fhospitalesgenerallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fhospitalesgenerallistsrch = currentSearchForm = new ew.Form("fhospitalesgenerallistsrch");

	// Dynamic selection lists
	// Filters

	fhospitalesgenerallistsrch.filterList = <?php echo $hospitalesgeneral_list->getFilterList() ?>;
	loadjs.done("fhospitalesgenerallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$hospitalesgeneral_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hospitalesgeneral_list->TotalRecords > 0 && $hospitalesgeneral_list->ExportOptions->visible()) { ?>
<?php $hospitalesgeneral_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->ImportOptions->visible()) { ?>
<?php $hospitalesgeneral_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->SearchOptions->visible()) { ?>
<?php $hospitalesgeneral_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->FilterOptions->visible()) { ?>
<?php $hospitalesgeneral_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hospitalesgeneral_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hospitalesgeneral_list->isExport() && !$hospitalesgeneral->CurrentAction) { ?>
<form name="fhospitalesgenerallistsrch" id="fhospitalesgenerallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fhospitalesgenerallistsrch-search-panel" class="<?php echo $hospitalesgeneral_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hospitalesgeneral">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $hospitalesgeneral_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($hospitalesgeneral_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($hospitalesgeneral_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hospitalesgeneral_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hospitalesgeneral_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hospitalesgeneral_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hospitalesgeneral_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hospitalesgeneral_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $hospitalesgeneral_list->showPageHeader(); ?>
<?php
$hospitalesgeneral_list->showMessage();
?>
<?php if ($hospitalesgeneral_list->TotalRecords > 0 || $hospitalesgeneral->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hospitalesgeneral_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hospitalesgeneral">
<?php if (!$hospitalesgeneral_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hospitalesgeneral_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $hospitalesgeneral_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospitalesgeneral_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhospitalesgenerallist" id="fhospitalesgenerallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospitalesgeneral">
<div id="gmp_hospitalesgeneral" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($hospitalesgeneral_list->TotalRecords > 0 || $hospitalesgeneral_list->isGridEdit()) { ?>
<table id="tbl_hospitalesgenerallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hospitalesgeneral->RowType = ROWTYPE_HEADER;

// Render list options
$hospitalesgeneral_list->renderListOptions();

// Render list options (header, left)
$hospitalesgeneral_list->ListOptions->render("header", "left");
?>
<?php if ($hospitalesgeneral_list->nombre_hospital->Visible) { // nombre_hospital ?>
	<?php if ($hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->nombre_hospital) == "") { ?>
		<th data-name="nombre_hospital" class="<?php echo $hospitalesgeneral_list->nombre_hospital->headerCellClass() ?>"><div id="elh_hospitalesgeneral_nombre_hospital" class="hospitalesgeneral_nombre_hospital"><div class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->nombre_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_hospital" class="<?php echo $hospitalesgeneral_list->nombre_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->nombre_hospital) ?>', 1);"><div id="elh_hospitalesgeneral_nombre_hospital" class="hospitalesgeneral_nombre_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->nombre_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospitalesgeneral_list->nombre_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospitalesgeneral_list->nombre_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->depto_hospital->Visible) { // depto_hospital ?>
	<?php if ($hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->depto_hospital) == "") { ?>
		<th data-name="depto_hospital" class="<?php echo $hospitalesgeneral_list->depto_hospital->headerCellClass() ?>"><div id="elh_hospitalesgeneral_depto_hospital" class="hospitalesgeneral_depto_hospital"><div class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->depto_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="depto_hospital" class="<?php echo $hospitalesgeneral_list->depto_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->depto_hospital) ?>', 1);"><div id="elh_hospitalesgeneral_depto_hospital" class="hospitalesgeneral_depto_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->depto_hospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospitalesgeneral_list->depto_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospitalesgeneral_list->depto_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->provincia_hospital->Visible) { // provincia_hospital ?>
	<?php if ($hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->provincia_hospital) == "") { ?>
		<th data-name="provincia_hospital" class="<?php echo $hospitalesgeneral_list->provincia_hospital->headerCellClass() ?>"><div id="elh_hospitalesgeneral_provincia_hospital" class="hospitalesgeneral_provincia_hospital"><div class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->provincia_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="provincia_hospital" class="<?php echo $hospitalesgeneral_list->provincia_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->provincia_hospital) ?>', 1);"><div id="elh_hospitalesgeneral_provincia_hospital" class="hospitalesgeneral_provincia_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->provincia_hospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospitalesgeneral_list->provincia_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospitalesgeneral_list->provincia_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->municipio_hospital->Visible) { // municipio_hospital ?>
	<?php if ($hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->municipio_hospital) == "") { ?>
		<th data-name="municipio_hospital" class="<?php echo $hospitalesgeneral_list->municipio_hospital->headerCellClass() ?>"><div id="elh_hospitalesgeneral_municipio_hospital" class="hospitalesgeneral_municipio_hospital"><div class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->municipio_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="municipio_hospital" class="<?php echo $hospitalesgeneral_list->municipio_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->municipio_hospital) ?>', 1);"><div id="elh_hospitalesgeneral_municipio_hospital" class="hospitalesgeneral_municipio_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->municipio_hospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospitalesgeneral_list->municipio_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospitalesgeneral_list->municipio_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->nivel_hospital->Visible) { // nivel_hospital ?>
	<?php if ($hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->nivel_hospital) == "") { ?>
		<th data-name="nivel_hospital" class="<?php echo $hospitalesgeneral_list->nivel_hospital->headerCellClass() ?>"><div id="elh_hospitalesgeneral_nivel_hospital" class="hospitalesgeneral_nivel_hospital"><div class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->nivel_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nivel_hospital" class="<?php echo $hospitalesgeneral_list->nivel_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->nivel_hospital) ?>', 1);"><div id="elh_hospitalesgeneral_nivel_hospital" class="hospitalesgeneral_nivel_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->nivel_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospitalesgeneral_list->nivel_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospitalesgeneral_list->nivel_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->tipo_hospital->Visible) { // tipo_hospital ?>
	<?php if ($hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->tipo_hospital) == "") { ?>
		<th data-name="tipo_hospital" class="<?php echo $hospitalesgeneral_list->tipo_hospital->headerCellClass() ?>"><div id="elh_hospitalesgeneral_tipo_hospital" class="hospitalesgeneral_tipo_hospital"><div class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->tipo_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_hospital" class="<?php echo $hospitalesgeneral_list->tipo_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->tipo_hospital) ?>', 1);"><div id="elh_hospitalesgeneral_tipo_hospital" class="hospitalesgeneral_tipo_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->tipo_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospitalesgeneral_list->tipo_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospitalesgeneral_list->tipo_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->especialidad->Visible) { // especialidad ?>
	<?php if ($hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->especialidad) == "") { ?>
		<th data-name="especialidad" class="<?php echo $hospitalesgeneral_list->especialidad->headerCellClass() ?>"><div id="elh_hospitalesgeneral_especialidad" class="hospitalesgeneral_especialidad"><div class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->especialidad->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="especialidad" class="<?php echo $hospitalesgeneral_list->especialidad->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->especialidad) ?>', 1);"><div id="elh_hospitalesgeneral_especialidad" class="hospitalesgeneral_especialidad">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->especialidad->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospitalesgeneral_list->especialidad->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospitalesgeneral_list->especialidad->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->codpolitico->Visible) { // codpolitico ?>
	<?php if ($hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->codpolitico) == "") { ?>
		<th data-name="codpolitico" class="<?php echo $hospitalesgeneral_list->codpolitico->headerCellClass() ?>"><div id="elh_hospitalesgeneral_codpolitico" class="hospitalesgeneral_codpolitico"><div class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->codpolitico->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="codpolitico" class="<?php echo $hospitalesgeneral_list->codpolitico->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->codpolitico) ?>', 1);"><div id="elh_hospitalesgeneral_codpolitico" class="hospitalesgeneral_codpolitico">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->codpolitico->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospitalesgeneral_list->codpolitico->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospitalesgeneral_list->codpolitico->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->telefono->Visible) { // telefono ?>
	<?php if ($hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->telefono) == "") { ?>
		<th data-name="telefono" class="<?php echo $hospitalesgeneral_list->telefono->headerCellClass() ?>"><div id="elh_hospitalesgeneral_telefono" class="hospitalesgeneral_telefono"><div class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->telefono->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telefono" class="<?php echo $hospitalesgeneral_list->telefono->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->telefono) ?>', 1);"><div id="elh_hospitalesgeneral_telefono" class="hospitalesgeneral_telefono">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->telefono->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospitalesgeneral_list->telefono->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospitalesgeneral_list->telefono->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospitalesgeneral_list->nombre_responsable->Visible) { // nombre_responsable ?>
	<?php if ($hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->nombre_responsable) == "") { ?>
		<th data-name="nombre_responsable" class="<?php echo $hospitalesgeneral_list->nombre_responsable->headerCellClass() ?>"><div id="elh_hospitalesgeneral_nombre_responsable" class="hospitalesgeneral_nombre_responsable"><div class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->nombre_responsable->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_responsable" class="<?php echo $hospitalesgeneral_list->nombre_responsable->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospitalesgeneral_list->SortUrl($hospitalesgeneral_list->nombre_responsable) ?>', 1);"><div id="elh_hospitalesgeneral_nombre_responsable" class="hospitalesgeneral_nombre_responsable">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospitalesgeneral_list->nombre_responsable->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospitalesgeneral_list->nombre_responsable->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospitalesgeneral_list->nombre_responsable->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hospitalesgeneral_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hospitalesgeneral_list->ExportAll && $hospitalesgeneral_list->isExport()) {
	$hospitalesgeneral_list->StopRecord = $hospitalesgeneral_list->TotalRecords;
} else {

	// Set the last record to display
	if ($hospitalesgeneral_list->TotalRecords > $hospitalesgeneral_list->StartRecord + $hospitalesgeneral_list->DisplayRecords - 1)
		$hospitalesgeneral_list->StopRecord = $hospitalesgeneral_list->StartRecord + $hospitalesgeneral_list->DisplayRecords - 1;
	else
		$hospitalesgeneral_list->StopRecord = $hospitalesgeneral_list->TotalRecords;
}
$hospitalesgeneral_list->RecordCount = $hospitalesgeneral_list->StartRecord - 1;
if ($hospitalesgeneral_list->Recordset && !$hospitalesgeneral_list->Recordset->EOF) {
	$hospitalesgeneral_list->Recordset->moveFirst();
	$selectLimit = $hospitalesgeneral_list->UseSelectLimit;
	if (!$selectLimit && $hospitalesgeneral_list->StartRecord > 1)
		$hospitalesgeneral_list->Recordset->move($hospitalesgeneral_list->StartRecord - 1);
} elseif (!$hospitalesgeneral->AllowAddDeleteRow && $hospitalesgeneral_list->StopRecord == 0) {
	$hospitalesgeneral_list->StopRecord = $hospitalesgeneral->GridAddRowCount;
}

// Initialize aggregate
$hospitalesgeneral->RowType = ROWTYPE_AGGREGATEINIT;
$hospitalesgeneral->resetAttributes();
$hospitalesgeneral_list->renderRow();
while ($hospitalesgeneral_list->RecordCount < $hospitalesgeneral_list->StopRecord) {
	$hospitalesgeneral_list->RecordCount++;
	if ($hospitalesgeneral_list->RecordCount >= $hospitalesgeneral_list->StartRecord) {
		$hospitalesgeneral_list->RowCount++;

		// Set up key count
		$hospitalesgeneral_list->KeyCount = $hospitalesgeneral_list->RowIndex;

		// Init row class and style
		$hospitalesgeneral->resetAttributes();
		$hospitalesgeneral->CssClass = "";
		if ($hospitalesgeneral_list->isGridAdd()) {
		} else {
			$hospitalesgeneral_list->loadRowValues($hospitalesgeneral_list->Recordset); // Load row values
		}
		$hospitalesgeneral->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hospitalesgeneral->RowAttrs->merge(["data-rowindex" => $hospitalesgeneral_list->RowCount, "id" => "r" . $hospitalesgeneral_list->RowCount . "_hospitalesgeneral", "data-rowtype" => $hospitalesgeneral->RowType]);

		// Render row
		$hospitalesgeneral_list->renderRow();

		// Render list options
		$hospitalesgeneral_list->renderListOptions();
?>
	<tr <?php echo $hospitalesgeneral->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hospitalesgeneral_list->ListOptions->render("body", "left", $hospitalesgeneral_list->RowCount);
?>
	<?php if ($hospitalesgeneral_list->nombre_hospital->Visible) { // nombre_hospital ?>
		<td data-name="nombre_hospital" <?php echo $hospitalesgeneral_list->nombre_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_list->RowCount ?>_hospitalesgeneral_nombre_hospital">
<span<?php echo $hospitalesgeneral_list->nombre_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_list->nombre_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospitalesgeneral_list->depto_hospital->Visible) { // depto_hospital ?>
		<td data-name="depto_hospital" <?php echo $hospitalesgeneral_list->depto_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_list->RowCount ?>_hospitalesgeneral_depto_hospital">
<span<?php echo $hospitalesgeneral_list->depto_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_list->depto_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospitalesgeneral_list->provincia_hospital->Visible) { // provincia_hospital ?>
		<td data-name="provincia_hospital" <?php echo $hospitalesgeneral_list->provincia_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_list->RowCount ?>_hospitalesgeneral_provincia_hospital">
<span<?php echo $hospitalesgeneral_list->provincia_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_list->provincia_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospitalesgeneral_list->municipio_hospital->Visible) { // municipio_hospital ?>
		<td data-name="municipio_hospital" <?php echo $hospitalesgeneral_list->municipio_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_list->RowCount ?>_hospitalesgeneral_municipio_hospital">
<span<?php echo $hospitalesgeneral_list->municipio_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_list->municipio_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospitalesgeneral_list->nivel_hospital->Visible) { // nivel_hospital ?>
		<td data-name="nivel_hospital" <?php echo $hospitalesgeneral_list->nivel_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_list->RowCount ?>_hospitalesgeneral_nivel_hospital">
<span<?php echo $hospitalesgeneral_list->nivel_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_list->nivel_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospitalesgeneral_list->tipo_hospital->Visible) { // tipo_hospital ?>
		<td data-name="tipo_hospital" <?php echo $hospitalesgeneral_list->tipo_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_list->RowCount ?>_hospitalesgeneral_tipo_hospital">
<span<?php echo $hospitalesgeneral_list->tipo_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_list->tipo_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospitalesgeneral_list->especialidad->Visible) { // especialidad ?>
		<td data-name="especialidad" <?php echo $hospitalesgeneral_list->especialidad->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_list->RowCount ?>_hospitalesgeneral_especialidad">
<span<?php echo $hospitalesgeneral_list->especialidad->viewAttributes() ?>><?php echo $hospitalesgeneral_list->especialidad->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospitalesgeneral_list->codpolitico->Visible) { // codpolitico ?>
		<td data-name="codpolitico" <?php echo $hospitalesgeneral_list->codpolitico->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_list->RowCount ?>_hospitalesgeneral_codpolitico">
<span<?php echo $hospitalesgeneral_list->codpolitico->viewAttributes() ?>><?php echo $hospitalesgeneral_list->codpolitico->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospitalesgeneral_list->telefono->Visible) { // telefono ?>
		<td data-name="telefono" <?php echo $hospitalesgeneral_list->telefono->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_list->RowCount ?>_hospitalesgeneral_telefono">
<span<?php echo $hospitalesgeneral_list->telefono->viewAttributes() ?>><?php echo $hospitalesgeneral_list->telefono->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospitalesgeneral_list->nombre_responsable->Visible) { // nombre_responsable ?>
		<td data-name="nombre_responsable" <?php echo $hospitalesgeneral_list->nombre_responsable->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_list->RowCount ?>_hospitalesgeneral_nombre_responsable">
<span<?php echo $hospitalesgeneral_list->nombre_responsable->viewAttributes() ?>><?php echo $hospitalesgeneral_list->nombre_responsable->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hospitalesgeneral_list->ListOptions->render("body", "right", $hospitalesgeneral_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$hospitalesgeneral_list->isGridAdd())
		$hospitalesgeneral_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$hospitalesgeneral->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hospitalesgeneral_list->Recordset)
	$hospitalesgeneral_list->Recordset->Close();
?>
<?php if (!$hospitalesgeneral_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hospitalesgeneral_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $hospitalesgeneral_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospitalesgeneral_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hospitalesgeneral_list->TotalRecords == 0 && !$hospitalesgeneral->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hospitalesgeneral_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hospitalesgeneral_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$hospitalesgeneral_list->isExport()) { ?>
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
$hospitalesgeneral_list->terminate();
?>