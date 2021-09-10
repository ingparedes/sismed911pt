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
$consulta_peru_camas_list = new consulta_peru_camas_list();

// Run the page
$consulta_peru_camas_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$consulta_peru_camas_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$consulta_peru_camas_list->isExport()) { ?>
<script>
var fconsulta_peru_camaslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fconsulta_peru_camaslist = currentForm = new ew.Form("fconsulta_peru_camaslist", "list");
	fconsulta_peru_camaslist.formKeyCountName = '<?php echo $consulta_peru_camas_list->FormKeyCountName ?>';
	loadjs.done("fconsulta_peru_camaslist");
});
var fconsulta_peru_camaslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fconsulta_peru_camaslistsrch = currentSearchForm = new ew.Form("fconsulta_peru_camaslistsrch");

	// Dynamic selection lists
	// Filters

	fconsulta_peru_camaslistsrch.filterList = <?php echo $consulta_peru_camas_list->getFilterList() ?>;
	loadjs.done("fconsulta_peru_camaslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$consulta_peru_camas_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($consulta_peru_camas_list->TotalRecords > 0 && $consulta_peru_camas_list->ExportOptions->visible()) { ?>
<?php $consulta_peru_camas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($consulta_peru_camas_list->ImportOptions->visible()) { ?>
<?php $consulta_peru_camas_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($consulta_peru_camas_list->SearchOptions->visible()) { ?>
<?php $consulta_peru_camas_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($consulta_peru_camas_list->FilterOptions->visible()) { ?>
<?php $consulta_peru_camas_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$consulta_peru_camas_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$consulta_peru_camas_list->isExport() && !$consulta_peru_camas->CurrentAction) { ?>
<form name="fconsulta_peru_camaslistsrch" id="fconsulta_peru_camaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fconsulta_peru_camaslistsrch-search-panel" class="<?php echo $consulta_peru_camas_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="consulta_peru_camas">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $consulta_peru_camas_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($consulta_peru_camas_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($consulta_peru_camas_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $consulta_peru_camas_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($consulta_peru_camas_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($consulta_peru_camas_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($consulta_peru_camas_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($consulta_peru_camas_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $consulta_peru_camas_list->showPageHeader(); ?>
<?php
$consulta_peru_camas_list->showMessage();
?>
<?php if ($consulta_peru_camas_list->TotalRecords > 0 || $consulta_peru_camas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($consulta_peru_camas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> consulta_peru_camas">
<?php if (!$consulta_peru_camas_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$consulta_peru_camas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $consulta_peru_camas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $consulta_peru_camas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fconsulta_peru_camaslist" id="fconsulta_peru_camaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="consulta_peru_camas">
<div id="gmp_consulta_peru_camas" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($consulta_peru_camas_list->TotalRecords > 0 || $consulta_peru_camas_list->isGridEdit()) { ?>
<table id="tbl_consulta_peru_camaslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$consulta_peru_camas->RowType = ROWTYPE_HEADER;

// Render list options
$consulta_peru_camas_list->renderListOptions();

// Render list options (header, left)
$consulta_peru_camas_list->ListOptions->render("header", "left");
?>
<?php if ($consulta_peru_camas_list->id_hospital->Visible) { // id_hospital ?>
	<?php if ($consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->id_hospital) == "") { ?>
		<th data-name="id_hospital" class="<?php echo $consulta_peru_camas_list->id_hospital->headerCellClass() ?>"><div id="elh_consulta_peru_camas_id_hospital" class="consulta_peru_camas_id_hospital"><div class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->id_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_hospital" class="<?php echo $consulta_peru_camas_list->id_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->id_hospital) ?>', 1);"><div id="elh_consulta_peru_camas_id_hospital" class="consulta_peru_camas_id_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->id_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($consulta_peru_camas_list->id_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($consulta_peru_camas_list->id_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($consulta_peru_camas_list->nombre_hospital->Visible) { // nombre_hospital ?>
	<?php if ($consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->nombre_hospital) == "") { ?>
		<th data-name="nombre_hospital" class="<?php echo $consulta_peru_camas_list->nombre_hospital->headerCellClass() ?>"><div id="elh_consulta_peru_camas_nombre_hospital" class="consulta_peru_camas_nombre_hospital"><div class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->nombre_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nombre_hospital" class="<?php echo $consulta_peru_camas_list->nombre_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->nombre_hospital) ?>', 1);"><div id="elh_consulta_peru_camas_nombre_hospital" class="consulta_peru_camas_nombre_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->nombre_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($consulta_peru_camas_list->nombre_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($consulta_peru_camas_list->nombre_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($consulta_peru_camas_list->provincia_hospital->Visible) { // provincia_hospital ?>
	<?php if ($consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->provincia_hospital) == "") { ?>
		<th data-name="provincia_hospital" class="<?php echo $consulta_peru_camas_list->provincia_hospital->headerCellClass() ?>"><div id="elh_consulta_peru_camas_provincia_hospital" class="consulta_peru_camas_provincia_hospital"><div class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->provincia_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="provincia_hospital" class="<?php echo $consulta_peru_camas_list->provincia_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->provincia_hospital) ?>', 1);"><div id="elh_consulta_peru_camas_provincia_hospital" class="consulta_peru_camas_provincia_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->provincia_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($consulta_peru_camas_list->provincia_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($consulta_peru_camas_list->provincia_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($consulta_peru_camas_list->municipio_hospital->Visible) { // municipio_hospital ?>
	<?php if ($consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->municipio_hospital) == "") { ?>
		<th data-name="municipio_hospital" class="<?php echo $consulta_peru_camas_list->municipio_hospital->headerCellClass() ?>"><div id="elh_consulta_peru_camas_municipio_hospital" class="consulta_peru_camas_municipio_hospital"><div class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->municipio_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="municipio_hospital" class="<?php echo $consulta_peru_camas_list->municipio_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->municipio_hospital) ?>', 1);"><div id="elh_consulta_peru_camas_municipio_hospital" class="consulta_peru_camas_municipio_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->municipio_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($consulta_peru_camas_list->municipio_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($consulta_peru_camas_list->municipio_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($consulta_peru_camas_list->depto_hospital->Visible) { // depto_hospital ?>
	<?php if ($consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->depto_hospital) == "") { ?>
		<th data-name="depto_hospital" class="<?php echo $consulta_peru_camas_list->depto_hospital->headerCellClass() ?>"><div id="elh_consulta_peru_camas_depto_hospital" class="consulta_peru_camas_depto_hospital"><div class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->depto_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="depto_hospital" class="<?php echo $consulta_peru_camas_list->depto_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->depto_hospital) ?>', 1);"><div id="elh_consulta_peru_camas_depto_hospital" class="consulta_peru_camas_depto_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->depto_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($consulta_peru_camas_list->depto_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($consulta_peru_camas_list->depto_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($consulta_peru_camas_list->nivel_hospital->Visible) { // nivel_hospital ?>
	<?php if ($consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->nivel_hospital) == "") { ?>
		<th data-name="nivel_hospital" class="<?php echo $consulta_peru_camas_list->nivel_hospital->headerCellClass() ?>"><div id="elh_consulta_peru_camas_nivel_hospital" class="consulta_peru_camas_nivel_hospital"><div class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->nivel_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nivel_hospital" class="<?php echo $consulta_peru_camas_list->nivel_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->nivel_hospital) ?>', 1);"><div id="elh_consulta_peru_camas_nivel_hospital" class="consulta_peru_camas_nivel_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->nivel_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($consulta_peru_camas_list->nivel_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($consulta_peru_camas_list->nivel_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($consulta_peru_camas_list->sector_hospital->Visible) { // sector_hospital ?>
	<?php if ($consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->sector_hospital) == "") { ?>
		<th data-name="sector_hospital" class="<?php echo $consulta_peru_camas_list->sector_hospital->headerCellClass() ?>"><div id="elh_consulta_peru_camas_sector_hospital" class="consulta_peru_camas_sector_hospital"><div class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->sector_hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sector_hospital" class="<?php echo $consulta_peru_camas_list->sector_hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $consulta_peru_camas_list->SortUrl($consulta_peru_camas_list->sector_hospital) ?>', 1);"><div id="elh_consulta_peru_camas_sector_hospital" class="consulta_peru_camas_sector_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $consulta_peru_camas_list->sector_hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($consulta_peru_camas_list->sector_hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($consulta_peru_camas_list->sector_hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$consulta_peru_camas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($consulta_peru_camas_list->ExportAll && $consulta_peru_camas_list->isExport()) {
	$consulta_peru_camas_list->StopRecord = $consulta_peru_camas_list->TotalRecords;
} else {

	// Set the last record to display
	if ($consulta_peru_camas_list->TotalRecords > $consulta_peru_camas_list->StartRecord + $consulta_peru_camas_list->DisplayRecords - 1)
		$consulta_peru_camas_list->StopRecord = $consulta_peru_camas_list->StartRecord + $consulta_peru_camas_list->DisplayRecords - 1;
	else
		$consulta_peru_camas_list->StopRecord = $consulta_peru_camas_list->TotalRecords;
}
$consulta_peru_camas_list->RecordCount = $consulta_peru_camas_list->StartRecord - 1;
if ($consulta_peru_camas_list->Recordset && !$consulta_peru_camas_list->Recordset->EOF) {
	$consulta_peru_camas_list->Recordset->moveFirst();
	$selectLimit = $consulta_peru_camas_list->UseSelectLimit;
	if (!$selectLimit && $consulta_peru_camas_list->StartRecord > 1)
		$consulta_peru_camas_list->Recordset->move($consulta_peru_camas_list->StartRecord - 1);
} elseif (!$consulta_peru_camas->AllowAddDeleteRow && $consulta_peru_camas_list->StopRecord == 0) {
	$consulta_peru_camas_list->StopRecord = $consulta_peru_camas->GridAddRowCount;
}

// Initialize aggregate
$consulta_peru_camas->RowType = ROWTYPE_AGGREGATEINIT;
$consulta_peru_camas->resetAttributes();
$consulta_peru_camas_list->renderRow();
while ($consulta_peru_camas_list->RecordCount < $consulta_peru_camas_list->StopRecord) {
	$consulta_peru_camas_list->RecordCount++;
	if ($consulta_peru_camas_list->RecordCount >= $consulta_peru_camas_list->StartRecord) {
		$consulta_peru_camas_list->RowCount++;

		// Set up key count
		$consulta_peru_camas_list->KeyCount = $consulta_peru_camas_list->RowIndex;

		// Init row class and style
		$consulta_peru_camas->resetAttributes();
		$consulta_peru_camas->CssClass = "";
		if ($consulta_peru_camas_list->isGridAdd()) {
		} else {
			$consulta_peru_camas_list->loadRowValues($consulta_peru_camas_list->Recordset); // Load row values
		}
		$consulta_peru_camas->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$consulta_peru_camas->RowAttrs->merge(["data-rowindex" => $consulta_peru_camas_list->RowCount, "id" => "r" . $consulta_peru_camas_list->RowCount . "_consulta_peru_camas", "data-rowtype" => $consulta_peru_camas->RowType]);

		// Render row
		$consulta_peru_camas_list->renderRow();

		// Render list options
		$consulta_peru_camas_list->renderListOptions();
?>
	<tr <?php echo $consulta_peru_camas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$consulta_peru_camas_list->ListOptions->render("body", "left", $consulta_peru_camas_list->RowCount);
?>
	<?php if ($consulta_peru_camas_list->id_hospital->Visible) { // id_hospital ?>
		<td data-name="id_hospital" <?php echo $consulta_peru_camas_list->id_hospital->cellAttributes() ?>>
<span id="el<?php echo $consulta_peru_camas_list->RowCount ?>_consulta_peru_camas_id_hospital">
<span<?php echo $consulta_peru_camas_list->id_hospital->viewAttributes() ?>><?php echo $consulta_peru_camas_list->id_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($consulta_peru_camas_list->nombre_hospital->Visible) { // nombre_hospital ?>
		<td data-name="nombre_hospital" <?php echo $consulta_peru_camas_list->nombre_hospital->cellAttributes() ?>>
<span id="el<?php echo $consulta_peru_camas_list->RowCount ?>_consulta_peru_camas_nombre_hospital">
<span<?php echo $consulta_peru_camas_list->nombre_hospital->viewAttributes() ?>><?php echo $consulta_peru_camas_list->nombre_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($consulta_peru_camas_list->provincia_hospital->Visible) { // provincia_hospital ?>
		<td data-name="provincia_hospital" <?php echo $consulta_peru_camas_list->provincia_hospital->cellAttributes() ?>>
<span id="el<?php echo $consulta_peru_camas_list->RowCount ?>_consulta_peru_camas_provincia_hospital">
<span<?php echo $consulta_peru_camas_list->provincia_hospital->viewAttributes() ?>><?php echo $consulta_peru_camas_list->provincia_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($consulta_peru_camas_list->municipio_hospital->Visible) { // municipio_hospital ?>
		<td data-name="municipio_hospital" <?php echo $consulta_peru_camas_list->municipio_hospital->cellAttributes() ?>>
<span id="el<?php echo $consulta_peru_camas_list->RowCount ?>_consulta_peru_camas_municipio_hospital">
<span<?php echo $consulta_peru_camas_list->municipio_hospital->viewAttributes() ?>><?php echo $consulta_peru_camas_list->municipio_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($consulta_peru_camas_list->depto_hospital->Visible) { // depto_hospital ?>
		<td data-name="depto_hospital" <?php echo $consulta_peru_camas_list->depto_hospital->cellAttributes() ?>>
<span id="el<?php echo $consulta_peru_camas_list->RowCount ?>_consulta_peru_camas_depto_hospital">
<span<?php echo $consulta_peru_camas_list->depto_hospital->viewAttributes() ?>><?php echo $consulta_peru_camas_list->depto_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($consulta_peru_camas_list->nivel_hospital->Visible) { // nivel_hospital ?>
		<td data-name="nivel_hospital" <?php echo $consulta_peru_camas_list->nivel_hospital->cellAttributes() ?>>
<span id="el<?php echo $consulta_peru_camas_list->RowCount ?>_consulta_peru_camas_nivel_hospital">
<span<?php echo $consulta_peru_camas_list->nivel_hospital->viewAttributes() ?>><?php echo $consulta_peru_camas_list->nivel_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($consulta_peru_camas_list->sector_hospital->Visible) { // sector_hospital ?>
		<td data-name="sector_hospital" <?php echo $consulta_peru_camas_list->sector_hospital->cellAttributes() ?>>
<span id="el<?php echo $consulta_peru_camas_list->RowCount ?>_consulta_peru_camas_sector_hospital">
<span<?php echo $consulta_peru_camas_list->sector_hospital->viewAttributes() ?>><?php echo $consulta_peru_camas_list->sector_hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$consulta_peru_camas_list->ListOptions->render("body", "right", $consulta_peru_camas_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$consulta_peru_camas_list->isGridAdd())
		$consulta_peru_camas_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$consulta_peru_camas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($consulta_peru_camas_list->Recordset)
	$consulta_peru_camas_list->Recordset->Close();
?>
<?php if (!$consulta_peru_camas_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$consulta_peru_camas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $consulta_peru_camas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $consulta_peru_camas_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($consulta_peru_camas_list->TotalRecords == 0 && !$consulta_peru_camas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $consulta_peru_camas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$consulta_peru_camas_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$consulta_peru_camas_list->isExport()) { ?>
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
$consulta_peru_camas_list->terminate();
?>