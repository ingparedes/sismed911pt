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
$censo_total_list = new censo_total_list();

// Run the page
$censo_total_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$censo_total_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$censo_total_list->isExport()) { ?>
<script>
var fcenso_totallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fcenso_totallist = currentForm = new ew.Form("fcenso_totallist", "list");
	fcenso_totallist.formKeyCountName = '<?php echo $censo_total_list->FormKeyCountName ?>';
	loadjs.done("fcenso_totallist");
});
var fcenso_totallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fcenso_totallistsrch = currentSearchForm = new ew.Form("fcenso_totallistsrch");

	// Dynamic selection lists
	// Filters

	fcenso_totallistsrch.filterList = <?php echo $censo_total_list->getFilterList() ?>;
	loadjs.done("fcenso_totallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$censo_total_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($censo_total_list->TotalRecords > 0 && $censo_total_list->ExportOptions->visible()) { ?>
<?php $censo_total_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($censo_total_list->ImportOptions->visible()) { ?>
<?php $censo_total_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($censo_total_list->SearchOptions->visible()) { ?>
<?php $censo_total_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($censo_total_list->FilterOptions->visible()) { ?>
<?php $censo_total_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$censo_total_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$censo_total_list->isExport() && !$censo_total->CurrentAction) { ?>
<form name="fcenso_totallistsrch" id="fcenso_totallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fcenso_totallistsrch-search-panel" class="<?php echo $censo_total_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="censo_total">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $censo_total_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($censo_total_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($censo_total_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $censo_total_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($censo_total_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($censo_total_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($censo_total_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($censo_total_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $censo_total_list->showPageHeader(); ?>
<?php
$censo_total_list->showMessage();
?>
<?php if ($censo_total_list->TotalRecords > 0 || $censo_total->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($censo_total_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> censo_total">
<?php if (!$censo_total_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$censo_total_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $censo_total_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $censo_total_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcenso_totallist" id="fcenso_totallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="censo_total">
<div id="gmp_censo_total" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($censo_total_list->TotalRecords > 0 || $censo_total_list->isGridEdit()) { ?>
<table id="tbl_censo_totallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$censo_total->RowType = ROWTYPE_HEADER;

// Render list options
$censo_total_list->renderListOptions();

// Render list options (header, left)
$censo_total_list->ListOptions->render("header", "left");
?>
<?php if ($censo_total_list->id_hospital->Visible) { // id_hospital ?>
	<?php if ($censo_total_list->SortUrl($censo_total_list->id_hospital) == "") { ?>
		<th data-name="id_hospital" class="<?php echo $censo_total_list->id_hospital->headerCellClass() ?>"><div id="elh_censo_total_id_hospital" class="censo_total_id_hospital"><div class="ew-table-header-caption"><?php echo $censo_total_list->id_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_hospital" class="<?php echo $censo_total_list->id_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_total_list->SortUrl($censo_total_list->id_hospital) ?>', 1);"><div id="elh_censo_total_id_hospital" class="censo_total_id_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_total_list->id_hospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_total_list->id_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_total_list->id_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_total_list->cod_servicio->Visible) { // cod_servicio ?>
	<?php if ($censo_total_list->SortUrl($censo_total_list->cod_servicio) == "") { ?>
		<th data-name="cod_servicio" class="<?php echo $censo_total_list->cod_servicio->headerCellClass() ?>"><div id="elh_censo_total_cod_servicio" class="censo_total_cod_servicio"><div class="ew-table-header-caption"><?php echo $censo_total_list->cod_servicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_servicio" class="<?php echo $censo_total_list->cod_servicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_total_list->SortUrl($censo_total_list->cod_servicio) ?>', 1);"><div id="elh_censo_total_cod_servicio" class="censo_total_cod_servicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_total_list->cod_servicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_total_list->cod_servicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_total_list->cod_servicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_total_list->cod_division->Visible) { // cod_division ?>
	<?php if ($censo_total_list->SortUrl($censo_total_list->cod_division) == "") { ?>
		<th data-name="cod_division" class="<?php echo $censo_total_list->cod_division->headerCellClass() ?>"><div id="elh_censo_total_cod_division" class="censo_total_cod_division"><div class="ew-table-header-caption"><?php echo $censo_total_list->cod_division->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cod_division" class="<?php echo $censo_total_list->cod_division->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_total_list->SortUrl($censo_total_list->cod_division) ?>', 1);"><div id="elh_censo_total_cod_division" class="censo_total_cod_division">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_total_list->cod_division->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_total_list->cod_division->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_total_list->cod_division->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_total_list->camas_ocupadas->Visible) { // camas_ocupadas ?>
	<?php if ($censo_total_list->SortUrl($censo_total_list->camas_ocupadas) == "") { ?>
		<th data-name="camas_ocupadas" class="<?php echo $censo_total_list->camas_ocupadas->headerCellClass() ?>"><div id="elh_censo_total_camas_ocupadas" class="censo_total_camas_ocupadas"><div class="ew-table-header-caption"><?php echo $censo_total_list->camas_ocupadas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="camas_ocupadas" class="<?php echo $censo_total_list->camas_ocupadas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_total_list->SortUrl($censo_total_list->camas_ocupadas) ?>', 1);"><div id="elh_censo_total_camas_ocupadas" class="censo_total_camas_ocupadas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_total_list->camas_ocupadas->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_total_list->camas_ocupadas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_total_list->camas_ocupadas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_total_list->camas_libres->Visible) { // camas_libres ?>
	<?php if ($censo_total_list->SortUrl($censo_total_list->camas_libres) == "") { ?>
		<th data-name="camas_libres" class="<?php echo $censo_total_list->camas_libres->headerCellClass() ?>"><div id="elh_censo_total_camas_libres" class="censo_total_camas_libres"><div class="ew-table-header-caption"><?php echo $censo_total_list->camas_libres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="camas_libres" class="<?php echo $censo_total_list->camas_libres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_total_list->SortUrl($censo_total_list->camas_libres) ?>', 1);"><div id="elh_censo_total_camas_libres" class="censo_total_camas_libres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_total_list->camas_libres->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_total_list->camas_libres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_total_list->camas_libres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_total_list->camas_fueraservicio->Visible) { // camas_fueraservicio ?>
	<?php if ($censo_total_list->SortUrl($censo_total_list->camas_fueraservicio) == "") { ?>
		<th data-name="camas_fueraservicio" class="<?php echo $censo_total_list->camas_fueraservicio->headerCellClass() ?>"><div id="elh_censo_total_camas_fueraservicio" class="censo_total_camas_fueraservicio"><div class="ew-table-header-caption"><?php echo $censo_total_list->camas_fueraservicio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="camas_fueraservicio" class="<?php echo $censo_total_list->camas_fueraservicio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_total_list->SortUrl($censo_total_list->camas_fueraservicio) ?>', 1);"><div id="elh_censo_total_camas_fueraservicio" class="censo_total_camas_fueraservicio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_total_list->camas_fueraservicio->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_total_list->camas_fueraservicio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_total_list->camas_fueraservicio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_total_list->nombre_reporta->Visible) { // nombre_reporta ?>
	<?php if ($censo_total_list->SortUrl($censo_total_list->nombre_reporta) == "") { ?>
		<th data-name="nombre_reporta" class="<?php echo $censo_total_list->nombre_reporta->headerCellClass() ?>"><div id="elh_censo_total_nombre_reporta" class="censo_total_nombre_reporta"><div class="ew-table-header-caption"><?php echo $censo_total_list->nombre_reporta->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_reporta" class="<?php echo $censo_total_list->nombre_reporta->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_total_list->SortUrl($censo_total_list->nombre_reporta) ?>', 1);"><div id="elh_censo_total_nombre_reporta" class="censo_total_nombre_reporta">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_total_list->nombre_reporta->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($censo_total_list->nombre_reporta->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_total_list->nombre_reporta->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_total_list->telefono_reporta->Visible) { // telefono_reporta ?>
	<?php if ($censo_total_list->SortUrl($censo_total_list->telefono_reporta) == "") { ?>
		<th data-name="telefono_reporta" class="<?php echo $censo_total_list->telefono_reporta->headerCellClass() ?>"><div id="elh_censo_total_telefono_reporta" class="censo_total_telefono_reporta"><div class="ew-table-header-caption"><?php echo $censo_total_list->telefono_reporta->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telefono_reporta" class="<?php echo $censo_total_list->telefono_reporta->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_total_list->SortUrl($censo_total_list->telefono_reporta) ?>', 1);"><div id="elh_censo_total_telefono_reporta" class="censo_total_telefono_reporta">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_total_list->telefono_reporta->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($censo_total_list->telefono_reporta->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_total_list->telefono_reporta->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_total_list->fecha_reporte->Visible) { // fecha_reporte ?>
	<?php if ($censo_total_list->SortUrl($censo_total_list->fecha_reporte) == "") { ?>
		<th data-name="fecha_reporte" class="<?php echo $censo_total_list->fecha_reporte->headerCellClass() ?>"><div id="elh_censo_total_fecha_reporte" class="censo_total_fecha_reporte"><div class="ew-table-header-caption"><?php echo $censo_total_list->fecha_reporte->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fecha_reporte" class="<?php echo $censo_total_list->fecha_reporte->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_total_list->SortUrl($censo_total_list->fecha_reporte) ?>', 1);"><div id="elh_censo_total_fecha_reporte" class="censo_total_fecha_reporte">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_total_list->fecha_reporte->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_total_list->fecha_reporte->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_total_list->fecha_reporte->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($censo_total_list->id_censo->Visible) { // id_censo ?>
	<?php if ($censo_total_list->SortUrl($censo_total_list->id_censo) == "") { ?>
		<th data-name="id_censo" class="<?php echo $censo_total_list->id_censo->headerCellClass() ?>"><div id="elh_censo_total_id_censo" class="censo_total_id_censo"><div class="ew-table-header-caption"><?php echo $censo_total_list->id_censo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_censo" class="<?php echo $censo_total_list->id_censo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $censo_total_list->SortUrl($censo_total_list->id_censo) ?>', 1);"><div id="elh_censo_total_id_censo" class="censo_total_id_censo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $censo_total_list->id_censo->caption() ?></span><span class="ew-table-header-sort"><?php if ($censo_total_list->id_censo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($censo_total_list->id_censo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$censo_total_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($censo_total_list->ExportAll && $censo_total_list->isExport()) {
	$censo_total_list->StopRecord = $censo_total_list->TotalRecords;
} else {

	// Set the last record to display
	if ($censo_total_list->TotalRecords > $censo_total_list->StartRecord + $censo_total_list->DisplayRecords - 1)
		$censo_total_list->StopRecord = $censo_total_list->StartRecord + $censo_total_list->DisplayRecords - 1;
	else
		$censo_total_list->StopRecord = $censo_total_list->TotalRecords;
}
$censo_total_list->RecordCount = $censo_total_list->StartRecord - 1;
if ($censo_total_list->Recordset && !$censo_total_list->Recordset->EOF) {
	$censo_total_list->Recordset->moveFirst();
	$selectLimit = $censo_total_list->UseSelectLimit;
	if (!$selectLimit && $censo_total_list->StartRecord > 1)
		$censo_total_list->Recordset->move($censo_total_list->StartRecord - 1);
} elseif (!$censo_total->AllowAddDeleteRow && $censo_total_list->StopRecord == 0) {
	$censo_total_list->StopRecord = $censo_total->GridAddRowCount;
}

// Initialize aggregate
$censo_total->RowType = ROWTYPE_AGGREGATEINIT;
$censo_total->resetAttributes();
$censo_total_list->renderRow();
while ($censo_total_list->RecordCount < $censo_total_list->StopRecord) {
	$censo_total_list->RecordCount++;
	if ($censo_total_list->RecordCount >= $censo_total_list->StartRecord) {
		$censo_total_list->RowCount++;

		// Set up key count
		$censo_total_list->KeyCount = $censo_total_list->RowIndex;

		// Init row class and style
		$censo_total->resetAttributes();
		$censo_total->CssClass = "";
		if ($censo_total_list->isGridAdd()) {
		} else {
			$censo_total_list->loadRowValues($censo_total_list->Recordset); // Load row values
		}
		$censo_total->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$censo_total->RowAttrs->merge(["data-rowindex" => $censo_total_list->RowCount, "id" => "r" . $censo_total_list->RowCount . "_censo_total", "data-rowtype" => $censo_total->RowType]);

		// Render row
		$censo_total_list->renderRow();

		// Render list options
		$censo_total_list->renderListOptions();
?>
	<tr <?php echo $censo_total->rowAttributes() ?>>
<?php

// Render list options (body, left)
$censo_total_list->ListOptions->render("body", "left", $censo_total_list->RowCount);
?>
	<?php if ($censo_total_list->id_hospital->Visible) { // id_hospital ?>
		<td data-name="id_hospital" <?php echo $censo_total_list->id_hospital->cellAttributes() ?>>
<span id="el<?php echo $censo_total_list->RowCount ?>_censo_total_id_hospital">
<span<?php echo $censo_total_list->id_hospital->viewAttributes() ?>><?php echo $censo_total_list->id_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_total_list->cod_servicio->Visible) { // cod_servicio ?>
		<td data-name="cod_servicio" <?php echo $censo_total_list->cod_servicio->cellAttributes() ?>>
<span id="el<?php echo $censo_total_list->RowCount ?>_censo_total_cod_servicio">
<span<?php echo $censo_total_list->cod_servicio->viewAttributes() ?>><?php echo $censo_total_list->cod_servicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_total_list->cod_division->Visible) { // cod_division ?>
		<td data-name="cod_division" <?php echo $censo_total_list->cod_division->cellAttributes() ?>>
<span id="el<?php echo $censo_total_list->RowCount ?>_censo_total_cod_division">
<span<?php echo $censo_total_list->cod_division->viewAttributes() ?>><?php echo $censo_total_list->cod_division->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_total_list->camas_ocupadas->Visible) { // camas_ocupadas ?>
		<td data-name="camas_ocupadas" <?php echo $censo_total_list->camas_ocupadas->cellAttributes() ?>>
<span id="el<?php echo $censo_total_list->RowCount ?>_censo_total_camas_ocupadas">
<span<?php echo $censo_total_list->camas_ocupadas->viewAttributes() ?>><?php echo $censo_total_list->camas_ocupadas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_total_list->camas_libres->Visible) { // camas_libres ?>
		<td data-name="camas_libres" <?php echo $censo_total_list->camas_libres->cellAttributes() ?>>
<span id="el<?php echo $censo_total_list->RowCount ?>_censo_total_camas_libres">
<span<?php echo $censo_total_list->camas_libres->viewAttributes() ?>><?php echo $censo_total_list->camas_libres->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_total_list->camas_fueraservicio->Visible) { // camas_fueraservicio ?>
		<td data-name="camas_fueraservicio" <?php echo $censo_total_list->camas_fueraservicio->cellAttributes() ?>>
<span id="el<?php echo $censo_total_list->RowCount ?>_censo_total_camas_fueraservicio">
<span<?php echo $censo_total_list->camas_fueraservicio->viewAttributes() ?>><?php echo $censo_total_list->camas_fueraservicio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_total_list->nombre_reporta->Visible) { // nombre_reporta ?>
		<td data-name="nombre_reporta" <?php echo $censo_total_list->nombre_reporta->cellAttributes() ?>>
<span id="el<?php echo $censo_total_list->RowCount ?>_censo_total_nombre_reporta">
<span<?php echo $censo_total_list->nombre_reporta->viewAttributes() ?>><?php echo $censo_total_list->nombre_reporta->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_total_list->telefono_reporta->Visible) { // telefono_reporta ?>
		<td data-name="telefono_reporta" <?php echo $censo_total_list->telefono_reporta->cellAttributes() ?>>
<span id="el<?php echo $censo_total_list->RowCount ?>_censo_total_telefono_reporta">
<span<?php echo $censo_total_list->telefono_reporta->viewAttributes() ?>><?php echo $censo_total_list->telefono_reporta->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_total_list->fecha_reporte->Visible) { // fecha_reporte ?>
		<td data-name="fecha_reporte" <?php echo $censo_total_list->fecha_reporte->cellAttributes() ?>>
<span id="el<?php echo $censo_total_list->RowCount ?>_censo_total_fecha_reporte">
<span<?php echo $censo_total_list->fecha_reporte->viewAttributes() ?>><?php echo $censo_total_list->fecha_reporte->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($censo_total_list->id_censo->Visible) { // id_censo ?>
		<td data-name="id_censo" <?php echo $censo_total_list->id_censo->cellAttributes() ?>>
<span id="el<?php echo $censo_total_list->RowCount ?>_censo_total_id_censo">
<span<?php echo $censo_total_list->id_censo->viewAttributes() ?>><?php echo $censo_total_list->id_censo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$censo_total_list->ListOptions->render("body", "right", $censo_total_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$censo_total_list->isGridAdd())
		$censo_total_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$censo_total->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($censo_total_list->Recordset)
	$censo_total_list->Recordset->Close();
?>
<?php if (!$censo_total_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$censo_total_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $censo_total_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $censo_total_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($censo_total_list->TotalRecords == 0 && !$censo_total->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $censo_total_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$censo_total_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$censo_total_list->isExport()) { ?>
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
$censo_total_list->terminate();
?>